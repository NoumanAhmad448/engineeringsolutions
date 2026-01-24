<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Ambassador extends Model
{
    protected $fillable = [
        'name',
        'father_name',
        'email',
        'phone',
        'qualification',
        'field',
        'address',
        'photo',
    ];
}
