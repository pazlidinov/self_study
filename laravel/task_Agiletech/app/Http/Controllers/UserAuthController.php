<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function register(Request $request)
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

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
      }
}
