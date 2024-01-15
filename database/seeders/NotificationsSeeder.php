<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CustomNotification;

class NotificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustomNotification::create([
            'student_id' => '9ab2c8ba-2441-48de-9e53-2b4c1e3e7127',
            'title' => 'جلسة خاصة',
            'body' => 'تم الموافقة على جلسة الخاصة من قبل الاستاذ',
            'color' => 'orange darken-1',
            'icon' => 'timer',
        ]);
    }
}
