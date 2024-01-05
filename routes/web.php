<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GroupTasksController;

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
				return view('home');
})->name('home');

Route::get('/login', function () {
				return view('login');
})->name('login');

Route::get('/subscription', [SubscriptionController::class, 'display'])->name('subscription');

// Auth::routes();

Route::get('/payment', function () {
				return view('payment');
})->name('payment');



Route::middleware(['guest'])->group(function () {
				Route::get('/login', function () {
								return view('login');
				})->name('login');
				Route::get('/register', function () {
								return view('register');
				})->name('register');
				Route::post('/register', [RegisterController::class, 'createUser'])->middleware('unique.email');
				Route::post('/login', [LoginController::class, 'login']);
				Route::get('/logout', [LoginController::class, 'logout']);

				Route::get('/shareappointment/{id}', [ClientController::class, 'clientForm']);
				Route::post('/shareappointment/{id}', [ClientController::class, 'bookAppointment']);
});

Route::middleware(['authorize'])->group(function () {
				// Routes accessible only to authorized users
				Route::get('/task', [TaskController::class, 'taskList'])->name('task');
				Route::post('/submittask', [TaskController::class, 'createTask']);
				Route::get('/deletetask/{id}', [TaskController::class, 'deleteTask']);

				Route::get('/profile', [UserController::class, 'userProfile'])->name('profile');

				Route::get('/grouptask', [GroupTasksController::class, 'viewGroup']);
				Route::get('/deletegroup/{id}', [GroupTasksController::class, 'deleteGroup']);

				Route::get('/payment', [PaymentController::class, 'paymentPage'])->name('payment');
				Route::post('/paymentprocess', [PaymentController::class, 'paymentProcess']);
});

Route::middleware(['authorize' ,'user'])->group(function () {
				// Routes accessible only to authorized users
				
				Route::get('/profile', [UserController::class, 'userProfile'])->name('profile');
				Route::put('/editprofile/{id}', [UserController::class, 'editProfile'])->name('editProfile');

});


Route::middleware(['authorize', 'subscriber'])->group(function () {
				Route::get('/checkappointment/{id}', [AppointmentController::class, 'checkAppointment']);
				Route::get('/appointment', [AppointmentController::class, 'appointmentList'])->name('apointment');
				Route::post('/submitappointment', [AppointmentController::class, 'createAppointment']);
				Route::get('/deleteappointment/{id}', [AppointmentController::class, 'deleteAppointment']);
				Route::post('/addgroup', [TaskController::class, 'addGroup']);
				Route::post('/submitgrouptask/{id}', [GroupTasksController::class, 'addGroupTask']);
				Route::get('/deletegrouptask/{id}', [GroupTasksController::class, 'deleteGroupTask']);
});

Route::middleware(['authorize', 'admin'])->group(function () {

	Route::get('/adminprofile', [UserController::class, 'adminprofile'])->name('adminprofile');

	Route::get('/manageadmin',[AdminController::class,'showAdmin']);
	Route::post('/addadmin',[AdminController::class,'addAdmin']);
	Route::get('/deleteadmin/{id}',[AdminController::class,'deleteAdmin']);
	Route::put('/editadminprofile/{id}',[AdminController::class,'updateAdmin']);

	Route::get('/manageSubscription', [PaymentController::class, 'showSubscriptionUser']);
	Route::get('/updateSubscription/{id}', [PaymentController::class, 'updateSubscription']);


});


Route::get('/auth/google', [GoogleLoginController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);