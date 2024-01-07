<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/* BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CA20070
Student Name: Wendy Loh Li Wen
	 */
class Appointments extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'appointment_name', 'appointment_date', 'appointment_time', 'appointment_agenda'];
}
