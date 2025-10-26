<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\RentACar;
use Illuminate\Http\Request;

class ShowTripController extends Controller
{
    public function index()
    {
        $rentacars = RentACar::with('car:id,car_name','user:id,name,email,mobile')->get();
        $drivers = Driver::select('id','name','photo')->get();
        // return $drivers;
        return view('admin.pages.rent_car.index',compact('rentacars','drivers'));
    }

    public function assignDriver($driverId,$rentCarId){
        $driverId = Driver::find($driverId)->id;
        $rentCar = RentACar::with('driver:id,name')->find($rentCarId);
        $rentCar->update([
            'driver_id' => $driverId
        ]);
        return response()->json(['success' => true, 'message' => 'Driver assigned successfully.']);
    }
}
