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
            'name' =>  'حسن محمد',
            'title' => "k1",
            'phone' => '07803290006',
            'password' => bcrypt('123456'),
            'age' => 29,
            'rating' => 3.5,
            'gender' => "ذكر",
        ]);

    }
}
