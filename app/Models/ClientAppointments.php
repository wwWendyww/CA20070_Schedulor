<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/* BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CA20070
Student Name: Wendy Loh Li Wen
	 */
class ClientAppointments extends Model
{
    use HasFactory;
    protected $table = "clientappointment";
    protected $fillable = ['appointment_id', 'client_email', 'client_name', 'client_phone'];

}
