<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ambassador;

class AmbassadorController extends Controller
{
    public function index()
    {
        $ambassadors = Ambassador::latest()->get();
        return view('admin.ambassador.index', compact('ambassadors'));
    }
}
