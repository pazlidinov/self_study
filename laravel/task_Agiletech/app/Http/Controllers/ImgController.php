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
    public function index()
    {
        return ImgResource::collection(Img::all());
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
        if ($request->hasFile('img')) {
            $name = $request->file('img')->getClientOriginalName();
            $path = $request->file('branch-imgs')->storeAs('brand-img', $name);
        }
        Img::create([
            'branch_id'=>$request->branch_id,
            'img'=>$path ?? null
        ]);

        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(Img $img)
    {
        return new ImgResource($img);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Img $img)
    {
        return new ImgResource($img);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Img $img)
    {
        if ($request->hasFile('img')) {
            $name = $request->file('img')->getClientOriginalName();
            $path = $request->file('img')->storeAs('brand-img', $name);
        }
        $img->update([
            'branch_id'=>$request->branch_id,
            'img'=>$path ?? null
        ]);

        return ['The img was successfully updated'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Img $img)
    {
        $img->delete();
        return ['The img was successfully deleted'];
    }
}
