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
    /**
     * @OA\Get(
     *     path="/api/district",
     *     summary="Get a list of districts",
     *     tags={"district"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function index()
    {
        return DistrictResource::collection(District::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    /**
     * @OA\Post(
     *     path="/api/district/",
     *     summary="Store a newl district created resource in storage.",
     *       tags={"district"},
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="district's name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *    
     *     @OA\Parameter(
     *         name="region_id",
     *         in="query",
     *         description="district's region_id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="The district was successfully created"),
     *   
     * )
     */
    public function store(Request $request)
    {
        District::create([
            'name' => $request->name,
            'region_id' => $request->region_id
        ]);

        return ['The district was successfully created'];
    }

    /**
     * Display the specified resource.
     */

     /**
     * @OA\Get(
     *     path="/api/district/id",
     *     summary="Display the details of district.",
     *     tags={"district"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     
     * )
     */
    public function show(District $district)
    {
        return new DistrictResource($district);
    }
  
     /**
     * Update the specified resource in storage.
     */
     /**
     * @OA\Put(
     *     path="/api/district/id",
     *     summary="Update the  district in storage.",
     *     tags={"district"},
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="district's name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="region_id",
     *         in="query",
     *         description="district's region_id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *        
     *     @OA\Response(response="200", description="The district was successfully updated"),
     *   
     * )
     */
    public function update(Request $request, District $district)
    {
        $district->update([
            'name' => $request->name,
            'region_id' => $request->region_id
        ]);

        return ['The district was successfully updated'];
    }

    /**
     * Remove the specified resource from storage.
     */

      /**
     * @OA\Delete(
     *     path="/api/district/id",
     *     summary="Remove the district from storage.",
     *     tags={"district"},
     *     @OA\Response(response=200, description="The district was successfully deleted"),
     *     
     * )
     */
    public function destroy(District $district)
    {
        $district->delete();
        return ['The district was successfully deleted'];
    }
}
