<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class BootcampController extends Controller
{
    public function bootcamp()
    {
        $courses = Course::popularCourse()->latest()->get();

        return view('frontend.bootcamp', compact('courses'));
    }
}
