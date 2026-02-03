<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Mining;
use App\Models\Package;
use App\Models\Purchase;
use App\Models\UserLedger;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Throwable;

class MiningController extends Controller
{
    public function earning()
    {
        return view('app.main.earning');
    }

    public function vip()
    {
        return view('app.main.vip');
    }

    public function myvip(Request $request)
    {
        $vip_id = $request->input('vip_id');
        $user = auth()->user();
        
        if($request->has('vip_id') && $vip_id != null){
            $package = Package::find($vip_id);
            
            if($package != null){
                
                $amount = $package->daily_limit;
                $reason = 'daily_claim_'.$vip_id;
            
                $lastClaim = UserLedger::where(['user_id' => $user->id, 'reason' => $reason])->latest()->first();
                if($lastClaim){
                    $hoursSince = now()->diffInHours($lastClaim->created_at);
                    if($hoursSince < 1){
                        return redirect()->to('my/vip')->with('success', 'Claim not yet available. Please try again after some time.');
                    }
                }
                
                $ledger = new UserLedger();
                $ledger->user_id = $user->id;
                $ledger->get_balance_from_user_id = $user->id;
                $ledger->reason = $reason;
                $ledger->perticulation = 'দৈনিক ক্লিয়াম';
                $ledger->amount = $amount;
                $ledger->debit = $amount;
                $ledger->status = 'approved';
                $ledger->date = date('d-m-Y H:i');
                $ledger->save();
                
                $user->balance += $amount;
                $user->save();
                
                return redirect()->to('my/vip')->with('success', 'দৈনিক  ক্লিয়াম সফলভাবে '. $amount);
                
            }
           
        }
        
        
        return view('app.main.myvip');
    }

    /**
     * AJAX claim for daily reward
     * Expects `vip_id` POST param. Returns JSON { success, amount, balance }
     */
    public function claimAjax(Request $request)
    {
        $vip_id = $request->input('vip_id');
        $user = auth()->user();

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Unauthenticated'], 401);
        }

        if (!$vip_id) {
            return response()->json(['success' => false, 'message' => 'Missing vip_id'], 422);
        }

        $package = Package::find($vip_id);
        if (!$package) {
            return response()->json(['success' => false, 'message' => 'Package not found'], 404);
        }

        $amount = $package->daily_limit;
        $reason = 'daily_claim_' . $vip_id;

        DB::beginTransaction();
        try {
            $lastClaim = UserLedger::where(['user_id' => $user->id, 'reason' => $reason])->latest()->first();
            if ($lastClaim) {
                $hoursSince = now()->diffInHours($lastClaim->created_at);
                if ($hoursSince < 1) {
                    DB::rollBack();
                    return response()->json(['success' => false, 'message' => 'Claim not yet available'], 400);
                }
            }

            $ledger = new UserLedger();
            $ledger->user_id = $user->id;
            $ledger->get_balance_from_user_id = $user->id;
            $ledger->reason = $reason;
            $ledger->perticulation = 'দৈনিক ক্লিয়াম';
            $ledger->amount = $amount;
            $ledger->debit = $amount;
            $ledger->status = 'approved';
            $ledger->date = date('d-m-Y H:i');
            $ledger->save();

            $user->balance += $amount;
            $user->save();

            DB::commit();

            return response()->json(['success' => true, 'amount' => $amount, 'balance' => $user->balance]);
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error('ClaimAjax failed: '.$e->getMessage());
            return response()->json(['success' => false, 'message' => 'Server error'], 500);
        }
    }

    public function vip_level()
    {
        return view('app.main.vip_level');
    }
}
