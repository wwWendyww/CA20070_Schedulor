<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Payments;

/* BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CA20070
Student Name: Wendy Loh Li Wen
	 */
class PaymentController extends Controller
{
				public function paymentPage()
				{
								return view('payment');
				}

				public function paymentProcess(Request $request)
				{
								$user_id = Auth::user()->id;
								$payment = Payments::create([
												'user_id' => $user_id,
												'subscription_id' => 2,
												'payment_amount' => 10.6,
												'payment_billing' => $request->billaddress,
								]);

								$payment->save();
								$user = User::find($user_id);
								$user->user_bankinfo = $request->bankInfo;
								$user->save();
								return redirect()
												->route('profile')
												->with('success', 'Thanks for Subscription, Please Wait for approval');
				}

				public function showSubscriptionUser(Request $request)
				{
								if ($request->search !== '') {
												$data = DB::table('users')
																->join('payments', 'user_id', '=', 'users.id')
																->where('users.type', 'LIKE', "user") 
																->where('users.user_name', 'LIKE', "%".$request->search."%") 
																->get();
												return view('manageSubscription', ['data' => $data]);
								}
								$data = DB::table('users')
												->join('payments', 'payments.user_id', '=', 'users.id')
												->where('users.type', 'LIKE', "user") 
												->get();
								return view('manageSubscription', ['data' => $data]);
				}
				public function updateSubscription($id)
				{
					$data = User::where("id",'=',$id);
					$data->update(['subscription'=>'premium']);
					return redirect()->back()->with("success",'User Subscribe +1');


				}
}
