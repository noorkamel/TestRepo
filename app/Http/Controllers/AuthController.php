<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email'=> 'required|string|email|max:255|unique:users',
            'address'=> 'required|string|max:255',
            'phone'=> 'required|max:12',
            'password'=> 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $user = User::create([

            'fname' =>$request->fname,
            'lname' =>$request->lname,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'password'=>bcrypt($request->password),
        ]);

        $token = $user->createToken('MyApp')->accessToken;

        return response(['user' => $user, 'access_token' => $token]);
    }






    public function login(Request $request)
    {
     $credentials = $request->only('email', 'password');

      if (Auth::attempt($credentials)) {
        $user = $request->user();
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json(['token' => $token,'user_id'=> $user->id]);
      }

      return response()->json(['error' => 'Failed to login'], 401);
    }

}
