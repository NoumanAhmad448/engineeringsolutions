<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\CategoryLog;
use Illuminate\Support\Facades\Auth;

class CategoryObserver
{
    public function created(Category $category)
    {
        CategoryLog::create([
            'category_id' => $category->id,
            'action'      => 'CREATED',
            'old_data'    => null,
            'new_data'    => json_encode($category->getAttributes()),
            'user_id'     => Auth::id(),
        ]);
    }

    public function updating(Category $category)
    {
        $dirty = $category->getDirty();

        CategoryLog::create([
            'category_id' => $category->id,
            'action'      => 'UPDATED',
            'old_data'    => json_encode(
                array_intersect_key($category->getOriginal(), $dirty)
            ),
            'new_data'    => json_encode($dirty),
            'user_id'     => Auth::id(),
        ]);
    }

    public function deleted(Category $category)
    {
        CategoryLog::create([
            'category_id' => $category->id,
            'action'      => 'DELETED',
            'old_data'    => json_encode($category->getOriginal()),
            'new_data'    => null,
            'user_id'     => Auth::id(),
        ]);
    }
}
