<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $table = 'courses';

    protected $guarded = []; // 👈 allows ALL keys

    // Course.php
    public function details()
    {
        return $this->hasMany(CourseDetail::class);
    }

    public function detailLogs()
    {
        return $this->hasMany(CourseDetailLog::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
