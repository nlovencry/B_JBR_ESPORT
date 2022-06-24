<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class auth extends Controller
{
    public function login(Request $request)
    {

        try {
            $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'gagal validasi data',
            ], 401);
        }
       

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'message' => 'email atau password tidak valid',
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response()->json([
            'name' => $user->name,
        ], 200);
    }

    public function logout(Request $request)
    {
        // $user = $request->user();
        // $user->currentAccessToken()->delete();
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'You are Logout.'
        ], 200);
   }

}