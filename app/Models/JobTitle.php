<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    protected $table = 'crm_job_titles';

    protected $fillable = [
        'title'
    ];

    public function teamMembers()
    {
        return $this->hasMany(TeamMember::class);
    }
}
