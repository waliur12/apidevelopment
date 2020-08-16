<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
     protected $fillable = [
        'student_id', 'course_name', 'course_code',
    ];
}
