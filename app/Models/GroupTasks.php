<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupTasks extends Model
{
    use HasFactory;
    protected $table = "grouptasks";
    protected $fillable = ['grouptask_id',	'group_id',	'grouptask_name',	'grouptask_duedate', 'grouptask_duetime',	'priority'	];

}
