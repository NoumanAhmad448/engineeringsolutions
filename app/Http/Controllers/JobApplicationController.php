<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobApplicationRequest;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function index()
    {
        return view('job_applications.form');
    }

    public function store(StoreJobApplicationRequest $request)
    {
        $path = uploadPhoto($request->file('cv'));

        JobApplication::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'apply_for' => $request->apply_for,
            'cv_path' => $path,
            'cv_type' => $request->file('cv')->getClientOriginalExtension(),
            'ip_address' => $request->ip(),
        ]);

        return back()->with('success', 'Application submitted successfully.');
    }
    // Admin DataTable listing
    public function adminIndex(Request $request)
    {
        $applications = JobApplication::latest()->get();

        return view('admin.job_applications.index', compact("applications"));
    }
}
