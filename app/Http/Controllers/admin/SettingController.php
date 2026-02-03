<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public $route = 'admin.setting';
    public function index()
    {
        $data = Setting::find(1);
        return view('admin.pages.setting.index', compact('data'));
    }

    public function insert_or_update(Request $request)
    {
        $model = Setting::findOrFail(1);

        $path = uploadImage(false ,$request, 'logo', 'upload/setting/', null, null ,$model->logo);
        $model->logo = $path ?? $model->logo;

        $model->telegram_channel = $request->telegram_channel;
        $model->telegram_group = $request->telegram_group;
        $model->withraw_button = $request->withraw_button;
        $model->registration_bonus = $request->registration_bonus;
        $model->refer_commission = $request->refer_commission;
        $model->refer_limit = $request->refer_limit;

        $model->minimum_withdraw = $request->minimum_withdraw;
        $model->maximum_withdraw = $request->maximum_withdraw;
        $model->maximum_recharge = $request->maximum_recharge;
        $model->minimum_recharge = $request->minimum_recharge;
        $model->withdraw_charge = $request->withdraw_charge;
                $model->notice = $request->notice;

        $model->daily_sign_amount = $request->daily_sign_amount;
        $model->withdraw_status = $request->withdraw_status;

        $model->update();
        return redirect()->route($this->route.'.index')->with('success', 'Settings Updated Successfully.');
    }
}
