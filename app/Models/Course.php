<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($course) {
            $course->slug = self::generateSlug($course);
        });

        static::updating(function ($course) {
            if ($course->isDirty('name') || is_null($course->slug)) {
                $course->slug = self::generateSlug($course);
            }
        });
    }

    private static function generateSlug($course)
    {
        $baseSlug = Str::slug($course->course_title);
        $slug = $baseSlug;
        $count = 1;

        while (
            self::where('slug', $slug)
            ->when($course->id, fn($q) => $q->where('id', '!=', $course->id))
            ->exists()
        ) {
            $slug = $baseSlug . '-' . $count++;
        }

        return $slug;
    }

    public function scopeActiveCourse($course){
        return $course->where("status", "active");
    }
    public function scopePopularCourse($course){
        return $course->activeCourse()->where("isPopular", 1)->orWhere("isFeatured", 1);
    }
}
