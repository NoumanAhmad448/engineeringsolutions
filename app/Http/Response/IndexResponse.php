<?php

namespace App\Http\Response;

use App\Classes\CacheKeys;
use App\Classes\CourseCache;
use App\Classes\FaqCache;
use App\Classes\LyskillsCarbon;
use App\Classes\PostCache;
use Illuminate\Support\Facades\DB;
use App\Http\Contracts\IndexContracts;
use App\Models\Certificate;
use App\Models\Faq;
use App\Models\RatingModal;
use App\Models\Setting;
use Exception;
use Illuminate\Support\Facades\Cache;
use App\Models\Student;
use App\Models\Course;
use App\Models\Student as CRMStudent;
use App\Models\EnrolledCourse;
use App\Models\EnrolledCoursePayment;
use Carbon\Carbon;

class IndexResponse implements IndexContracts
{
    public function toResponse($request)
    {
        try {

            $settings = Setting::first();
            $faqs = [
                [
                    'id' => 1,
                    'question' => 'What types of courses are offered by training institutes?',
                    'answer' => 'Training institutes offer a wide range of courses, including technical certifications, professional development programs, skill enhancement courses, Electrical Engineering Course, and industry-specific training.',
                ],
                [
                    'id' => 2,
                    'question' => 'What qualifications do I need to enroll in a training institute?',
                    'answer' => 'Entry requirements vary for different courses and institutes. Some programs may have specific prerequisites, while others may be open to individuals with a certain educational background or work experience.',
                ],
                // Add more FAQs as needed...
            ];


            $courseGroups = [
                [
                    'title' => 'Best Course',
                    'courses' => [
                        '3D Max Training course',
                        'Advance Electrical Courses',
                        'AutoCad Electrical Training',
                        'Business Development Training',
                    ],
                ],
                [
                    'title' => 'Trending Courses',
                    'courses' => [
                        'Learn AutoCAD 2D & 3D',
                        'Lean Six Sigma for IT sector',
                        'Revit Architecture Course',
                        'Lean Six Sigma Black Belt',
                    ],
                ],
                [
                    'title' => 'Discounted Courses',
                    'courses' => [
                        'Solar Panel Courses online',
                        'Complete Electrical Design Course',
                        'Etap online training Course',
                        'PLC online Course',
                    ],
                ],
            ];

            $courses = [];

            $members = [
                [
                    'id' => 1,
                    'name' => 'Ali Khan',
                    'title' => 'Project Leader',
                    'image' => '/img/logo.png',
                ],
                [
                    'id' => 2,
                    'name' => 'Ayesha Malik',
                    'title' => 'Project Leader',
                    'image' => '/img/team/ayesha.png',
                ],
                [
                    'id' => 3,
                    'name' => 'Sara Ahmed',
                    'title' => 'Senior Engineer',
                    'image' => '/img/team/sara.png',
                ],
                [
                    'id' => 4,
                    'name' => 'Usman Riaz',
                    'title' => 'Junior Engineer',
                    'image' => '/img/team/usman.png',
                ],
                [
                    'id' => 5,
                    'name' => 'Bilal Shah',
                    'title' => 'Electrical Engineer',
                    'image' => '/img/team/bilal.png',
                ],
            ];

            // Separate leaders and others
            $leaders = array_filter($members, function ($m) {
                return stripos($m['title'], 'leader') !== false;
            });

            $others = array_filter($members, function ($m) {
                return stripos($m['title'], 'leader') === false;
            });

            // Reset array keys to start from 0 (optional, but often done to make the arrays easier to work with)
            $leaders = array_values($leaders);
            $others = array_values($others);



            return $request->wantsJson()
                ? response()->json([])
                :  view(
                    config('setting.welcome_blade', 'dashboard.welcome'),
                    compact(
                        'settings',
                        'faqs',
                        'courseGroups',
                        'courses',
                        'others',
                        'leaders',
                    )
                );
        } catch (Exception $e) {
            // dd($e->getMessage());
            return server_logs([true, $e], [true, $request]);
        }
    }
}
