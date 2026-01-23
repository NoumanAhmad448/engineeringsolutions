<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternshipApplication extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'internship_id',
        'ip_address',
    ];

    public function internship()
    {
        return $this->belongsTo(Internship::class);
    }
}
