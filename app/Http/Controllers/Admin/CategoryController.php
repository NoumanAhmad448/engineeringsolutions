<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
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

        return redirect()->route('admin.category.index')->with("success","deleted");
    }
}
