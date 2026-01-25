<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseEnrollment extends Model
{
    protected $table = 'crm_course_enrollments';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'country',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
