<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'image',
    ];



    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = self::generateSlug($category);
        });

        static::updating(function ($category) {
            if ($category->isDirty('name') || is_null($category->slug)) {
                $category->slug = self::generateSlug($category);
            }
        });
    }

    private static function generateSlug($category)
    {
        $baseSlug = Str::slug($category->name);
        $slug = $baseSlug;
        $count = 1;

        while (
            self::where('slug', $slug)
            ->when($category->id, fn($q) => $q->where('id', '!=', $category->id))
            ->exists()
        ) {
            $slug = $baseSlug . '-' . $count++;
        }

        return $slug;
    }
}
