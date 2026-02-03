<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\PaymentMethod;
use App\Models\Usdt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use function GuzzleHttp\Promise\all;

class OnepayController extends Controller
{
    public function index()
    {
        return view('app.main.recharge.index');
    }

    public function depositSubmit(Request $request)
    {
//        $validate = Validator::make($request->all(), [
//            'aca' => 'required',
//            'amount' => 'required',
//            'oid' => 'required',
//            'tid' => 'required',
//        ]);
//
//        if ($validate->fails()) {
//            return response()->json(['status'=> false, 'errors'=> $validate->errors()]);
//        }

        try {
            $oid = base64_decode($request->oid);

            //Deposit check
            $depositCheckWithOid = Deposit::where('order_id', $oid)->first();
            if ($depositCheckWithOid){
                return response()->json(['status'=> false, 'message'=> 'ordered']);
            }

            $model = new Deposit();
            $model->user_id = $request->ui;

            $model->method_name = mb_convert_encoding(base64_decode($request->pm), 'UTF-8', 'UTF-8');
            $model->number = mb_convert_encoding(base64_decode($request->aca), 'UTF-8', 'UTF-8');
            $model->order_id = mb_convert_encoding($oid, 'UTF-8', 'UTF-8');
            $model->transaction_id = mb_convert_encoding(base64_decode($request->tid), 'UTF-8', 'UTF-8');
            $model->amount = mb_convert_encoding(base64_decode($request->amount), 'UTF-8', 'UTF-8');
            $model->final_amount = mb_convert_encoding(base64_decode($request->amount), 'UTF-8', 'UTF-8');
            $model->date = date('d-m-Y H:i:s');
            $model->status = mb_convert_encoding('pending', 'UTF-8', 'UTF-8');
            $model->save();

            return response()->json(['status'=> true, 'message'=> 'success']);
        }catch (\Exception $exception){
            return response()->json(['status'=> false, 'message'=> $exception->getMessage()]);
        }
    }

    public function return_number($type)
    {
        $number = DB::table('payment_methods')->where('type', $type)->where('status', 'active')->inRandomOrder()->first();
        if ($number){
            $number = $number->number;
            return response()->json(['status'=> true, 'number'=> $number, 'message'=> $type. 'Available']);
        }else{
            return response()->json(['status'=> false, 'message'=> $type. 'Not processable']);
        }
    }
    
    
    public function onepay_method(Request $request) //Get Amount from user
    {
     
     if(session()->has('urls')){
         session()->forget('urls');
     }
     if(session()->has('user_id')){
         session()->forget('user_id');
     }
     if(session()->has('data')){
         session()->forget('data');
     }
     
     //Session::flush();

        $amount = $request->payment; //w8
        $gateway_numbers = base64_decode($request->nurl); //w8
        $response_url = base64_decode($request->res_url); //w8

        if ($request->has('payment') || $request->has('nurl') || $request->has('res_url')){

            session()->put('cancel', $request->res_url);

            //get response url
            session()->put('urls', ['gateway_url' => $gateway_numbers, 'response_url' => $response_url]);

            //get session user id
            session()->put('user_id', $request->user_id);

            //Generate order id
            $oid = str_replace('-', '', 'S'.rand((int)0000000000000000000, (int)9999999999999999999));

            /// next method page
            return view('onepay_method', compact('oid', 'amount'));
        }else{
            return view('404');
        }
    }

    public function onepay_method_submit(Request $request){

        $amount = encrypt($request->amount);

        return response()->json(['status'=> true, 'amount'=> $amount]);
    }


    public function onepay_details(Request $request, $pay_type)
    {
        $method = strtolower(explode('_', $pay_type)[1]);

        $oid = $request->oid;

        $amount = decrypt($request->amount);

        $number = $request->n;
        

        return view('onepay_details', compact('method', 'amount', 'oid', 'number'));
    }


    public function onepay_final_submit(Request $request)
    {
        //Store data into session
        session()->put('data',
            [
                'pay_method'=> $request->pay_method,
                'amount'=> $request->amount,
                'oid'=> $request->oid,
                'transaction_id'=> $request->transaction_id,
                'acc_acount'=> $request->acc_acount,

            ]);

        return response()->json(['status'=> true]);
    }

    public function success()
    {
        $data = session()->get('data');

        //Get redirect url
        $response_url = session()->get('urls')['response_url'];

        //get user id from session
        $user_id = session()->get('user_id');
        
        return view('success', compact('data', 'response_url', 'user_id'));
    }

    public function bank()
    {
        return view('bank');
    }

    public function cencal()
    {
        $response_url = session()->get('cancel');
        // if (session()->has('urls')){
        //     session()->forget('urls');
        // }
        // if (session()->has('data')){
        //     session()->forget('data');
        // }
        return view('cencal', compact('response_url'));
    }

    public function order_cencal()
    {
        //Get redirect url
        $response_url = session()->get('urls')['response_url'];

        return view('order_cencal', compact('response_url'));
    }
}
