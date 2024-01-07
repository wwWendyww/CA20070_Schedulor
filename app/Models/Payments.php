<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/* BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CA20070
Student Name: Wendy Loh Li Wen
	 */
class Payments extends Model
{
    use HasFactory;
    protected $fillable =['payment_id','user_id','subscription_id','payment_amount','payment_billing'];
}