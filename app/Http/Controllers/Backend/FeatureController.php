<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeatureStoreRequest;
use App\Models\Feature;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = Feature::select('id','feature','updated_at')->get();
        // return $features;
       return view('admin.pages.feature.index',compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.feature.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeatureStoreRequest $request)
    {
        Feature::updateOrCreate([
            'feature' => $request->feature_name
        ]);
        Toastr::success('feature created successfuly!');
        return redirect()->route('feature.index');
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
        $feature = Feature::find($id);
        // return $feature;
        return view('admin.pages.feature.edit',compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FeatureStoreRequest $request, string $id)
    {

        $feature = Feature::find($id);
        $feature->update([
            'feature' => $request->feature_name
        ]);
        Toastr::success('feature updated successfuly!');
        return redirect()->route('feature.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       Feature::find($id)->delete();
       Toastr::success('feature deleted successfuly!');
       return redirect()->route('feature.index');
    }
}
