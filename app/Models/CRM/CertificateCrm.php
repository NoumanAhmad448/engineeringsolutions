<?php

namespace App\Models\CRM;

use Illuminate\Database\Eloquent\Model;

class CertificateCrm extends Model
{
    protected $connection = 'crm_database';
    protected $table = 'crm_certificates';

    public function enrolledCourse()
    {
        return $this->belongsTo(EnrolledCourseCrm::class, 'enrolled_course_id');
    }
}
