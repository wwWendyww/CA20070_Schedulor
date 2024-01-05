<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'appointment_name', 'appointment_date', 'appointment_time', 'appointment_agenda'];
}
