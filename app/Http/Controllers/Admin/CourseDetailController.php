<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseDetail;
use Illuminate\Http\Request;

class CourseDetailController extends Controller
{
    /**
     * Add + Listing (Same Page)
     */
    public function index(Course $course)
    {
        $details = CourseDetail::where('course_id', $course->id)
            ->latest()
            ->get();

        return view('admin.courses.details', compact('course', 'details'));
    }

    /**
     * Store OR Update (SINGLE FUNCTION)
     */
    public function store(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|max:255',
            'value' => 'required',
            'detail_id' => 'nullable|exists:course_details,id',
        ]);

        CourseDetail::updateOrCreate(
            [
                'id' => $request->detail_id, // NULL → create, ID → update
            ],
            [
                'course_id' => $course->id,
                'title'     => $request->title,
                'value'     => $request->value, // HTML allowed
            ]
        );

        return back()->with('success', 'Course detail saved successfully');
    }

    /**
     * Edit Page (Separate Page)
     */
    public function edit(CourseDetail $detail)
    {
        return view('admin.courses.details_edit', compact('detail'));
    }

    /**
     * Soft Delete (Admin Only)
     */
    public function delete(CourseDetail $detail)
    {
        $courseId = $detail->course_id;

        $detail->delete();

        return redirect()
            ->route('admin.course.detail.index', ["course" => $courseId])
            ->with('success', 'Course detail deleted successfully');
    }
}
