<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInternshipApplicationRequest;
use App\Models\InternshipApplication;
use Illuminate\Http\Request;
use App\Models\Internship;
use Illuminate\Support\Str;

class InternshipController extends Controller
{
    // Guest form
    public function create()
    {
        $internships = Internship::latest()->get();
        return view('internships.apply', compact('internships'));
    }

    // Guest submit
    public function appStore(StoreInternshipApplicationRequest $request)
    {
        InternshipApplication::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'internship_id' => $request->internship_id,
            'ip_address' => $request->ip(),
        ]);

        return back()->with('success', 'Internship application submitted.');
    }

    // Admin listing
    public function appIndex()
    {
        $applications = InternshipApplication::with('internship')->latest()->get();
        return view('internship.admin.index', compact('applications'));
    }


    public function index()
    {
        $internships = Internship::latest()->get();

        return view('internship.admin.internship_index', compact('internships'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Internship::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return back()->with('success', 'Internship added successfully');
    }

    public function edit(Internship $internship)
    {
        return view('internship.admin.edit', compact('internship'));
    }

    public function update(Request $request, Internship $internship)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $internship->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()
            ->route('internships.index')
            ->with('success', 'Internship updated');
    }

    public function destroy(Internship $internship)
    {
        $internship->delete(); // 👈 SOFT DELETE

        return back()->with('success', 'Internship deleted');
    }
}
