<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Add + Listing (Same Page)
     */
    public function index()
    {
        $courses = Course::latest()->get();
        $categories = Category::all();

        return view('admin.courses.index', compact('courses', "categories"));
    }

    private function formDate($course, $request)
    {
        $course->course_type          = $request->course_type;
        $course->course_title         = $request->course_title;
        $course->time_selection       = $request->time_selection;
        $course->learnable_skill      = $request->learnable_skill;
        $course->course_requirement   = "$request->course_requirement";
        $course->targeting_student    = "$request->targeting_student";
        $course->description          = "$request->description";
        $course->status               = $request->status;
        $course->isPopular            = $request->isPopular ?? 0;
        $course->rating               = $request->rating ?? 0;
        $course->duration             = $request->duration;
        $course->price                = $request->price;
        $course->has_video_lectures   = $request->has_video_lectures ?? 0;
        $course->has_online_session   = $request->has_online_session ?? 0;
        $course->language             = $request->language;
        $course->user_id              = auth()->id();
        $course->category_id                 = $request->category_id;

        // IMAGE (YOUR CONVENTION)
        if ($request->hasFile('image')) {
            $course->image = uploadPhoto($request->file('image'));
        }
        return $course;
    }

    /**
     * Store New Course
     */
    public function store(CourseRequest $request)
    {
        $request->validated();
        $course = new Course();

        $course = $this->formDate($course, $request);

        $course->save();

        return back()->with('success', 'Course added successfully');
    }

    /**
     * Edit Page (Separate)
     */
    public function edit(Course $course)
    {
        $categories = Category::withTrashed()->get();
        return view('admin.courses.edit', compact('course', "categories"));
    }

    /**
     * Update Course
     */
    public function update(CourseRequest $request, Course $course)
    {
        $request->validated();

        $course = $this->formDate($course, $request);

        $course->save();

        return redirect()
            ->route('admin.course.index')
            ->with('success', 'Course updated successfully');
    }

    /**
     * Soft Delete (Admin Only)
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return back()->with('success', 'Course deleted successfully');
    }

    public function show($slug)
    {
        $course = Course::where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        $course->load('details');

        return view('courses.show', compact('course'));
    }
}
