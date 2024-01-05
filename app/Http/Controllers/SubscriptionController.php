<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function display(){
        $subscription = Subscription::all();
        return view('subscription', ['data'=> $subscription]);
    }
}
