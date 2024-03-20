<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = Message::create([
            'name' => $request->user_name,
            'phone_number' => $request->phone_number,
            'message' => $request->message
        ]);

        return redirect()->route('home_page');
    }
}
