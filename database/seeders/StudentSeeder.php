<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'name' => 'علي حسين علي',
            'phone' => '07800000000',
            'password' => bcrypt('fffjjjqq'),
            'age' => "23",
            'country' => "العراق",
            'gender' => "ذكر",
            'city' => "بغداد",
            'main_language' => "عربي",
        ]);
    }
}
