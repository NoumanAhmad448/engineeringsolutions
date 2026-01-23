<?php

// app/Http/Controllers/ImageUploadController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        // validate file
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:10048', // max 2MB
        ]);

        if ($request->hasFile('file')) {
            $path = uploadPhoto($request->file("file"));

            // return full URL for Summernote
            return response()->json(img_path($path));
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
