<?php

namespace Database\Seeders;

use App\Models\Sessiongroup;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class sessionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sessiongroup::create([
            'teacher_id' => '9aae19e5-7a05-4ab2-bc2e-9ddac328fe3a',
            'title' => 'اساسيات قراءة القران',
            'content' => 'تعلم اساسيات قراءة القران الكريم و نطق الحروف',
            'start_date' => '2023-12-6',
            'start_time' => '19:20:00',
            'url' => 'https://meet.google.com/amq-axuc-efn',

        ]);
    }
}
