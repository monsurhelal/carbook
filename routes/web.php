<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CarController;
use App\Http\Controllers\Backend\FeatureController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\PriceController;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('welcome');
});

Route::prefix('admin')->group(function(){
    // login routes 
    Route::get('login',[LoginController::class,'loginForm']);
    Route::post('login',[LoginController::class,'login'])->name('admin.login');
    Route::get('logout',[LoginController::class,'logout'])->name('admin.logout');


    // dashboard routes
    Route::middleware('adminAuth')->group(function(){
        
        Route::get('/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
        Route::resource('/feature',FeatureController::class);
        Route::resource('/car',CarController::class);
        Route::resource('/price',PriceController::class);
    });
});
