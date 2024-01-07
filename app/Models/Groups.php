<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CA20070
Student Name: Wendy Loh Li Wen
	 */
class Groups extends Model
{
    use HasFactory;
    protected $fillable = ['group_id',	'user_id',	'group_name',	'group_description',	'member1_id'	,'member2_id'];
}
