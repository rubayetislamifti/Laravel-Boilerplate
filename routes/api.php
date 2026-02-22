<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController
};

Route::prefix('auth')->group(function () {
    Route::post('register',[AuthController::class,'register']);
    Route::post('verifyOtp',[AuthController::class,'verifyOtp']);
    Route::post('resendOtp',[AuthController::class,'resendOtp']);
    Route::post('forgetPassword/otp/send',[AuthController::class,'forgetPasswordOTPSend']);
    Route::post('forgetPassword',[AuthController::class,'forgetPassword']);
    Route::post('login',[AuthController::class,'login']);
});


Route::middleware(['jwt.auth'])->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('change-password',[AuthController::class,'changePassword']);
        Route::post('logout',[AuthController::class,'logout']);
    });
});
