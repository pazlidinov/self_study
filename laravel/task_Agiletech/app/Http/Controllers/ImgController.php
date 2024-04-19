<?php

namespace App\Http\Controllers;

use App\Http\Resources\ImgResource;
use App\Models\Img;
use Illuminate\Http\Request;

class ImgController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *     path="/api/img",
     *     summary="Get a list of imgs",
     *     tags={"img"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function index()
    {
        return ImgResource::collection(Img::all());
    }


    /**
     * Store a newly created resource in storage.
     */

    /**
     * @OA\Post(
     *     path="/api/img/",
     *     summary="Store a newl img created resource in storage.",
     *     @OA\Parameter(
     *         name="branch_id",
     *         in="query",
     *         description="img's branch_id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *    
     *     @OA\Parameter(
     *         name="img",
     *         in="query",
     *         description="img's img",
     *         required=true,
     *         @OA\Schema(type="file")
     *     ),
     *     @OA\Response(response="200", description="The img was successfully created"),
     *   
     * )
     */
    public function store(Request $request)
    {
        if ($request->hasFile('img')) {
            $name = $request->file('img')->getClientOriginalName();
            $path = $request->file('branch-imgs')->storeAs('brand-img', $name);
        }
        Img::create([
            'branch_id' => $request->branch_id,
            'img' => $path ?? null
        ]);

        return true;
    }

    /**
     * Display the specified resource.
     */

    /**
     * @OA\Get(
     *     path="/api/img/id",
     *     summary="Display the details of img.",
     *     tags={"img"},
     *     @OA\Response(response=200, description="Successful operation"),
     *    
     * )
     */
    public function show(Img $img)
    {
        return new ImgResource($img);
    }



    /**
     * Update the specified resource in storage.
     */

    /**
     * @OA\PUT(
     *     path="/api/img/id",
     *     summary="Update the  img in storage.",
     *     @OA\Parameter(
     *         name="branch_id",
     *         in="query",
     *         description="img's branch_id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *    
     *         @OA\Parameter(
     *         name="img",
     *         in="query",
     *         description="img's imgs",
     *         required=true,
     *         @OA\Schema(type="file")
     *     ),
     *     @OA\Response(response="200", description="The img was successfully updated"),
     *   
     * )
     */
    public function update(Request $request, Img $img)
    {
        if ($request->hasFile('img')) {
            $name = $request->file('img')->getClientOriginalName();
            $path = $request->file('img')->storeAs('brand-img', $name);
        }
        $img->update([
            'branch_id' => $request->branch_id,
            'img' => $path ?? null
        ]);

        return ['The img was successfully updated'];
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * @OA\DELETE(
     *     path="/api/img/id",
     *     summary="Remove the img from storage.",
     *     tags={"img"},
     *     @OA\Response(response=200, description="The img was successfully deleted"),
     *     
     * )
     */
    public function destroy(Img $img)
    {
        $img->delete();
        return ['The img was successfully deleted'];
    }
}
