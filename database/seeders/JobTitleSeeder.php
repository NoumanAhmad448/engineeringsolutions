<?php

namespace Database\Seeders;

use App\Models\JobTitle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobTitleSeeder extends Seeder
{
    public function run()
    {
        $titles = [
            'CEO',
            'Managing Director',
            'CTO',
            'Project Manager',
            'Team Lead',
            'Senior Developer',
            'Junior Developer',
            'UI/UX Designer',
            'QA Engineer',
            'HR Manager'
        ];

        foreach ($titles as $title) {
            JobTitle::firstOrCreate([
                'title' => $title
            ]);
        }
    }
}
