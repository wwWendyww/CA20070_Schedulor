<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $loginData = $request->only('user_email', 'user_password', 'usertype');
        if (Auth::attempt(['user_email' => $loginData['user_email'], 'password' => $loginData['user_password'], 'type'=>$loginData['usertype']])) {
            $user = Auth::user();
            if(auth()->user()->type=="user"){
                return redirect()->route('profile');
            }
            if(auth()->user()->type=="admin"){
                return redirect('adminprofile');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Email Address / User Password');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}