<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ApiAuthController extends Controller
{
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|confirmed'
        ]);

        if($validator->fails()) {
            return response()->json([
                "error" => $validator->errors()
            ], 301);
        }

        $password = bcrypt($request->password);
        $access_token = Str::random(64);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'access_token' => $access_token
        ]);

        return response()->json([
            "msg" => "account created successfully!",
            "access_token" => $access_token
        ], 201);
    }

    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if($validator->fails()) {
            return response()->json([
                "error" => $validator->errors()
            ], 301);
        }

        $user = User::where('email', $request->email)->first();
        if($user) {
            $access_token = Str::random(64);
            $isValid = Hash::check($request->password, $user->password);
            if($isValid) {
                $user->update([
                    "access_token" => $access_token
                ]);
                return response()->json([
                    "msg" => "logged in successfully!",
                    "access_token" => $access_token
                ], 201);
            }
            else {
                return response()->json([
                    "msg" => "credentials not correct",
                ], 404);
            }
        } 
        else {
            return response()->json([
                "msg" => "credentials not correct",
            ], 404);
        }
    }
}
