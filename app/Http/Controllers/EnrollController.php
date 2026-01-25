<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnrollRequest;
use App\Models\Course;
use App\Models\CourseEnrollment;
use Illuminate\Http\Request;

class EnrollController extends Controller
{
    public function index($slug = null)
    {
        $courses = Course::activeCourse()->latest()->get();
        $selectedCourse = null;

        if ($slug) {
            $selectedCourse = Course::where('slug', $slug)->firstOrFail();
        }

        return view('frontend.enroll.index', compact('courses', 'selectedCourse'));
    }

    public function store(EnrollRequest $request)
    {
        CourseEnrollment::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'course_id' => $request->course_id,
        ]);

        return back()->with('success', 'Enrollment request submitted successfully');
    }

    public function adminIndex()
    {
        $enrollments = CourseEnrollment::with('course')->latest()->get();

        return view('admin.enrollments.index', compact('enrollments'));
    }
}
