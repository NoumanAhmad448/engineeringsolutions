<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebinarApplication;

class WebinarApplicationController extends Controller
{
    public function index()
    {
        $applications = WebinarApplication::with('webinar')
            ->latest()
            ->get();

        return view(
            'admin.webinar_applications.index',
            compact('applications')
        );
    }
}
