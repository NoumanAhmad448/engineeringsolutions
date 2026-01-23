<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryLog extends Model
{
    protected $fillable = [
        'category_id',
        'action',
        'old_data',
        'new_data',
        'user_id',
    ];
}
