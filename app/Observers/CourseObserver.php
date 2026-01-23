<?php

namespace App\Observers;

use App\Models\Course;
use App\Models\CourseLog;

class CourseObserver
{
    public function created(Course $course)
    {
        CourseLog::create([
            'course_id' => $course->id,
            'action' => 'CREATED',
            'new_data' => json_encode($course->getAttributes()),
            'user_id' => auth()->id(),
        ]);
    }

    public function updating(Course $course)
    {
        $dirty = $course->getDirty();

        CourseLog::create([
            'course_id' => $course->id,
            'action' => 'UPDATED',
            'old_data' => json_encode(
                array_intersect_key($course->getOriginal(), $dirty)
            ),
            'new_data' => json_encode($dirty),
            'user_id' => auth()->id(),
        ]);
    }

    public function deleted(Course $course)
    {
        CourseLog::create([
            'course_id' => $course->id,
            'action' => 'DELETED',
            'old_data' => json_encode($course->getOriginal()),
            'user_id' => auth()->id(),
        ]);
    }
}
