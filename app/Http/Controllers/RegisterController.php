<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

/* BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CA20070
Student Name: Wendy Loh Li Wen
	*/
class RegisterController extends Controller
{
				public function createUser(Request $data)
				{
								if (str_contains($data['user_email'], 'schedulor.com')) {
												User::create([
																'user_name' => $data['user_name'],
																'user_email' => $data['user_email'],
																'user_password' => Hash::make($data['user_password']),
																'type' => 'admin',
                                                                'subscription'=>"premium"
												]);
												return redirect('/login')->with('success', 'Registered Successfully');
								} else {
												User::create([
																'user_name' => $data['user_name'],
																'user_email' => $data['user_email'],
																'user_password' => Hash::make($data['user_password']),
												]);
												return redirect('/login')->with('success', 'Registered Successfully');
								}
				}
}