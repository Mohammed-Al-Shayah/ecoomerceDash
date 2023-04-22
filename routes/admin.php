<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserCotntroller;
use App\Notifications\NewUserNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::prefix(LaravelLocalization::setLocale())->group(function(){
    Route::prefix('admin')->name('admin.')->middleware('auth','userType','verified')->group(function(){
        Route::get('/', [AdminController::class,'index'])->name("index");
        Route::resource('category', CategoryController::class);
        Route::resource('product',ProductController::class);
        Route::resource('user',UserCotntroller::class);
        Route::resource('order',OrderController::class);
        Route::get('test',function(){
            return   dd(auth()->user()->notifcations);
        }
        );

    });

});

Route::get('send-notify', function() {
    $user = Auth::user();
    $user->notify(new NewUserNotification());
});
