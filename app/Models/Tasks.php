<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'category', 'priority', 'task_name', 'task_remarks', 'task_duedate', 'task_duetime'];
    
}