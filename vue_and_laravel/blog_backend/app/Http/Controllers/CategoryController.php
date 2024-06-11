<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *     path="/api/category",
     *     summary="Get a list of categorys",
     *     tags={"category"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function index()
    {
        return CategoryResource::collection(Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Post(
     *     path="/api/category/",
     *     summary="Store a newl category created resource in storage.",
     *      tags={"category"},
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="category's name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *          
     *     @OA\Response(response="200", description="The category was successfully created"),
     *   
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories'
        ]);

        Category::create([
            'name' => $request->name
        ]);
        return ['The category was successfully created'];
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *     path="/api/category/id",
     *     summary="Display the details of category.",
     *     tags={"category"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     
     * )
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Put(
     *     path="/api/category/id",
     *     summary="Update the  category in storage.",
     *      tags={"category"},
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="category's name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),     *    
     *        
     *     @OA\Response(response="200", description="The category was successfully updated"),
     *   
     * )
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories'
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return ['The category was successfully updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Delete(
     *     path="/api/category/id",
     *     summary="Remove the category from storage.",
     *     tags={"category"},
     *     @OA\Response(response=200, description="The category was successfully deleted"),
     *     
     * )
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return ['The category was successfully deleted'];
    }
}
