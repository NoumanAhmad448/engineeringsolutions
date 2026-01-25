<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseLog;

class CourseLogController extends Controller
{
    public function index(Course $course)
    {
        $logs = CourseLog::where('course_id', $course->id)
                    ->latest()
                    ->get();

        return view('admin.course.logs', compact('course', 'logs'));
    }
}
