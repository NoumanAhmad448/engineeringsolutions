<?php

namespace App\Models\CRM;

use Illuminate\Database\Eloquent\Model;

class CourseCrm extends Model
{
    protected $connection = 'crm_database';
    protected $table = 'crm_courses';
}
