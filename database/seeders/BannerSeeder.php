<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Banner::create([
            'title'=>'استشهاد السيدة زينب عليها السلام',
            'type'=>'news',
            'image'=>'/images/banner/img2.jpg',
            'value'=>'link'
        ]);
    }
}
