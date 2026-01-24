<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebinarApplication extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'webinar_id'
    ];

    public function webinar()
    {
        return $this->belongsTo(Webinar::class);
    }
}
