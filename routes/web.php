<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BonusController;
use App\Http\Controllers\admin\CommonController;
use App\Http\Controllers\admin\ManageUserController;
use App\Http\Controllers\admin\ManageWithdrawController;
use App\Http\Controllers\admin\PackageController;
use App\Http\Controllers\admin\PaymentMethodController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\TaskController;
use App\Http\Controllers\admin\VipSliderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\CategoryController;
use App\Http\Controllers\user\GetBonusController;
use App\Http\Controllers\user\MiningController;
use App\Http\Controllers\user\OnepayController;
use App\Http\Controllers\user\PurchaseController;
use App\Http\Controllers\user\TeamController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\WithdrawController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ApiRechargeController;
use Illuminate\Support\Facades\Route;

Route::get('clear', function () {
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    return 'Cached Clear';
});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware('throttle:limit-check')->group(function () {
    Route::prefix('admin1')->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin.login');
        });
        Route::get('login', [AdminController::class, 'login'])->name('admin.login');
        Route::post('login', [AdminController::class, 'login_submit'])->name('admin.login-submit');
    });

    Route::prefix('admin/')->middleware('admin')->group(function () {
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        //All Table Status
        Route::post('/table/status', [CommonController::class, 'status']);

        //ADMIN PROFILE
        Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::get('change/password', [AdminController::class, 'change_password'])->name('admin.changepassword');
        Route::post('check/password', [AdminController::class, 'check_password'])->name('admin.check.password');
        Route::post('change/password', [AdminController::class, 'change_password_submit'])->name('admin.changepasswordsubmit');
        Route::get('profile/update', [AdminController::class, 'profile_update'])->name('admin.profile.update');
        Route::post('profile/update', [AdminController::class, 'profile_update_submit'])->name('admin.profile.update-submit');
        //Notice
        Route::get('recharge', [AdminController::class, 'index_recharge'])->name('admin.recharge.index');
        Route::post('recharge/status/{id}', [AdminController::class, 'index_recharge_status'])->name('recharge.status.change');

        //Manage Customers
        Route::get('customers', [ManageUserController::class, 'customers'])->name('admin.customer.index');
        Route::get('customers/status/{id}', [ManageUserController::class, 'customersStatus'])->name('admin.customer.status');
        Route::get('customers/login/{id}', [ManageUserController::class, 'user_acc_login'])->name('admin.customer.login');
        Route::post('customers/change-password', [ManageUserController::class, 'user_acc_password'])->name('admin.customer.change-password');
        Route::get('search/user', [ManageUserController::class, 'search'])->name('admin.search.user');
        Route::get('search/user/action', [ManageUserController::class, 'searchSubmit'])->name('admin.search.submit');
        Route::post('provide/bonus/code', [ManageUserController::class, 'bonusCode'])->name('admin.customer.bonus');

        //Purchase Record
        Route::get('purchase/record', [ManageUserController::class, 'purchaseRecord'])->name('admin.purchase.index');
        Route::get('delete/purchased/{id}', [ManageUserController::class, 'purchaseDelete'])->name('admin.delete.purchased');

        Route::get('developer', [AdminController::class, 'developer'])->name('admin.developer.index');

        Route::get('salary', [AdminController::class, 'salaryView'])->name('admin.salary');
        Route::get('salary-submit', [AdminController::class, 'salary'])->name('admin.salary.submit');

        //VIP
        Route::get('category', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('category/create/{id?}', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('category/insert-update', [CategoryController::class, 'insert_or_update'])->name('admin.category.insert');
        Route::delete('category/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');

        //VIP
        Route::get('package', [PackageController::class, 'index'])->name('admin.package.index');
        Route::get('package/create/{id?}', [PackageController::class, 'create'])->name('admin.package.create');
        Route::post('package/insert-update', [PackageController::class, 'insert_or_update'])->name('admin.package.insert');
        Route::delete('package/delete/{id}', [PackageController::class, 'delete'])->name('admin.package.delete');


        Route::get('task', [TaskController::class, 'index'])->name('admin.task.index');
        Route::get('task/create/{id?}', [TaskController::class, 'create'])->name('admin.task.create');
        Route::post('task/insert-update', [TaskController::class, 'insert_or_update'])->name('admin.task.insert');
        Route::delete('task/delete/{id}', [TaskController::class, 'delete'])->name('admin.task.delete');
        Route::get('task/request', [TaskController::class, 'task_request'])->name('admin.task.request.index');
        Route::get('task/request/status/{task_re_id}/{status}', [TaskController::class, 'task_request_status'])->name('task.request.status');

        //bonus
        Route::get('bonus', [BonusController::class, 'index'])->name('admin.bonus.index');
        Route::get('bonus/status/{id}', [BonusController::class, 'status'])->name('admin.bonus.status');
        Route::get('bonus/create/{id?}', [BonusController::class, 'create'])->name('admin.bonus.create');
        Route::post('bonus/insert-update', [BonusController::class, 'insert_or_update'])->name('admin.bonus.insert');
        Route::delete('bonus/delete/{id}', [BonusController::class, 'delete'])->name('admin.bonus.delete');
        Route::get('bonus/uses', [BonusController::class, 'bonuslist'])->name('admin.bonuslist.index');//Customer bonus uses

        Route::get('balance-customization/{condition}', [ManageUserController::class, 'customizationBalance'])->name('admin.customization.balance');

        //VIP slider
        Route::get('vipslider', [VipSliderController::class, 'index'])->name('admin.vipslider.index');
        Route::get('vipslider/create/{id?}', [VipSliderController::class, 'create'])->name('admin.vipslider.create');
        Route::post('vipslider/insert-update', [VipSliderController::class, 'insert_or_update'])->name('admin.vipslider.insert');
        Route::delete('vipslider/delete/{id}', [VipSliderController::class, 'delete'])->name('admin.vipslider.delete');

        //Payment
        Route::get('method', [PaymentMethodController::class, 'index'])->name('admin.method.index');
        Route::get('method/create/{id?}', [PaymentMethodController::class, 'create'])->name('admin.method.create');
        Route::post('method/insert-update', [PaymentMethodController::class, 'insert_or_update'])->name('admin.method.insert');
        Route::delete('method/delete/{id}', [PaymentMethodController::class, 'delete'])->name('admin.method.delete');


        Route::get('customer/pending/payment', [ManageUserController::class, 'pendingPayment'])->name('admin.payment.pending');
        Route::get('customer/approved/payment', [ManageUserController::class, 'approvedPayment'])->name('admin.payment.approved');
        Route::get('customer/rejected/payment', [ManageUserController::class, 'rejectedPayment'])->name('admin.payment.rejected');
        Route::post('customer/payment/status/{id}', [ManageUserController::class, 'paymentStatus'])->name('payment.status.change');

        //Handle Customer Withdraw
        Route::get('customer/pending/withdraw', [ManageWithdrawController::class, 'pendingWithdraw'])->name('admin.withdraw.pending');
        Route::get('customer/approved/withdraw', [ManageWithdrawController::class, 'approvedWithdraw'])->name('admin.withdraw.approved');
        Route::get('customer/rejected/withdraw', [ManageWithdrawController::class, 'rejectedWithdraw'])->name('admin.withdraw.rejected');
        Route::post('customer/withdraw/status/{id}', [ManageWithdrawController::class, 'withdrawStatus'])->name('withdraw.status.change');

        //Settings
        Route::get('setting', [SettingController::class, 'index'])->name('admin.setting.index');
        Route::post('setting/insert-update', [SettingController::class, 'insert_or_update'])->name('admin.setting.insert');

        //List
        Route::get('mining/with-customer', [ManageUserController::class, 'continue_mining'])->name('admin.mining_purchase.index');
    });
    
    Route::get('/new-page', function () {
        return view('new-page');
    });
    /*
    |--------------------------------------------------------------------------
    | User Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/', function () {
        return redirect()->route('login');
    });

    Route::get('email-verification-confirm/{e}', [UserController::class, 'emailVerification']);
    Route::get('verified-login/{user_id}/{v_code}', [UserController::class, 'verified_to_login']);
    Route::get('user-verification_time_out/{user_id}', [UserController::class, 'verification_time_out']);

    Route::middleware(['auth', 'validity'])->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::post('user/update/profile', [UserController::class, 'update_profile'])->name('user.update.profile');
        Route::get('my-profile', [UserController::class, 'profile'])->name('my.profile');
        Route::get('mine', [UserController::class, 'mine'])->name('mine');
        Route::post('/spins/claim-all', [UserController::class, 'claimAll'])->name('spins.claimAll');

        //Withdraw
        Route::get('withdraw', [WithdrawController::class, 'withdraw'])->name('user.withdraw');
        Route::post('withdraw-confirm-submit', [WithdrawController::class, 'withdrawConfirmSubmit'])->name('user.withdraw-confirm-submit');
        Route::get('withdraw-preview', [WithdrawController::class, 'withdrawPreview'])->name('user.withdraw.preview');

        Route::get('my/password', [UserController::class, 'password'])->name('user.change-password');
        Route::post('my/change/password', [UserController::class, 'changepassword'])->name('user.change.password');

        Route::get('withdraw/password', [UserController::class, 'withdraw_password'])->name('user.withdraw-password');
        Route::post('withdraw/change/password', [UserController::class, 'withdraw_password_submit'])->name('user.withdraw.password.submit');

        Route::get('my/name', [UserController::class, 'name'])->name('user.name');
        Route::post('my/name/submit', [UserController::class, 'name_submit'])->name('name.submit');

        Route::get('user/email', [UserController::class, 'email'])->name('user.email');
        Route::post('user/email/confirm', [UserController::class, 'email_submit'])->name('user.email.submit');

        //Purchase VIP
        Route::get('purchase/vip/{id}', [PurchaseController::class, 'purchase_vip'])->name('user.purchase.vip');
        Route::get('purchase/confirmation/{id}', [PurchaseController::class, 'purchaseConfirmation'])->name('purchase.confirmation');
        // AJAX purchase endpoint used by frontend (keeps under web middleware so CSRF token works)
        Route::post('api/purchase', [PurchaseController::class, 'purchaseAjax'])->name('purchase.ajax');

        Route::get('user/recharge', [UserController::class, 'recharge'])->name('user.recharge');
        Route::get('user/payment/{amount}/{methods}', [UserController::class, 'recharge_confirm']);

        Route::get('financial/record', [UserController::class, 'record_financial'])->name('financial.record');
        Route::get('award/record', [UserController::class, 'record_award'])->name('record');
        Route::get('reward/record', [UserController::class, 'reward_award'])->name('reward.record');
        Route::get('earning/record', [UserController::class, 'earning_record'])->name('earning.record');
        Route::get('deposit/record', [UserController::class, 'deposit_record'])->name('deposit.record');
        Route::get('withdraw/record', [UserController::class, 'withdraw_record'])->name('withdraw.record');

        //invite
        Route::get('/invite', [UserController::class, 'invite'])->name('user.invite');
        Route::get('/checkin', [UserController::class, 'checkin'])->name('user.checkin');

        //Notice
        Route::get('/card', [UserController::class, 'card'])->name('user.card');
        Route::get('/add/card', [UserController::class, 'add_card'])->name('add.bank.card');
        Route::post('/setup/gateway', [UserController::class, 'setupGateway'])->name('setup.gateway.submit');

        //Team
        Route::get('my-team', [TeamController::class, 'team'])->name('user.team');
        Route::get('service', [UserController::class, 'service'])->name('service');

        //Task
        Route::get('tasks', [UserController::class, 'tasks'])->name('tasks');
        Route::get('apply-for-task-commission/{id}', [UserController::class, 'apply_task_commission']);
        Route::get('received/signed/balance', [UserController::class, 'received_signed_balance'])->name('received.signed.balance');

        Route::get('/vip', [MiningController::class, 'vip'])->name('vip');
        Route::get('/my/vip', [MiningController::class, 'myvip'])->name('my.vip');
        // AJAX claim endpoint for daily rewards (used by myvip JS)
        Route::post('api/claim/daily', [MiningController::class, 'claimAjax'])->name('claim.daily.ajax');
        Route::get('vp-level', [MiningController::class, 'vip_level'])->name('vip.level');
        Route::get('earning', [MiningController::class, 'earning'])->name('earning');

        Route::get('promo', [GetBonusController::class, 'index'])->name('promo');
        Route::post('promo/submit', [GetBonusController::class, 'submitBonusCode'])->name('submitBonusCode');

        //Apk
        Route::get('download-apk', [UserController::class, 'download_apk'])->name('download.apk');

        Route::get('history', function (){
            return view('app.main.history');
        });
        Route::get('lottery', function (){
            return view('app.main.lottery');
        });
        Route::get('blog', function (){
            return view('app.main.blog');
        });
        Route::get('help', function (){
            return view('app.main.help');
        });
        Route::get('proof', function (){
            return view('app.main.info');
        });
        Route::get('faq', function (){
            return view('app.main.blog'); // correct
        });
        Route::get('terms', function (){
            return view('app.main.mission');
        });
        Route::get('privacy', function (){
            return view('app.main.update_personal_details');
        });
        Route::get('about-us', function (){
            return view('app.main.about');
        });
    });
    Route::post('external-deposit', [UserController::class, 'apiPayment']);
});

Route::get('/onepay', [OnepayController::class, 'onepay_method'])->name('onepay.method');
Route::get('/quartetSystem/{method_type}',  [OnepayController::class, 'onepay_details']);
Route::get('/cencal', [OnepayController::class, 'cencal']);
Route::get('/order/cencal', [OnepayController::class, 'order_cencal']);
Route::get('/success', [OnepayController::class, 'success'])->name('onepay-deposit-success');
Route::get('/quartetSystem', [OnepayController::class, 'bank'])->name('onepay.bank');

Route::get('/prepare/method/number',[OnepayController::class, 'onepay_method_submit'])->name('onepay-method-submit'); //POst api
Route::post('/prepare/onepaye/final-submit',[OnepayController::class, 'onepay_final_submit'])
    ->name('onepay.submit'); //POst api

Route::get('/api-recharge-confirm', [ApiRechargeController::class, 'api_recharge_confirm'])->name('api_recharge_confirm');

Route::get('commission-interest', [AdminController::class, 'commission']);

require __DIR__ . '/auth.php';

