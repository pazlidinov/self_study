<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserResource::collection(User::all());
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
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required',
            'password' => 'required'
        ]);
        $pattern="/^\\+?[1-9][0-9]{7,14}$/";
        if (preg_match( $pattern, $request->phone_number) ){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->phone_number,
                'password' => $request->password
            ]);

            $token = $user->createToken('LaravelAuthApp')->plainTextToken;

            return response()->json(['token' => $token, 200]);
        } else {
            return ['User was not created, something is wrong!'];
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new UserResource(User::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return new UserResource(User::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required',
            'password' => 'required'
        ]);
        $pattern="/^\\+?[1-9][0-9]{7,14}$/";
        if (preg_match( $pattern, $request->phone_number) ){
            $user=User::find($id);
            $user ->update([
                'name' => $request->name,
                'email' => $request->phone_number,
                'password' => $request->password
            ]);

           

            return ['The user was successfully updated'];
        } else {
            return ['User was not update, something is wrong!'];
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::remove($id);
        return ['The user was successfully deleted'];
    }
}
