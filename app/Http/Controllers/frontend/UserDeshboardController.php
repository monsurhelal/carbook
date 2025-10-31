<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\RentACar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDeshboardController extends Controller
{
    public function index()
    {
        $authUser = Auth::user()->id;
        $rentACar = RentACar::with('car:id,image,car_name,car_seats,car_luggage','driver:id,name,mobile,photo')
        ->select('id','car_id','driver_id','user_id','pick_up_location','drop_off_location','pick_up_date','drop_off_date','pick_up_time','payment')
        ->where('user_id',$authUser)->get();
        // return $rentACar[0];
        return view('frontend.pages.deshboard.user_deshboard',compact('rentACar'));
    }
}
