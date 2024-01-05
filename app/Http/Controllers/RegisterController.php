<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function createUser(Request $data){
        User::create(
            [
                'user_name' => $data['user_name'],
                'user_email' => $data['user_email'],
                'user_password' => Hash::make($data['user_password']),
        ]);
        return redirect('/login')->with('success', 'Registered Successfully');

    }
}