<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Price;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prices = Price::with('car:id,image,car_name')->get();
        // return $prices;
        return view('admin.pages.price.index',compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cars = Car::select('id','car_name')->get();
        // return $cars;
        return view('admin.pages.price.create',compact('cars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       Price::updateOrCreate([
        'car_id' => $request->carId,
        'hourly' => $request->hourly,
        'daily' => $request->daily,
        'monthly' => $request->monthly,
        'fuel_charge' => $request->fuelCharge,
       ]);
       Toastr::success('price created successfully!');
       return redirect()->route('price.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cars = Car::select('id','car_name')->get();
        $price = Price::find($id);
        // return $price;
        return view('admin.pages.price.edit',compact('price','cars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $price = Price::find($id);
        $price->update([
        'car_id' => $request->carId,
        'hourly' => $request->hourly,
        'daily' => $request->daily,
        'monthly' => $request->monthly,
        'fuel_charge' => $request->fuelCharge,
        ]);

        Toastr::success('price updated successfully!');
        return redirect()->route('price.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Price::find($id)->delete();
        Toastr::success('price deleted successfully!');
        return redirect()->route('price.index');
    }
}
