<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quran;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quran::create([
            'name'=>'اعمال ليلة القدر',
            'image'=>'/images/books/cover.png',
            'contentpath'=>'/files/books/DOC-20230413-WA000.pdf'
        ]);
    }
}
