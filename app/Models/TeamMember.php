<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use SoftDeletes;

    protected $table = 'crm_team_members';

    protected $fillable = [
        'name',
        'job_title_id',
        'image_path',
        'is_leader',
        'created_by'
    ];

    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class);
    }
}
