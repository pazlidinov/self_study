<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReplayCommentsResource;
use App\Models\ReplayComments;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ReplayCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *     path="/api/replaycomments",
     *     summary="Get a list of replaycommentss",
     *     tags={"replaycomments"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function index()
    {
        return ReplayCommentsResource::collection(ReplayComments::all());
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
     *     path="/api/replaycomments/",
     *     summary="Store a newl replaycomments created resource in storage.",
     *      tags={"replaycomments"},
     *     @OA\Parameter(
     *         name="user_id",
     *         in="query",
     *         description="replaycomments's user_id",
     *         required=true,
     *         @OA\Schema(type="int")
     *     ),
     *     @OA\Parameter(
     *         name="comments_id",
     *         in="query",
     *         description="replaycomments's comments_id",
     *         required=true,
     *         @OA\Schema(type="int")
     *     ),
     *     @OA\Parameter(
     *         name="replaycomment",
     *         in="query",
     *         description="replaycomments's replaycomment",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *          
     *     @OA\Response(response="200", description="The replaycomments was successfully created"),
     *   
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'comments_id' => 'required',
            'replaycomment' => 'required',
        ]);

        ReplayComments::create([
            'user_id' => $request->user_id,
            'comments_id' => $request->comments_id,
            'replaycomment' => $request->replaycomment
        ]);

        return ['The replaycomment was successfully created'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReplayComments  $replayComments
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *     path="/api/replaycomments/id",
     *     summary="Display the details of replaycomments.",
     *     tags={"replaycomments"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     
     * )
     */
    public function show(ReplayComments $replayComments)
    {
        return new ReplayCommentsResource($replayComments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReplayComments  $replayComments
     * @return \Illuminate\Http\Response
     */
    public function edit(ReplayComments $replayComments)
    {
        return new ReplayCommentsResource($replayComments);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReplayComments  $replayComments
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Put(
     *     path="/api/replaycomments/id",
     *     summary="Update the  replaycomments in storage.",
     *      tags={"replaycomments"},
     *    
     *          @OA\Parameter(
     *         name="user_id",
     *         in="query",
     *         description="replaycomments's user_id",
     *         required=true,
     *         @OA\Schema(type="int")
     *     ),
     *     @OA\Parameter(
     *         name="comments_id",
     *         in="query",
     *         description="replaycomments's comments_id",
     *         required=true,
     *         @OA\Schema(type="int")
     *     ),
     *     @OA\Parameter(
     *         name="replaycomment",
     *         in="query",
     *         description="replaycomments's replaycomment",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="The replaycomments was successfully updated"),
     *   
     * )
     */
    public function update(Request $request, ReplayComments $replayComments)
    {
        $replayComments->update([
            'user_id' => $request->user_id,
            'comments_id' => $request->comments_id,
            'replaycomment' => $request->replaycomment
        ]);

        return ['The replaycomment was successfully updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReplayComments  $replayComments
     * @return \Illuminate\Http\Response
     */
     /**
     * @OA\Delete(
     *     path="/api/replaycomments/id",
     *     summary="Remove the replaycomments from storage.",
     *     tags={"replaycomments"},
     *     @OA\Response(response=200, description="The replaycomments was successfully deleted"),
     *     
     * )
     */
    public function destroy(ReplayComments $replayComments)
    {
        $replayComments->delete();
        return ['The replayComment was successfully deleted'];
    }
}
