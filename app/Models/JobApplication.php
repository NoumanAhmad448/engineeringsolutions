<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'apply_for',
        'cv_path',
        'cv_type',
        'ip_address',
    ];
}
