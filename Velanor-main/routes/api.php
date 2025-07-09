<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FollowerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPrivacySettingController;
use App\Http\Middleware\EmailIsVerified;

Route::get('users', [UserController::class,'index']);
Route::post('/register  ', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('forget-password', [AuthController::class,'ForgetPassword']);
Route::post('reset-password', [AuthController::class,'ResetPassword']);
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::group(['middleware'=> [EmailIsVerified::class]], function () {
        Route::get('messages', [MessageController::class,'Index']);
        Route::put('update-profile', [UserController::class,'update']);
        Route::get('profile', [UserController::class,'show']);
        Route::get('messages/{message}', [MessageController::class,'show']);
        Route::put('messages/{message}', [MessageController::class,'Favorite']);
        Route::delete('messages/{message}', [MessageController::class,'delete']);
        route::post('follow/{user}', [FollowerController::class, 'Follow']);
        route::post('unfollow/{user}', [FollowerController::class, 'UnFollow']);
        route::get('followers', [FollowerController::class, 'index']);
        route::get('privacy-settings', [UserPrivacySettingController::class, 'Show']);
        route::put('privacy-settings', [UserPrivacySettingController::class, 'Update']);
    });
    
    
    Route::post('logout  ', [AuthController::class, 'logout']);
    Route::post('email-verification', [AuthController::class, 'EmailVerification']);
    Route::post('resend-email-verification', [AuthController::class, 'ResendEmailVerification']);
});
Route::post('{username}', [MessageController::class, 'store']);

