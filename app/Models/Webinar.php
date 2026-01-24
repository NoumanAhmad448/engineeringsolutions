<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Webinar extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'slug'];

    public function applications()
    {
        return $this->hasMany(WebinarApplication::class);
    }
}
