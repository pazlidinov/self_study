<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/register",
     *     summary="Register a new user",
     *      tags={"Auth"},
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="User's name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="phone_number",
     *         in="query",
     *         description="User's phone_number",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="password",
     *         in="query",
     *         description="User's password",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="User registered successfully"),
     *     @OA\Response(response="401", description="Validation errors")
     * )
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required',
            'password' => 'required'
        ]);

        if ($request->hasFile('img')) {
            $name = $request->file('img')->getClientOriginalName();
            $path = $request->file('img')->storeAs('brand-img', $name);
        }

        $pattern = "/^\\+?[1-9][0-9]{7,14}$/";
        if (preg_match($pattern, $request->phone_number)) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->phone_number,
                'password' => $request->password,
                'img' => $path ?? null,
            ]);

            $token = $user->createToken('LaravelAuthApp')->plainTextToken;

            return response()->json(['token' => $token, 200]);
        } else {
            return ['User was not created, something is wrong!', 401];
        }
    }

    /**
     * @OA\Post(
     *     path="/api/login",
     *     summary="Authenticate user and generate JWT token",
     *      tags={"Auth"},
     *     @OA\Parameter(
     *         name="phone_number",
     *         in="query",
     *         description="User's phone_number",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="password",
     *         in="query",
     *         description="User's password",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="Login successful"),
     *     @OA\Response(response="401", description="Unauthorised. Invalid credentials")
     * )
     */

    public function login(Request $request)
    {
    
        $user = User::where('phone_number', $request->phone_number)->where('password', $request->password)->first();
       
        if ($user) {
     
            $token = $user->createToken('LaravelAuthApp')->accessToken;
            return response()->json(['token' => $token, 200, 'Login successful']);
        } else {
            return response()->json(['error' => 'Unauthorised. Invalid credentials', 401]);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/logout",
     *     summary="Get logout user.",
     *      tags={"Auth"},
     *     @OA\Response(response="200", description="Yuo are logout."),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function logout(Request $request)
    {
        // Auth::logout();
        // return ['Yuo are logout.', 200];
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
}
