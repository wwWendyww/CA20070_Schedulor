<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
/* BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CA20070
Student Name: Wendy Loh Li Wen
	 */
class SubscriptionController extends Controller
{
    public function display(){
        // $subscription = Subscription::all();
        // return view('subscription', ['data'=> $subscription]);
        return view('subscription');
    }
}
