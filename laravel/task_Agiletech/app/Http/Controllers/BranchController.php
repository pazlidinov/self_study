<?php

namespace App\Http\Controllers;

use App\Http\Resources\BranchResource;
use App\Models\Branch;
use App\Models\Img;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * @OA\Get(
     *     path="/api/branch",
     *     summary="Get a list of branchs",
     *     tags={"branch"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function index()
    {
        return BranchResource::collection(Branch::all());
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * @OA\Post(
     *     path="/api/branch/",
     *     summary="Store a newl branch created resource in storage.",
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="branch's name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="brand_id",
     *         in="query",
     *         description="Branch's brand_id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="district_id",
     *         in="query",
     *         description="Branch's district_id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="The branch was successfully created"),
     *   
     * )
     */
    public function store(Request $request)
    {

        $branch = Branch::create([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'district_id' => $request->district_id,
        ]);
        $i = 0;
        $branch_imgs = [];
        while (true) {
            $i++;
            if ($request->hasFile('img-' . $i . '')) {
                $name = $request->file('img-' . $i . '')->getClientOriginalName();
                $path = $request->file('img-' . $i . '')->storeAs('branch-img', $name);
                array_push(
                    $branch_imgs,
                    array(
                        'branch_id' => $branch->id,
                        'img' => $path ?? null
                    )
                );
            } else {
                break;
            }
        }
        Img::insert($branch_imgs);

        return ['The branch was successfully created'];
    }

    /**
     * Display the specified resource.
     */

    /**
     * @OA\Get(
     *     path="/api/branch/id",
     *     summary="Display the details of branch.",
     *     tags={"branch"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     
     * )
     */
    public function show(Branch $branch)
    {
        return new BranchResource($branch);
    }

    /**
     * Update the specified resource in storage.
     */

    /**
     * @OA\PUT(
     *     path="/api/branch/id",
     *     summary="Update the  branch in storage.",
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="Branch's name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="brand_id",
     *         in="query",
     *         description="Branch's brand_id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="district_id",
     *         in="query",
     *         description="Branch's district_id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="img",
     *         in="query",
     *         description="Branch's imgs",
     *         required=true,
     *         @OA\Schema(type="file")
     *     ),
     *     @OA\Response(response="200", description="The branch was successfully updated"),
     *   
     * )
     */
    public function update(Request $request, Branch $branch)
    {
        $i = 0;
        $branch_imgs = Img::where('branch_id', $branch->id)->get();
        while (true) {
            $i++;
            if ($request->hasFile('img-' . $i . '')) {
                $name = $request->file('img-' . $i . '')->getClientOriginalName();
                $path = $request->file('img-' . $i . '')->storeAs('branch-img', $name);
                $branch_imgs[$i - 1]::update([
                    'img' => $path ?? null
                ]);
            } else {
                break;
            }
        }



        $branch->update([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'district' => $request->district_id,     
        ]);

        return ['The branch was successfully updated'];
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * @OA\DELETE(
     *     path="/api/branch/id",
     *     summary="Remove the branch from storage.",
     *     tags={"branch"},
     *     @OA\Response(response=200, description="The branch was successfully deleted"),
     *     
     * )
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
        return ['The branch was successfully deleted'];
    }
}
