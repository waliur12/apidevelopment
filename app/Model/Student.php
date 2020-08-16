<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'student_name', 'student_email', 'student_phone','student_photo',
    ];
}
