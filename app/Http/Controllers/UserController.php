<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
 


class UserController extends Controller
{
    public function userProfile(Request $request){
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }

    public function adminProfile(Request $request){
        $user = Auth::user();
        return view('adminProfile', ['user' => $user]);
    }


    public function editProfile(Request $request, $id){
        
        $data = User::find($id);
        $name = $request->input('name');
        $email = $request->input('email');
        if ($request->filled('password')) {
           $user_password = bcrypt($request->input('password'));
        }
        $data->save();
        return redirect()->route('profile')->with('success', 'Updated successfully.');
    }
}