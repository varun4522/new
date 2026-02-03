<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserLedger;
use App\Models\Deposit;

class ApiRechargeController extends Controller
{
    public function api_recharge($type){
        $number = DB::table('payment_methods')->where('name', $type)->where('status', 'active')->inRandomOrder()->first();
        if ($number){
            $number = $number->address;
            return response()->json(['status'=> true, 'number'=> $number, 'message'=> $type. 'Available']);
        }else{
            return response()->json(['status'=> false, 'message'=> $type. 'not processable. try again.']);
        }
    }
    
    public function api_recharge_confirm(Request $request){
        $data = $request->all();
        

        
        if (!empty($data)) {
        
            if ($data['amount'] && $data['tid'] && $data['ui']) {
                $user_id = $data['ui'];
                $amount  = base64_decode($data['amount']);
                $tid = base64_decode($data['tid']);
                $aca = base64_decode($data['aca']);
                $pm = base64_decode($data['pm']);
                
                
                $model = new Deposit();
                $model->user_id = $user_id;
                $model->method_name = $pm;
                $model->number = $aca;
                // $model->order_id = rand(0,999999).rand(0,999999);
                $model->trx = $tid;
                $model->amount = $amount;
                // $model->final_amount = $amount;
                $model->date = date('d-m-Y H:i:s');
                $model->status = 'pending';
                // $model->save();
                
        
                
                if ($model->save()) {
    
                    $ledger = new UserLedger();
                    $ledger->user_id = $user_id;
                    $ledger->reason = 'user_deposit';
                    $ledger->perticulation = 'user deposit using externals';
                    $ledger->amount = $amount;
                    $ledger->debit =  $amount;
                    $ledger->status = 'pending';
                    $ledger->date = date('y-m-d');
                    $ledger->save();
        
                    return redirect()->to('/deposit/record')->with("message", "Recharge Request successfully");
                } 
            }
        
        }
        
        
        return redirect()->to('/deposit/record')->with("message", "Something went wrong. plan not created yet.");
    }
}