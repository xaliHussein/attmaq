<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WebsiteSettings;

class websiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WebsiteSettings::create([
            'key' =>  'foundation:social-facebook',
            'type' => "facebook",
            'value' => 'https://www.facebook.com/alkafeel.global',
        ]);
        WebsiteSettings::create([
            'key' =>  'mingcute:social-x-line',
            'type' => "twitter",
            'value' => 'https://twitter.com/AlkafeelAbbas',
        ]);
        WebsiteSettings::create([
            'key' =>  'ri:instagram-fill',
            'type' => "instagram",
            'value' => 'https://www.instagram.com/alkafeel.global.network/',
        ]);
        WebsiteSettings::create([
            'key' =>  "ic:baseline-telegram",
            'type' => "telegram",
            'value' => 'https://t.me/alkafeel_global_network',
        ]);
        WebsiteSettings::create([
            'key' =>  "mdi:youtube",
            'type' => "youtube",
            'value' => 'https://www.youtube.com/alkafeelnet',
        ]);
        WebsiteSettings::create([
            'key' =>  "ri:tiktok-fill",
            'type' => "tiktok",
            'value' => 'https://www.tiktok.com/@abbasholyshrine',
        ]);
    }
}
