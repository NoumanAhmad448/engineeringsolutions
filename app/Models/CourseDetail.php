<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseDetail extends Model
{
    use SoftDeletes;

    protected $fillable = ['course_id', 'title', 'value'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function logs()
{
    return $this->hasMany(CourseDetailLog::class);
}

}
