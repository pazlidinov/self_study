<?php

namespace App\Http\Controllers;

use App\Http\Resources\DistrictResource;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DistrictResource::collection(District::all());
    }

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
    public function store(Request $request)
    {
        District::create([
            'name'=>$request->name,
            'region_id'=>$request->region_id
        ]);

        return ['The district was successfully created'];
    }

    /**
     * Display the specified resource.
     */
    public function show(District $district)
    {
        return new DistrictResource($district);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(District $district)
    {
        return new DistrictResource($district);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, District $district)
    {
       $district->update([
            'name'=>$request->name,
            'region_id'=>$request->region_id
        ]);

        return ['The district was successfully updated'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(District $district)
    {
        $district->delete();
        return ['The district was successfully deleted'];
    }
}
