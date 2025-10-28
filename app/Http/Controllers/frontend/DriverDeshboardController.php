<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\RentACar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DriverDeshboardController extends Controller
{
    
    public function driverDeshboard(){
        $driverId = Auth::guard('driver')->id();
        $authDriver =Driver::with('rentACar','car')->find($driverId);
        // dd($authDriver->rentACar->pick_up_location);
        return view('frontend.pages.driver.deshboard.driver_deshboard',compact('authDriver'));
    }

    public function paymentStatus($id){
        $rentACar = RentACar::find($id);
        $rentACar->update([
            'driver_id' => null,
            'payment_status' => '1',
            'status' => '1',
        ]);
        return back()->with('success','Payment status updated successfully');
    }
}
