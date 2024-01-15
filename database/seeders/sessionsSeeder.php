<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Sessiongroup;
use App\Models\SingleSession;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class sessionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sessiongroup::create([
        //     'teacher_id' => '9b10e913-8f45-46cd-9f93-aa590e969394',
        //     'title' => 'اساسيات قراءة القران',
        //     'content' => 'تعلم اساسيات قراءة القران الكريم و نطق الحروف',
        //     'start_date' => '2023-1-13',
        //     'start_time' => '23:20:00',
        //     'url' => 'https://meet.google.com/amq-axuc-efn',
        // ]);
        // Course::create([
        //     'single_session_id' => '9b191ca0-7d05-435e-8636-4c1014097641',
        //     'title' => 'اساسيات قراءة القران',
        //     'description' => 'تعلم اساسيات قراءة القران الكريم و نطق الحروف',
        //     'start_date' => '2023-1-6',
        //     'end_date' => '2024-2-6',
        // ]);
        Lesson::create([
            'course_id' => '9b191e76-6c5d-4f18-99a2-b96282c36552',
            'title' => 'اساسيات قراءة القران',
            'description' => 'تعلم اساسيات قراءة القران الكريم و نطق الحروف',
            'link' => 'https://meet.google.com/amq-axuc-efn',
        ]);
        // SingleSession::create([
        //     'student_id'=> '9b10e913-59c8-4ff3-98ae-d64279f08689',
        //     'teacher_id'=> '9b10e913-8f45-46cd-9f93-aa590e969394'
        // ]);

    }
}
