<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobApplicationRequest;
use App\Models\Webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WebinarController extends Controller
{
    public function index()
    {
        $webinars = Webinar::latest()->get();
        return view('admin.webinar.index', compact('webinars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        Webinar::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return back()->with('success', 'Webinar added');
    }

    public function edit(Webinar $webinar)
    {
        return view('admin.webinar.edit', compact('webinar'));
    }

    public function update(Request $request, Webinar $webinar)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $webinar->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()
            ->route('admin.webinar.index')
            ->with('success', 'Webinar updated');
    }

    public function destroy(Webinar $webinar)
    {
        $webinar->delete();
        return back()->with('success', 'Webinar deleted');
    }
}
