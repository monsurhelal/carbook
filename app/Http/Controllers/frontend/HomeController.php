<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index(){
    $cars = Car::with('price')->select('id','image','car_name')->get();
    // return $cars;
    return view('frontend.pages.home.home',compact('cars'));
   }

}
