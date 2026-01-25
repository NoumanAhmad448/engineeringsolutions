<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\CategoryLog;
use App\Http\Controllers\Controller;

class CategoryLogController extends Controller
{
    public function index(Category $category)
    {
        $logs = CategoryLog::where('category_id', $category->id)
            ->latest()
            ->get();

        return view('admin.categories.logs', compact('category', 'logs'));
    }
}

