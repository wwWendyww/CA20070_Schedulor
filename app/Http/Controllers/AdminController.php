<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
				public function showAdmin(Request $request)
				{
								$data = User::where('type', '=', 'admin')->get();
								return view('manageUser', ['data' => $data]);
				}

				public function addAdmin(Request $request)
				{
								$data = User::create([
												'user_name' => $request->admin_name,
												'user_email' => $request->admin_email,
												'user_password' => encrypt('admin123'),
												'type' => 'admin',
												'subscription' => 'premium',
								]);
								 return redirect()->back()->with('success', 'Administrator is added');

				}

                public function deleteAdmin($id){

                    $data = User::where('id','=',$id);
                    $data->delete();
								 return redirect()->back()->with('success', 'Administrator is deleted');


                }

                public function updateAdmin($id){
                    $data = User::where('id', '=', $id);
                    $data->update();
                    $data->save();
								 return redirect()->back()->with('success', 'Profile is Updated');

                }
}