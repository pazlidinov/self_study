<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $comment = Comment::create(
            [
                'user_name' => $request->name,
                'product_id' => $id,
                'comment' => $request->comment
            ]
        );

        return redirect()->route(
            'show',
            ['id' => $id]
        );
    }
}
