<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FsqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::create([
            'question' => 'القانون العرفي هنا يحكم بسقوط الدَين اذا مضي عليه عشر سنين فهل يجوز للدائن حفاظاً على حقه ان يدعي انه اقرض المدين قبل خمس سنين مثلا ويقيم عليه شهوداً؟ وهل يجوز للشهود الشهادة امام قاضي الجور حفظاً لحق المؤمن المظلوم؟',
            'answer' => ' يجوز له الدعوى المذكورة الّا أن في الشهادة بذلك إشكال',
        ]);
    }
}
