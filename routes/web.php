<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('welcome');
});

Route::prefix('admin')->group(function(){
    // login routes 
    Route::get('login',[LoginController::class,'loginForm']);
    Route::post('login',[LoginController::class,'login'])->name('admin.login');
    Route::get('/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
});
