<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DriverStoreRequest;
use App\Models\Driver;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::select('id','name','email','mobile','photo','updated_at')->get();
        // return $drivers;
        return view('admin.pages.driver.index',compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.driver.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DriverStoreRequest $request)
    {
       if($request->hasFile('image')){
        $image = $request->file('image');
        $imageName = date('YmdHi').'.'. $image->getClientOriginalExtension();
        $imagePath = 'admin/assets/images/drivers/';
        $image->move($imagePath,$imageName);
       }

       Driver::Create([
        'name' => $request->driver_name,
        'email' => $request->driver_email,
        'mobile' => $request->driver_mobile,
        'password' => Hash::make($request->driver_password),
        'photo' => $imageName
       ]);
       Toastr::success('Driver added successfully!');
       return redirect()->route('driver.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $driver = Driver::find($id);
        return view('admin.pages.driver.edit',compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $driver = Driver::find($id);

        if($request->hasFile('image')){
        $image = $request->file('image');
        $imageName = date('YmdHi').'.'. $image->getClientOriginalExtension();
        $imagePath = 'admin/assets/images/drivers/';
        unlink($imagePath.$driver->photo);
        $image->move($imagePath,$imageName);
       }else{
        $imageName = $driver->photo;
       }

       $driver->update([
        'name' => $request->driver_name,
        'email' => $request->driver_email,
        'mobile' => $request->driver_mobile,
        'photo' => $imageName
       ]);
       Toastr::success('Driver updated successfully!');
       return redirect()->route('driver.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Driver::find($id)->delete();
        Toastr::success('Driver deleted successfully!');
        return redirect()->route('driver.index');
    }
}
