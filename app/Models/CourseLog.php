<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CourseLog extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'course_id',
        'action',
        'old_data',
        'new_data',
        'user_id',
    ];
}
