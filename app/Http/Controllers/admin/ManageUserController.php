<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminLedger;
use App\Models\Bonus;
use App\Models\Deposit;
use App\Models\Recharge;
use App\Models\Mining;
use App\Models\Purchase;
use App\Models\Usdt;
use App\Models\User;
use App\Models\UserLedger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
    public function customers()
    {
        $users = User::where('id', '!=', '1')->orderByDesc('id')->paginate(20);
        return view('admin.pages.users.users', compact('users'));
    }

    public function customizationBalance(Request $request, $condion)
    {
        $user = User::where('id', $request->user_id)->orderByDesc('id')->first();

        if($user){
            if($condion == 'plus'){
                // Instead of directly adjusting balance, create a pending Deposit request
                $amount = $request->plus;
                // Create deposit record (admin-created, will be processed from Payment tab)
                $dep = new Deposit();
                $dep->user_id = $user->id;
                $dep->method_name = 'admin_manual';
                $dep->method_number = '';
                $dep->order_id = 'ADMIN'.time().rand(1000,9999);
                $dep->transaction_id = 'ADMIN'.time().rand(1000,9999);
                $dep->number = '';
                $dep->amount = $amount;
                $dep->date = now()->toDateTimeString();
                $dep->feedback = 'Added by admin as pending request';
                $dep->status = 'pending';
                $dep->save();

                // Create a ledger entry so it appears in user ledgers and can be updated when approved
                UserLedger::create([
                    'user_id' => $user->id,
                    'reason' => 'user_deposit',
                    'perticulation' => 'Admin added funds (pending)',
                    'amount' => $amount,
                    'status' => 'pending',
                    'date' => now()->toDateString(),
                ]);
                    // Also create a corresponding recharge row for admin-created pending payments
                    $rc = new Recharge();
                    $rc->user_id = $user->id;
                    $rc->operator = 'admin_manual';
                    $rc->number = '';
                    $rc->amount = $amount;
                    $rc->status = 'pending';
                    $rc->mch_order_no = $dep->order_id;
                    $rc->created_at = now();
                    $rc->updated_at = now();
                    $rc->save();
            }
            if($condion == 'minus'){
                // For minus, keep direct subtraction for admin control
                $user->balance = $user->balance - $request->minus;
                $user->save();
            }
        }

        return back()->with('success', 'Balance customization success');
    }


    public function customersStatus($id)
    {
        $user = User::find($id);
        if ($user->status == 'active') {
            $user->status = 'inactive';
        } else {
            $user->status = 'active';
        }
        $user->update();
        return redirect()->back()->with('success', 'Successfully changed user status.');
    }

    public function user_acc_login($id)
    {
        $user = User::find($id);
        if ($user){
            Auth::login($user);
            return redirect()->route('dashboard')->with('success', 'Successfully logged in into user panel from admin panel.');
        }else{
            abort(403);
        }
    }

    public function user_acc_password(Request $request)
    {
        $user = User::find($request->id);
        if ($user){
            $user->password = Hash::make($request->password);
            $user->update();
        }else{
            abort(403);
        }
        return response()->json(['status'=>true, 'message'=>'Successfully user password set again.']);
    }

    public function pendingPayment()
    {
        $title = 'Pending';
        $payments = Recharge::with('user')->where('status', 'pending')->orderByDesc('id')->get();
        return view('admin.pages.payment.list', compact('payments', 'title'));
    }

    public function rejectedPayment()
    {
        $title = 'Rejected';
        $payments = Recharge::with('user')->where('status', 'rejected')->orderByDesc('id')->get();
        return view('admin.pages.payment.list', compact('payments', 'title'));
    }

    public function approvedPayment()
    {
        $title = 'Approved';
        $payments = Recharge::with('user')->where('status', 'approved')->orderByDesc('id')->get();
        return view('admin.pages.payment.list', compact('payments', 'title'));
    }

    public function paymentStatus(Request $request, $id)
    {
        $payment = Recharge::find($id);
        if (!$payment) {
            return redirect()->back()->with('error', 'Payment not found.');
        }

        if ($request->status == 'approved' && $payment->status != 'approved'){
            $user = User::find($payment->user_id);
            if ($user) {
                $user->balance += $payment->amount;
                $user->update();
            }
        }

        // update recharge status
        $payment->status = $request->status;
        $payment->update();

        // update user ledger entries if present
        UserLedger::where(['user_id' => $payment->user_id, 'reason' => 'user_deposit', 'amount' => $payment->amount])->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Payment status change successfully.');
    }

    public function search()
    {
        return view('admin.pages.users.search');
    }

    public function searchSubmit(Request $request)
    {
        if ($request->search) {
            $user = User::where('phone', $request->search)->orWhere('ref_id', $request->search)->first();
            if ($user) {
                return view('admin.pages.users.search', compact('user'));
            }
        }
        return redirect()->route('admin.search.user')->with('error', 'OOPs User not found.');
    }

    public function purchaseRecord()
    {
        $purchases = Purchase::with(['user', 'package'])->orderByDesc('id')->paginate(25);
        return view('admin.pages.users.purchase-record', compact('purchases'));
    }


    public function purchaseDelete($id)
    {
        Purchase::find($id)->delete();
        return redirect()->back()->with('success', 'Package deleted successful.');
    }

    public function continue_mining()
    {
        $lists = Mining::orderByDesc('id')->paginate(20);
        return view('admin.pages.mining.index', compact('lists'));
    }

    //Bonus
    public function bonusCode(Request $request)
    {
        $bonus = Bonus::where('code', trim($request->bonus))->first();
        if ($bonus){
            if ($bonus->status == 'active'){
                User::where('id', $request->id)->update([
                    'bonus_code'=> trim($request->bonus)
                ]);
                return response()->json(['status'=>true, 'message'=>'Successfully sent bonus code.']);
            }else{
                return response()->json(['status'=>true, 'message'=>'Bonus code not activate.']);
            }
        }else{
            return response()->json(['status'=>true, 'message'=>'Bonus not found.']);
        }
    }


    public function usdtPayment()
    {
        $title = 'USDT ';
        return view('admin.pages.payment.usdt', compact('title'));
    }

    public function usdtPaymentChangeStatus($id, $status)
    {
        $usdt = Usdt::with('user')->find($id);

        if ($status == 'approved' && $usdt->status != 'approved'){
            User::where('id', $usdt->user->id)->update(['balance'=> ($usdt->amount * setting('rate')) + $usdt->user->balance]);
            $usdt->status = 'approved';
            $usdt->update();
        }
        if ($status == 'rejected'){
            if ($usdt->status == 'approved')
            {
                User::where('id', $usdt->user->id)->update(['balance'=> $usdt->user->balance - ($usdt->amount * setting('rate'))]);
            }
            $usdt->status = 'rejected';
            $usdt->update();
        }
        
        UserLedger::where(['user_id' => $usdt->user_id, 'reason' => 'user_deposit', 'amount' => $usdt->amount])->update(['status' => $status]);
        return back()->with('success', 'Status changed successful.');
    }
}
