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
    /**
     * @OA\Get(
     *     path="/api/region",
     *     summary="Get a list of regions",
     *     tags={"region"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function index()
    {
        return RegionResource::collection(Region::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * @OA\Post(
     *     path="/api/regiob/",
     *     summary="Store a newl regiob created resource in storage.",
     *      tags={"region"},
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="regiob's name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *          
     *     @OA\Response(response="200", description="The regiob was successfully created"),
     *   
     * )
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
    /**
     * @OA\Get(
     *     path="/api/region/id",
     *     summary="Display the details of region.",
     *     tags={"region"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     
     * )
     */
    public function show(Region $region)
    {
        return new RegionResource($region);
    }


    /**
     * Update the specified resource in storage.
     */
    /**
     * @OA\Put(
     *     path="/api/region/id",
     *     summary="Update the  region in storage.",
     *      tags={"region"},
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="region's name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="region_id",
     *         in="query",
     *         description="region's region_id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *        
     *     @OA\Response(response="200", description="The region was successfully updated"),
     *   
     * )
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
    /**
     * @OA\Delete(
     *     path="/api/region/id",
     *     summary="Remove the region from storage.",
     *     tags={"region"},
     *     @OA\Response(response=200, description="The region was successfully deleted"),
     *     
     * )
     */
    public function destroy(Region $region)
    {
        $region->delete();
        return ['The region was successfully deleted'];
    }
}
