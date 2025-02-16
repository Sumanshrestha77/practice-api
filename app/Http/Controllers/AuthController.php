<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
            // for this confirmation to work, we need to have 
            // another feild name which has password_confirmation
        ]);

        $user = User::create($validatedData);
        $token = $user->createToken($request->name);
        return [
            'user' => $user,
            'token' => $token->plainTextToken
            // but this pass will give as object with properties
        ];
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
            // for this confirmation to work, we need to have 
            // another feild name which has password_confirmation
        ]);
        // for web application
        Au
    }
    public function logout(Request $request)
    {
        return 'register';
    }
}
