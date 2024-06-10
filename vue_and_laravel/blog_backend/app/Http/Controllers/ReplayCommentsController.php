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
    public function destroy(ReplayComments $replayComments)
    {
        $replayComments->delete();
        return ['The replayComment was successfully deleted'];
    }
}
