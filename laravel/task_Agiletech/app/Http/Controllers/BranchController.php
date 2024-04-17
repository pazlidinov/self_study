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
    public function index()
    {
        return BranchResource::collection(Branch::all());
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
        $branch = new Branch;
        $branch->name = $request->name;
        $branch->brand_id = $request->brand_id;
        $branch->district_id = $request->district_id;
        $branch->save();
        if ($request->hasFile('img')) {
            foreach ($request->file('img') as $imgfile) {
                $img = new Img;
                $name = $imgfile->getClientOriginalName();
                $path = $imgfile->storeAs('brand-img', $name);
                $img->branch_id = $branch->id;
                $img->img = $path;
                $img->save();
            }
        }

        return ['The branch was successfully created'];
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        return new BranchResource($branch);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        return new BranchResource($branch);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        if ($request->hasFile('img')) {
            $name = $request->file('img')->getClientOriginalName();
            $path = $request->file('img')->storeAs('brand-img', $name);
        }
        $branch->update([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'district' => $request->district_id,
            'img' => $path ?? null
        ]);

        return ['The branch was successfully updated'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
        return ['The branch was successfully deleted'];
    }
}
