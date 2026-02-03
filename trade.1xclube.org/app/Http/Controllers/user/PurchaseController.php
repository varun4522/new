<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Purchase;
use App\Models\User;
use App\Models\UserLedger;
use App\Models\Spin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class PurchaseController extends Controller
{
    public function purchaseConfirmation($id)
    {
        session()->put('pop', true);

        $package = Package::find($id);
        $user = Auth::user();

        // Check package status
        if (!$package || $package->status != 'active') {
            Log::warning("Inactive package attempt by user {$user->id}");
            return back()->with('error', "Package Inactive");
        }

        // Check if user already has an active purchase of this plan
        $existingPurchase = Purchase::where('user_id', $user->id)
            ->where('package_id', $id)
            ->where('status', 'active')
            ->first();

        if ($existingPurchase) {
            return back()->with('error', "You already have an active purchase of this plan");
        }

        // Prevent multiple purchases of same plan within the same calendar month
        $sameMonth = Purchase::where('user_id', $user->id)
            ->where('package_id', $id)
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->exists();

        if ($sameMonth) {
            return back()->with('error', "You already purchased this plan in the current month");
        }

        // Check balance
        if ($user->balance < $package->price) {
            Log::info("User {$user->id} has insufficient balance");
            return back()->with('error', "Deposit balance too low");
        }

        // Deduct balance and update package tab
        $user->update([
            'balance' => $user->balance - $package->price,
            'package_tab' => $package->tab,
        ]);

        // Determine duration in hours (use duration_hours when available, fall back to validity in days)
        $durationHours = $package->duration_hours ?? (($package->effective_validity ?? $package->validity) * 24);
        $durationHours = (int) $durationHours;

        // hourly and daily income computed using hours
        $hourly = $durationHours > 0 ? ($package->commission_with_avg_amount / $durationHours) : 0;
        $dailyIncome = $hourly * 24;

        // Create purchase (keep legacy 'validity' datetime for compatibility, but set expires_at for exact expiry)
        $purchase = Purchase::create([
            'user_id' => $user->id,
            'package_id' => $package->id,
            'tab' => $package->tab,
            'amount' => $package->price,
            'hourly' => $hourly,
            'daily_income' => $dailyIncome,
            'daily_limit' => $package->daily_limit ?? 1,
            'return_total' => $package->commission_with_avg_amount,
            'date' => now()->addHours(24),
            'validity' => now()->addDays($package->validity),
            'expires_at' => now()->addHours($durationHours),
            'status' => 'active',
        ]);

        // -------------------------------
        // Commission & Spin for referrer
        // -------------------------------
        
         if($this->reffer_comission($user->ref_by, $package->price, $user->id)){}

         // $commission = $package->price * $package->ref1 / 100;

        return redirect()->back()->with('success', "Product purchase successful");
    }
    
    private function reffer_comission($ref_id, $amount, $from_id){
        // 1st level comission 
        $level_1_users = User::where('ref_id', $ref_id)->get();
        $comission_1 = 27;
        $comission_2 = 2;
        $comission_3 = 1;
            
        foreach($level_1_users as $level_1_user){
            $com_1 = $amount * $comission_1 / 100;
            $level_1_user->balance += $com_1;
            $level_1_user->save();
            if($this->store_ledger($level_1_user->id, $com_1, 'first', $from_id)){}
        
           
            
            // 2nd level commission
            $level_2_users = User::where('ref_id', $level_1_user->ref_by)->get();
            foreach($level_2_users as $level_2_user){
                $com_2 = $amount * $comission_2 / 100;
                $level_2_user->balance += $com_2;
                $level_2_user->save();
                if($this->store_ledger($level_2_user->id, $com_2, 'second',$from_id)){}
                
                
                
                // 3rd level commission
                $level_3_users = User::where('ref_id', $level_2_user->ref_by)->get();
                foreach($level_3_users as $level_3_user){
                    $com_3 = $amount * $comission_3 / 100;
                    $level_3_user->balance += $com_3;
                    $level_3_user->save();
                    if($this->store_ledger($level_3_user->id, $com_3, 'third',$from_id)){}
                    
                    
        
                }
                
            }
            
        }
        
        return true;
    }
    
    private function store_ledger($user_id, $com, $step, $from_id){
        $ledger = new UserLedger();
        $ledger->user_id = $user_id;
        $ledger->get_balance_from_user_id = $from_id;
        $ledger->reason = 'commission';
        $ledger->perticulation = 'deposit_commission';
        $ledger->amount = $com;
        $ledger->credit = $com;
        $ledger->status = 'approved';
        $ledger->step = $step;
        $ledger->date = now();
        $ledger->save();
        
        return true;
        
         

        // Create Spin
        Spin::create([
            'referrer_id' => $user_id,
            'package_amount' => $com,
            'reward_amount' => $com,
            'status' => 'pending',
        ]);
    }


    public function vip_confirm($vip_id)
    {
        $vip = Package::find($vip_id);
        return view('app.main.vip_confirm', compact('vip'));
    }

    /**
     * Handle AJAX purchase request from frontend.
     * Expects `package_id` and CSRF token (web route).
     * Returns JSON: { success: true, balance: <new>, purchase: { id, created_at } }
     */
    public function purchaseAjax(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Unauthenticated'], 401);
        }

        $packageId = $request->input('package_id');
        if (!$packageId) {
            return response()->json(['success' => false, 'message' => 'Missing package id'], 422);
        }

        $package = Package::find($packageId);
        if (!$package) {
            return response()->json(['success' => false, 'message' => 'Package not found'], 404);
        }

        if ($package->status !== 'active') {
            return response()->json(['success' => false, 'message' => 'Package is not available'], 400);
        }

        // Check if user already has an active purchase of this plan
        $existingPurchase = Purchase::where('user_id', $user->id)
            ->where('package_id', $packageId)
            ->where('status', 'active')
            ->first();

        if ($existingPurchase) {
            return response()->json(['success' => false, 'message' => 'You already have an active purchase of this plan'], 400);
        }

        // Prevent multiple purchases of same plan within the same calendar month
        $sameMonth = Purchase::where('user_id', $user->id)
            ->where('package_id', $packageId)
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->exists();

        if ($sameMonth) {
            return response()->json(['success' => false, 'message' => 'You already purchased this plan in the current month'], 400);
        }

        // Check balance
        if ($user->balance < $package->price) {
            return response()->json(['success' => false, 'message' => 'Insufficient balance'], 400);
        }

        DB::beginTransaction();
        try {
            // deduct balance
            $user->balance = $user->balance - $package->price;
            $user->package_tab = $package->tab;
            $user->save();

            // determine duration in hours
            $durationHours = $package->duration_hours ?? (($package->effective_validity ?? $package->validity) * 24);
            $durationHours = (int) $durationHours;

            $hourly = $durationHours > 0 ? ($package->commission_with_avg_amount / $durationHours) : 0;
            $dailyIncome = $hourly * 24;

            $purchase = Purchase::create([
                'user_id' => $user->id,
                'package_id' => $package->id,
                'tab' => $package->tab,
                'amount' => $package->price,
                'hourly' => $hourly,
                'daily_income' => $dailyIncome,
                'daily_limit' => $package->daily_limit ?? 1,
                'return_total' => $package->commission_with_avg_amount,
                'date' => now()->addHours(24),
                'validity' => now()->addDays($package->validity ?? 0),
                'expires_at' => now()->addHours($durationHours),
                'status' => 'active',
            ]);

            // referral commission (best-effort, keep existing behavior)
            try {
                if ($this->reffer_comission($user->ref_by, $package->price, $user->id)) {}
            } catch (Throwable $ex) {
                // don't fail purchase for commission errors; log and continue
                Log::error('Referral commission failed: '.$ex->getMessage());
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'balance' => $user->balance,
                'purchase' => [
                    'id' => $purchase->id,
                    // return ISO8601 with timezone so JS parses correctly across clients
                    'created_at' => $purchase->created_at->toIso8601String(),
                ],
            ]);

        } catch (Throwable $e) {
            DB::rollBack();
            Log::error('Purchase AJAX failed: '.$e->getMessage());
            return response()->json(['success' => false, 'message' => 'Server error during purchase'], 500);
        }
    }

    protected function ref_user($ref_by)
    {
        return User::where('ref_id', $ref_by)->first();
    }
}
