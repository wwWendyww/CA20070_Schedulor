<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
/* BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CA20070
Student Name: Wendy Loh Li Wen
	 */
class UserController extends Controller
{
				public function userProfile(Request $request)
				{
								$user = Auth::user();
								return view('profile', ['user' => $user]);
				}

				public function adminProfile(Request $request)
				{
								$user = Auth::user();
								return view('adminProfile', ['user' => $user]);
				}

				public function editProfile(Request $request, $id)
				{
								$data = User::find($id);
								$name = $request->input('name');
								$email = $request->input('email');
								if ($request->filled('password')) {
												$user_password = bcrypt($request->input('password'));
								}
								$data->save();
								return redirect()
												->route('profile')
												->with('success', 'Updated successfully.');
				}

				public function showForgetPassword()
				{
								return view('resetPassword');
				}

				public function updatePassword(Request $request)
				{
								$data = User::where('user_email', '=', $request->user_email)
                                ->where('user_name','=',$request->user_name)->first();
								if (!$data) {
												return redirect('/login')->with('error', 'User Not Found');
								} else {
												$data->update([
																'user_password' => $request->user_password,
												]);
												$data->save();
												return redirect('/login')->with('success', 'Password Reset Succesffully');
								}
				}
}
