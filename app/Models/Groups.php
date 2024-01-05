<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use HasFactory;
    protected $fillable = ['group_id',	'user_id',	'group_name',	'group_description',	'member1_id'	,'member2_id'];
}
