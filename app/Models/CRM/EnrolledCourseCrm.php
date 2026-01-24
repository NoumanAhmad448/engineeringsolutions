<?php

namespace App\Models\CRM;

use Illuminate\Database\Eloquent\Model;

class EnrolledCourseCrm extends Model
{
    protected $connection = 'crm_database';
    protected $table = 'crm_enrolled_courses';

    public function course()
    {
        return $this->belongsTo(CourseCrm::class);
    }

    public function student()
    {
        return $this->belongsTo(StudentCrm::class);
    }
}
