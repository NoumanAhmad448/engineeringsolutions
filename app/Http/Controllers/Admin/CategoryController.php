<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.form');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = uploadPhoto($request->file('image'));
        }

        $category = Category::create($data);

        server_logs('Category created', $category->id);

        return redirect()->route('admin.category.index');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = uploadPhoto($request->file('image'));
        }

        $category->update($data);

        return redirect()->route('admin.category.index');
    }

    public function delete($id)
    {
        if (!isAdmin()) {
            abort(403);
        }

        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.category.index')->with("success", "deleted");
    }


    public function ajaxCategories(Request $request)
    {
        $limit = $request->get('limit', 40); // Default to 6 categories

        $categories = Category::latest()->take($limit)->get();

        $html = '';

        foreach ($categories as $category) {
            $description = strlen($category->description) > 100
                ? substr($category->description, 0, 100) . '...'
                : $category->description;

            $html = view('partials.category_list', compact('categories'))->render();
        }

        return response()->json(['html' => $html]);
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('frontend.categories.show', compact('category'));
    }

    public function courses($categoryId)
    {
        $courses = Course::where('category_id', $categoryId)
            ->where('status', 'active')
            ->latest()
            ->get();
        return view('partials.courses', compact('courses'))->render();
    }
}
