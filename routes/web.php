<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::prefix(LaravelLocalization::setLocale())->group(function(){
    Route::prefix('admin')->name('admin.')->middleware('auth','userType','verified')->group(function(){
        Route::get('/', [AdminController::class,'index'])->name("index");
        Route::resource('category', CategoryController::class);
        Route::resource('product',ProductController::class);
    });

});

Auth::routes(['verify'=>true]);



Route::view('no-access', 'error404');


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
