<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RentACarStoreRequest;
use App\Models\Car;
use App\Models\RentACar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentACarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RentACarStoreRequest $request)
    {
        $userId = Auth::user()->id;
        $pick_up_date = date('d',strtotime($request->pick_up_date));
        $drop_off_date = date('d',strtotime($request->drop_off_date));
        $total_days = ($drop_off_date - $pick_up_date) + 1;

        $car = Car::with('price:id,car_id,daily')->select('id','car_name')->find($request->carId);
        $total_rent = $car->price->daily * $total_days;

         RentACar::Create([
            'car_id' => $request->carId,
            'user_id' => $userId,
            'pick_up_location' =>$request->Pick_up_location,
            'drop_off_location' => $request->drop_off_location,
            'pick_up_date' => $request->pick_up_date,
            'drop_off_date' => $request->drop_off_date,
            'pick_up_time' => $request->time_pick,
            'payment' => $total_rent,
            'payment_status' => '0',
            'status' => '0'
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    
    public function getCarId($id)
    {
        $car = Car::with('price:id,car_id,daily')->select('id','image','car_name')->find($id);
        return response()->json([
        'success' => $car
        ]);
   }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
