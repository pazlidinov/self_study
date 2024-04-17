<?php

namespace App\Http\Controllers;

use App\Http\Resources\RegionResource;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RegionResource::collection(Region::all());
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
        Region::create([
            'name' => $request->name,
        ]);

        return ['The region was successfully created'];
    }

    /**
     * Display the specified resource.
     */
    public function show(Region $region)
    {
        return new RegionResource($region);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Region $region)
    {
        return new RegionResource($region);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Region $region)
    {
        $region->create([
            'name' => $request->name,
        ]);

        return ['The region was successfully updated'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        $region->delete();
        return ['The region was successfully deleted'];
    }
}
