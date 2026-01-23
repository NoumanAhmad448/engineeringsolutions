<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseDetailLog extends Model
{
    protected $fillable = [
        'course_id',
        'course_detail_id',
        'action',
        'old_data',
        'new_data',
        'user_id',
    ];

    protected $casts = [
        'old_data' => 'array',
        'new_data' => 'array',
    ];
}
