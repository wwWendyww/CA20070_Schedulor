<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointments;
use App\Models\ClientAppointments;
/* BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CA20070
Student Name: Wendy Loh Li Wen
	 */
class AppointmentController extends Controller
{
				public function appointmentList(Request $request)
				{
								$user_id = Auth::user()->id;
								if ($request->search !== null) {
												$data = DB::table('appointments')
																->select('*')
																->where('user_id', $user_id)
																->where('appointment_name', 'LIKE', '%' . $request->search . '%')
																->orderBy('appointment_date')
																->orderBy('appointment_time', 'ASC')
																->get();
								} else {
												$data = DB::table('appointments')
																->select('*')
																->where('user_id', $user_id)
																->orderBy('appointment_date')
																->orderBy('appointment_time', 'ASC')
																->get();
								}
								$groupedAppointments = $data->groupBy('appointment_date');

								if ($groupedAppointments->isEmpty()) {
												return view('appointment', ['data' => []]);
								}
								return view('appointment', ['data' => $groupedAppointments]);
				}

				public function createAppointment(Request $request)
				{
								$user_id = Auth::user()->id;
								$appointment = Appointments::firstOrCreate([
												'user_id' => $user_id,
												'appointment_name' => $request->appointment_name,
												'appointment_date' => $request->appointment_date,
												'appointment_time' => $request->appointment_date,
												'appointment_agenda' => $request->appointment_agenda,
								]);
								return redirect('/appointment')->with('success', 'Appointment is set');
				}

				public function deleteAppointment($id)
				{
								$appointment = Appointments::where('appointment_id', $id)->delete();
								$clientAppointment = ClientAppointments::where('appointment_id', $id)->delete();
								return redirect('/appointment')->with('success', 'Appointment is deleted');
				}

				public function checkAppointment($id)
				{
								$checkAppointment = DB::table('appointments')
												->join('clientappointment', 'appointments.appointment_id', '=', 'clientappointment.appointment_id')
												->select('clientappointment.*')
												->where('appointments.appointment_id', '=', $id)
												->get();
								return redirect('/appointment')->with('clientData', $checkAppointment);
				}
}