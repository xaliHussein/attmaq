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
            'start-date' => '2023-11-25',
            'start-time' => '16:15:10',
            'url' => 'http://localhost/phpmyadmin/',

        ]);
    }
}
