<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;

class teachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher::create([
            'name' =>  'علي حسين',
            'title' => "k1",
            'phone' => '07803291006',
            'password' => bcrypt('123456'),
            'age' => 29,
            'rating' => 4.5,
            'gender' => "ذكر",
        ]);

    }
}
