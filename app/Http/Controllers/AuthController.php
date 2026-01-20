<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
        $credentials = $request->validated();

        $user = User::where('email', $credentials['email'])->first();

        if(!$user || !Hash::check($credentials['password'], $user->password)){
            return Response::json([
                'message' => 'Invalid Credentials!'
            ]);
        }

        $token = $user->createToken('api-token')->plainTextToken;
        return Response::json([
                'message' => 'Login Successful!',
                'token' => $token
            ]);

    }

}
