<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminLedger;
use App\Models\User;
use App\Models\UserLedger;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class ManageWithdrawController extends Controller
{
    public function pendingWithdraw ()
    {
        $title = 'Pending';
        $withdraws = Withdrawal::with(['user', 'payment_method'])->where('status', 'pending')->orderByDesc('id')->get();
        return view('admin.pages.withdraw.list', compact('withdraws', 'title'));
    }

    public function rejectedWithdraw()
    {
        $title = 'Rejected';
        $withdraws = Withdrawal::with(['user', 'payment_method'])->where('status', 'rejected')->orderByDesc('id')->get();
        return view('admin.pages.withdraw.list', compact('withdraws', 'title'));
    }

    public function approvedWithdraw()
    {
        $title = 'Approved';
        $withdraws = Withdrawal::with(['user', 'payment_method'])->where('status', 'approved')->orderByDesc('id')->get();
        return view('admin.pages.withdraw.list', compact('withdraws', 'title'));
    }

    public function withdrawStatus(Request $request, $id)
    {
        $withdraw = Withdrawal::find($id);
        if ($request->status == 'approved'){
            $withdraw->trx = $request->trx;

            $ledger = new UserLedger();
            $ledger->user_id = $withdraw->user_id;
            $ledger->reason = 'withdraw_'.$request->status;
            $ledger->perticulation = 'Your withdraw already '.$request->status. '. thanks for withdraw in our '.env('APP_NAME');
            $ledger->amount = $withdraw->amount;
            $ledger->debit = $request->status == 'approved' ? $withdraw->final_amount : 0;
            $ledger->status = $request->status;
            $ledger->date = date('d-m-Y H:i');
            $ledger->save();

            $admin = Admin::find(1);
            $admin->balance = $admin->balance + $withdraw->charge;
            $admin->update();

            $ledger = new AdminLedger();
            $ledger->admin_id = Admin::first()->id;
            $ledger->reason = 'payment_'.'charge';
            $ledger->perticulation = 'Withdraw approval charge';
            $ledger->amount = $withdraw->amount;
            $ledger->debit = $withdraw->charge;
            $ledger->status = $request->status;
            $ledger->date = date('d-m-Y H:i');
            $ledger->save();
        }
        
        if($request->status == "rejected"){
            User::where('id', $withdraw->user_id)->update([
                    'balance'=> User::find($withdraw->user_id)->balance + $withdraw->amount
                ]);
        }


        $withdraw->status = $request->status;
        $withdraw->admin_feedback = $request->note;
        $withdraw->update();
        
        UserLedger::where(['user_id' => $withdraw->user_id, 'reason' => 'withdraw_request', 'amount' => $withdraw->amount])->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Withdraw status change successfully.');
    }
}
