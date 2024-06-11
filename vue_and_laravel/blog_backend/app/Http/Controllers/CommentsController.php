<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentsResource;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *     path="/api/comments",
     *     summary="Get a list of comments",
     *     tags={"comments"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function index()
    {
        return CommentsResource::collection(Comments::all());
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
     *     path="/api/comments/",
     *     summary="Store a newl comments created resource in storage.",
     *      tags={"comments"},
     *     @OA\Parameter(
     *         name="user_id",
     *         in="query",
     *         description="comments's user_id",
     *         required=true,
     *         @OA\Schema(type="int")
     *     ),
     *     @OA\Parameter(
     *         name="article_id",
     *         in="query",
     *         description="comments's article_id",
     *         required=true,
     *         @OA\Schema(type="int")
     *     ),
     *     @OA\Parameter(
     *         name="comment",
     *         in="query",
     *         description="comments's comment",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *          
     *     @OA\Response(response="200", description="The comments was successfully created"),
     *   
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric',
            'article_id' => 'required|numeric',
            'comment' => 'required|max:500',
        ]);
        Comments::create([
            'user_id' => $request->user_id,
            'article_id' => $request->article_id,
            'comment' => $request->comment,
        ]);

        return ['The comment was successfully created'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *     path="/api/comments/id",
     *     summary="Display the details of comments.",
     *     tags={"comments"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     
     * )
     */
    public function show(Comments $comments)
    {
        return new CommentsResource($comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit(Comments $comments)
    {
        return new CommentsResource($comments);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Put(
     *     path="/api/comments/id",
     *     summary="Update the  comments in storage.",
     *      tags={"comments"},
     *     @OA\Parameter(
     *         name="user_id",
     *         in="query",
     *         description="comments's user_id",
     *         required=true,
     *         @OA\Schema(type="int")
     *     ),
     *     @OA\Parameter(
     *         name="article_id",
     *         in="query",
     *         description="comments's article_id",
     *         required=true,
     *         @OA\Schema(type="int")
     *     ),
     *     @OA\Parameter(
     *         name="comment",
     *         in="query",
     *         description="comments's comment",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *        
     *     @OA\Response(response="200", description="The comments was successfully updated"),
     *   
     * )
     */
    public function update(Request $request, Comments $comments)
    {
        $comments->update([
            'user_id' => $request->user_id,
            'article_id' => $request->article_id,
            'comment' => $request->comment
        ]);

        return ['The comment was successfully updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Delete(
     *     path="/api/comments/id",
     *     summary="Remove the comments from storage.",
     *     tags={"comments"},
     *     @OA\Response(response=200, description="The comments was successfully deleted"),
     *     
     * )
     */
    public function destroy(Comments $comments)
    {
        $comments->delete();
        return ['The comment was successfully deleted'];
    }
}
