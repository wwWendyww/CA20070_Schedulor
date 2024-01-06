<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientAppointments;
use App\Models\Appointments;

class ClientController extends Controller
{
    public function clientForm($id){
        $existAppointment = Appointments::where('appointment_id' ,'=', $id)->get();
        if($existAppointment->isEmpty()){
        return redirect('/login')->with('error', 'Appointment Not Found');
        }
        
        return view('bookAppointment')->with("id", $id);
    }

    public function bookAppointment(Request $request , $id){

        $existingAppointment = ClientAppointments::where([
            'appointment_id' => $id,
            'client_email' => $request->client_email,
            'client_name' => $request->client_name,
            'client_phone' => $request->client_phone,                    
             ])->first();

        if ($existingAppointment) {
            return redirect()->back()->with('error', 'Appointment already booked.');
        }

        


        ClientAppointments::create([
            'appointment_id' => $id,
            'client_email' => $request->client_email,
            'client_name' => $request->client_name,
            'client_phone' => $request->client_phone,
        ]);
        return  redirect()->back()->with('success', 'Booking is Made!');
    }
}