<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $data = $request->validate([
            "name" => 'required|string',
            "email" => 'required|email',
            "password" => 'required|string|confirmed'
        ]);
        $data['password'] = bcrypt($request->password);
        User::create($data);
        return redirect(route('loginForm'));
    }

    public function loginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            "email" => 'required|email',
            "password" => 'required|string'
        ]);

        $valid = Auth::attempt([
            "email" => $request->email, 
            "password" => $request->password
        ]);
        
        if($valid) {
            $user = User::where('email', $request->email)->first();
            session()->flash('success', "welcome $user->name");
            return redirect(route('allCategories'));
        }
        else {
            return redirect(route('loginForm'));
        }
    }

    public function logout() {
        Auth::logout();
        return redirect(route('loginForm'));
    }
}
