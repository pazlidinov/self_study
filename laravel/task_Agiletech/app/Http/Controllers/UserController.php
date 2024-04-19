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
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required',
            'password' => 'required'
        ]);
        $pattern = "/^\\+?[1-9][0-9]{7,14}$/";
        if (preg_match($pattern, $request->phone_number)) {
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
    /**
     * @OA\Get(
     *     path="/api/user/id",
     *     summary="Display the details of user.",
     *     tags={"user"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     
     * )
     */
    public function show(string $id)
    {
        return new UserResource(User::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    /**
     * @OA\PUT(
     *     path="/api/user/id",
     *     summary="Update the  user in storage.",
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
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required',
            'password' => 'required'
        ]);
        $pattern = "/^\\+?[1-9][0-9]{7,14}$/";
        if (preg_match($pattern, $request->phone_number)) {
            $user = User::find($id);
            $user->update([
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
    /**
     * @OA\DELETE(
     *     path="/api/user/id",
     *     summary="Remove the user from storage.",
     *     tags={"user"},
     *     @OA\Response(response=200, description="The user was successfully deleted"),
     *     
     * )
     */
    public function destroy(string $id)
    {
        User::remove($id);
        return ['The user was successfully deleted'];
    }
}
