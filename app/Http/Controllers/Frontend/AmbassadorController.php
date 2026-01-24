<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Ambassador;
use Illuminate\Http\Request;

class AmbassadorController extends Controller
{
    public function index()
    {
        return view('ambassador.apply');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'father_name' => 'required',
            'phone'       => 'required',
            'qualification' => 'required',
            'field'       => 'required',
            'address'     => 'required',
            'photo'       => 'nullable|image',
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            $data['photo'] = \uploadPhoto($request->file('photo'));
        }

        Ambassador::create($data);

        return back()->with('success', 'Application submitted successfully');
    }
}
