<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserCotntroller;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::prefix(LaravelLocalization::setLocale())->group(function(){
    Route::prefix('admin')->name('admin.')->middleware('auth','userType','verified')->group(function(){
        Route::get('/', [AdminController::class,'index'])->name("index");
        Route::resource('category', CategoryController::class);
        Route::resource('product',ProductController::class);
        Route::resource('user',UserCotntroller::class);
        Route::resource('order',OrderController::class);
    });

});
