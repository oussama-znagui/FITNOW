<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\AuthenticatesUsers;


use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;




class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|max:255|unique:users',
            'password'  => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'data'          => $user,
            'access_token'  => $token,
            'token_type'    => 'Bearer'
        ]);
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|string|max:255',
            'password'  => 'required|string'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
    }
    public function logout()
    {
    }
}
