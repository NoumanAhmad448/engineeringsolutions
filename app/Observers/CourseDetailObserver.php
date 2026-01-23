<?php

namespace App\Observers;

use App\Models\CourseDetail;
use App\Models\CourseDetailLog;

class CourseDetailObserver
{
    public function created(CourseDetail $detail)
    {
        CourseDetailLog::create([
            'course_id'        => $detail->course_id,
            'course_detail_id' => $detail->id,
            'action'           => 'created',
            'new_data'         => $detail->getAttributes(),
            'user_id'          => auth()->id(),
        ]);
    }

    public function updating(CourseDetail $detail)
    {
        CourseDetailLog::create([
            'course_id'        => $detail->course_id,
            'course_detail_id' => $detail->id,
            'action'           => 'updated',
            'old_data'         => $detail->getOriginal(),
            'new_data'         => $detail->getDirty(),
            'user_id'          => auth()->id(),
        ]);
    }

    public function deleted(CourseDetail $detail)
    {
        CourseDetailLog::create([
            'course_id'        => $detail->course_id,
            'course_detail_id' => $detail->id,
            'action'           => 'deleted',
            'old_data'         => $detail->getOriginal(),
            'user_id'          => auth()->id(),
        ]);
    }
}
