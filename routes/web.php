<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CarController;
use App\Http\Controllers\backend\DriverController;
use App\Http\Controllers\Backend\FeatureController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\PriceController;
use App\Http\Controllers\backend\ShowTripController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\RentACarController;
use App\Http\Controllers\frontend\UserDeshboardController;
use App\Http\Controllers\frontend\UserLoginController;
use App\Models\Car;
use Illuminate\Support\Facades\Route;





Route::get('/',[HomeController::class,'index'])->name('home');
Route::resource('rentacar', RentACarController::class)->middleware('userAuth');
// Route::get('/car/{id}',[RentACarController::class,'getCarId']);
Route::get('/car/{id}',function($id){
    $car = Car::with('price:id,car_id,daily')->select('id','image','car_name')->find($id);
    return response()->json([
    'success' => $car
    ]);
});



// login routes here
Route::get('/login',[UserLoginController::class,'loginForm'])->name('login.form');
Route::post('/login',[UserLoginController::class,'login'])->name('login.user');
Route::get('/user-logout',[UserLoginController::class,'userLogout'])->name('logout.user');
Route::get('/registation',[UserLoginController::class,'registationForm'])->name('registation.form');
Route::post('/registation',[UserLoginController::class,'registation'])->name('registation.store');

Route::get('user/deshboard',[UserDeshboardController::class,'index'])->name('user.deshboard')->middleware('userAuth');;



/// admin routes 
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
        Route::resource('/driver',DriverController::class);
        Route::resource('/price',PriceController::class);
        Route::get('/show-trip',[ShowTripController::class,'index'])->name('show.trip');
        Route::get('/assign-driver/{driverId}/{rentCarId}',[ShowTripController::class,'assignDriver']);
    });
});



