<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/* BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CA20070
Student Name: Wendy Loh Li Wen
	 */
class Tasks extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'category', 'priority', 'task_name', 'task_remarks', 'task_duedate', 'task_duetime'];
    
}