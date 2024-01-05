<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientAppointments extends Model
{
    use HasFactory;
    protected $table = "clientappointment";
    protected $fillable = ['appointment_id', 'client_email', 'client_name', 'client_phone'];

}
