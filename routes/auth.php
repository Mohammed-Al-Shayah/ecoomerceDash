<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify'=>true]);


Route::prefix('forgot-password')->name('password.')->group(function(){
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
->name('request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
->name('email');

});



Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'reset'])
->name('password.update');


