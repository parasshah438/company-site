<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $fillable = [
        'user_name',
        'user_mobile',
        'user_email',
        'user_experiance',
        'user_position',
        'user_qualification',
        'user_vocation',
        'user_join',
        'user_resume',
        'user_msg'
    ];
}
