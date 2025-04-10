<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        // dd($user);
        
        if($provider_user = User::where('email', $user->email)->first()) {
            auth()->login($provider_user);
            return redirect('/dashboard')->with('success', 'Logged in successfully');
        } 
        else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'provider_id' => $user->id,
                'provider_type' => $provider,
                'provider_token' => $user->token,
            ]);
            
            auth()->login($newUser);
            return redirect('/dashboard')->with('success', 'Logged in successfully');
        }
    }
}
