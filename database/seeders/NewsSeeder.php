<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::create([
           "title"=>"جمعية العميد: مؤتمر أمير المؤمنين (عليه السلام) يأصل فكرة الرعاية الاجتماعية والتعايش السلمي في المجتمع",
            "content"=>"أكّد رئيس جمعية العميد العلمية والفكرية الدكتور رياض طارق العميدي أنّ مؤتمر أمير المؤمنين (عليه السلام) يأصل فكرة الرعاية الاجتماعية والتعايش السلمي بين أطراف المجتمع الواحد في مفهوم الإمام (عليه السلام).

            جاء ذلك خلال حضوره فعاليات المؤتمر العلمي الثالث لإحياء تراث أمير المؤمنين (عليه السلام) الذي يقيمه مركز المرايا للدراسات والإعلام برعاية العتبة العباسية المقدسة، وبالتعاون مع جمعية العميد العلمية والفكرية وأمانة مسجد الكوفة المعظم، وجامعتي الكفيل والعميد وكلّيتي الآداب والإدارة والاقتصاد في جامعة الكوفة، واتّحاد الأدباء والكتّاب في النجف الأشرف.
            وقال العميدي إنّ مؤتمر أمير المؤمنين يسلط الضوء على السيرة العطرة للإمام عليّ (عليه السلام) وتأصيل فكرة الرعاية الاجتماعية والتعايش السلمي بين أطراف المجتمع الواحد في مفهوم الإمام (عليه السلام).

            وأضاف أنّ المؤتمر شهد تناول موضوعات عن بعض مفاهيم الرعاية الاجتماعية والتطرق إلى ظاهرة الفقر والغناء واليتم أو ما يسمى بالحاجات الخاصة لهذه الظاهرة من منظور لغوي وأدبي.

            وتابع أنّ فقرات المؤتمر تضمنت جانبًا عمليًّا للرعاية الاجتماعية في المؤسسات الحكومية وغير الحكومية عبر تجربة معالجة الفقر في ضوء مبادئ الإمام علي (عليه السلام)",
           "date"=>now()->format('d-m-Y H:i'),
           "url"=>"https://alkafeel.net/news/index?id=22611&lang=ar",
           "image"=>"/images/news/news2.jpg"
        ]);
    }
}
