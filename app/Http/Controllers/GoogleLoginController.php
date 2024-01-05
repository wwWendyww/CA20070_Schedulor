<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $getUser = User::where('google_id', '=', $user->id)->first();
            if($getUser){
                Auth::login($getUser);
                return redirect()->route('profile');
            }
            else{
                $createUser =  User::create([
                    'user_name' => $user->name,
                    'user_email' => $user->email,
                    'google_id' => $user->id,
                    'user_password' => encrypt('asd')
            ]);

            Auth::login($createUser);
            return redirect()->route('profile');

            }
        } catch (Exception $e) {
           dd($e->getMessage());
        }
    }
}