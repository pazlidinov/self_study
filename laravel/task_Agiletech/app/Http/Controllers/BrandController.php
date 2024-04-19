<?php

namespace App\Http\Controllers;

use App\Http\Resources\BrandResource;
use App\Models\Brand;
use Illuminate\Http\Request;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * @OA\Get(
     *     path="/api/brand",
     *     summary="Get a list of brands",
     *     tags={"brand"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function index()
    {
        return BrandResource::collection(Brand::all());
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * @OA\Post(
     *     path="/api/brand/",
     *     summary="Store a newl brand created resource in storage.",
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="brand's name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *    
     *     @OA\Parameter(
     *         name="img",
     *         in="query",
     *         description="brand's img",
     *         required=true,
     *         @OA\Schema(type="file")
     *     ),
     *     @OA\Response(response="200", description="The brand was successfully created"),
     *   
     * )
     */
    public function store(Request $request)
    {
        if ($request->hasFile('img')) {
            $name = $request->file('img')->getClientOriginalName();
            $path = $request->file('img')->storeAs('brand-img', $name);
        }

        Brand::create([
            'name' => $request->name,
            'img' => $path ?? null,
        ]);

        return ['The brand was successfully created'];
    }

    /**
     * Display the specified resource.
     */
    /**
     * @OA\Get(
     *     path="/api/brand/id",
     *     summary="Display the details of brand.",
     *     tags={"brand"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     
     * )
     */
    public function show(Brand $brand)
    {
        return new BrandResource($brand);
    }

    /**
     * Update the specified resource in storage.
     */
     /**
     * @OA\PUT(
     *     path="/api/brand/id",
     *     summary="Update the  brand in storage.",
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="brand's name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="brand_id",
     *         in="query",
     *         description="brand's brand_id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *          *     @OA\Parameter(
     *         name="img",
     *         in="query",
     *         description="brand's imgs",
     *         required=true,
     *         @OA\Schema(type="file")
     *     ),
     *     @OA\Response(response="200", description="The brand was successfully updated"),
     *   
     * )
     */
    public function update(Request $request, Brand $brand)
    {
        if ($request->hasFile('img')) {
            $name = $request->file('img')->getClientOriginalName();
            $path = $request->file('img')->storeAs('brand-img', $name);
        }
        $brand->update([
            'name' => $request->brand_name,
            'img' => $path ?? null,
        ]);

        return ['The brand was successfully updated'];
    }

    /**
     * Remove the specified resource from storage.
     */

     /**
     * @OA\DELETE(
     *     path="/api/brand/id",
     *     summary="Remove the brand from storage.",
     *     tags={"brand"},
     *     @OA\Response(response=200, description="The brand was successfully deleted"),
     *     
     * )
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return ['The brand was successfully deleted'];
    }
}
