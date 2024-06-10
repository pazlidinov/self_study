<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *     path="/api/user",
     *     summary="Get a list of users",
     *     tags={"user"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function index()
    {
        return UserResource::collection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * Store a newly created resource in storage.
     */

    /**
     * @OA\Post(
     *     path="/api/user/",
     *     summary="Store a newl user created resource in storage.",
     *      tags={"user"},
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="user's name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *    
     *     @OA\Parameter(
     *         name="phone_number",
     *         in="query",
     *         description="user's phone_number",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="password",
     *         in="query",
     *         description="user's password",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="The user was successfully created"),
     *   
     * )
     */
    public function store(Request $request)
    {
            $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|unique:users|max:50',
            'password' => 'required|max:255'
        ]);

        if ($request->hasFile('img')) {
            $name = $request->file('img')->getClientOriginalName();
            $path = $request->file('img')->storeAs('user-img', $name);
        }

        $pattern = "/^\\+?[1-9][0-9]{7,14}$/";
        if (preg_match($pattern, $request->phone_number)) {
            $user = User::create([
                'full_name' => $request->full_name,
                'phone_number' => $request->phone_number,
                'password' => $request->password,
                'img' => $path ?? null
            ]);            
            return ['The user was successfully created'];            
        } else {
            return ['User was not created, something is wrong!'];
        }
    }

    /**
     * Display the specified resource.
     */
    /**
     * @OA\Get(
     *     path="/api/user/id",
     *     summary="Display the details of user.",
     *     tags={"user"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     
     * )
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    /**
     * @OA\Put(
     *     path="/api/user/id",
     *     summary="Update the  user in storage.",
     *      tags={"user"},
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="user's name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="phone_number",
     *         in="query",
     *         description="user's phone_number",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *          *     @OA\Parameter(
     *         name="password",
     *         in="query",
     *         description="user's passwords",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="The user was successfully updated"),
     *   
     * )
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|unique:users|max:50',
            'password' => 'required|max:255'
        ]);
        if ($request->hasFile('img')) {
            $name = $request->file('img')->getClientOriginalName();
            $path = $request->file('img')->storeAs('user-img', $name);
        }

        $pattern = "/^\\+?[1-9][0-9]{7,14}$/";
        if (preg_match($pattern, $request->phone_number)) {
            $user->update([
                'full_name' => $request->full_name,
                'phone_number' => $request->phone_number,
                'password' => $request->password,
                'img' => $path,
            ]);

            return ['The user was successfully updated'];
        } else {
            return ['User was not update, something is wrong!'];
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * @OA\Delete(
     *     path="/api/user/id",
     *     summary="Remove the user from storage.",
     *     tags={"user"},
     *     @OA\Response(response=200, description="The user was successfully deleted"),
     *     
     * )
     */
    public function destroy(User $user)
    {
        $user->delete();
        return ['The user was successfully deleted'];
    }

    public function check_user($phone_number)
    {
        if (User::where('phone_number', $phone_number)->first()) {
            return ['status' => 200];
        } else {
            return ['status' => 400];
        }
    }
}
