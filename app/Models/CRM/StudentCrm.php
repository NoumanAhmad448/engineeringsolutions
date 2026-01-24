<?php

namespace App\Models\CRM;

use Illuminate\Database\Eloquent\Model;

class StudentCrm extends Model
{
    protected $connection = 'crm_database';
    protected $table = 'crm_students';
}
