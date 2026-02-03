<?php

use App\Http\Controllers\user\OnepayController;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiRechargeController;
use Illuminate\Support\Facades\Route;

Route::get('/api-recharge/{type?}', [ApiRechargeController::class, 'api_recharge'])->name('api_recharge');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('number/{type}', [OnepayController::class, 'return_number']);
Route::get('deposit/submit', [OnepayController::class, 'depositSubmit']);
