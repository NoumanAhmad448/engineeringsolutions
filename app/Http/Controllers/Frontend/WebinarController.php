<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Webinar;
use App\Models\WebinarApplication;
use Illuminate\Http\Request;

class WebinarController extends Controller
{
    /**
     * Show apply form
     */
    public function index()
    {
        $webinars = Webinar::latest()->get();

        return view('webinar.apply', compact('webinars'));
    }

    /**
     * Store application (guest)
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'phone'      => 'required|string|max:30',
            'email'      => 'nullable|email',
            'webinar_id' => 'required|exists:webinars,id',
        ]);

        WebinarApplication::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'webinar_id' => $request->webinar_id,
        ]);

        return back()->with('success', 'Your webinar application has been submitted.');
    }
}
