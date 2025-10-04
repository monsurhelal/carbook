<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Feature;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::with('features:id,feature')
        ->select('id','image','car_name','car_description','car_mileage','car_transmission','car_seats','car_luggage','car_fuel','updated_at')->get();
        // return $cars;
        return view('admin.pages.car.index',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $features = Feature::select('id','feature')->get();
        // return $features;
        return view('admin.pages.car.create',compact('features'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
