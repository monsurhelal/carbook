<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Feature;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Laravel\Pail\Files;

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
        $image = $request->file('image');
        $path = 'admin/assets/images/cars';
        $new_name = time() .'.' . $image->getClientOriginalExtension();
        $image->move($path,$new_name);

        Car::updateOrCreate([
            'image' =>$new_name,
            'car_name' =>$request->car_name,
            'car_description' =>$request->ckeditor,
            'car_mileage' =>$request->car_mileage,
            'car_transmission' =>$request->car_transmission,
            'car_seats' =>$request->car_seats,
            'car_luggage' =>$request->car_luggage,
            'car_fuel' =>$request->car_fuel,
        ])->features()->sync($request->featuresId);

        Toastr::success('Cars Created successfully!');
        return redirect()->route('car.index');
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
