<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Service;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\WebsiteSettings;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){

        $about = WebsiteSettings::where('key','about_site')->first();
        $about_image = WebsiteSettings::where('key','about_image')->first();

        $faq_img1 = WebsiteSettings::where('key','faq_img1')->first();
        $faq_img2 = WebsiteSettings::where('key','faq_img2')->first();


        $shortabout = WebsiteSettings::where('key','short_about_site')->first();

        $logo = WebsiteSettings::where('key','logo')->first();
        $facebook = WebsiteSettings::where('key','facebook')->first();
        $twitter = WebsiteSettings::where('key','twitter')->first();
        $linkedin = WebsiteSettings::where('key','linkedin')->first();
        $telegram = WebsiteSettings::where('key','telegram')->first();
        $instagram = WebsiteSettings::where('key','instagram')->first();
        $youtube = WebsiteSettings::where('key','youtube')->first();

        $phone = WebsiteSettings::where('key','phone')->first();
        $email = WebsiteSettings::where('key','email')->first();
        $site_name	 = WebsiteSettings::where('key','site_name')->first();
        $teachers = Teacher::all();


        $faqs = Faq::latest()->paginate(3);

        $services = Service::paginate(4);

        $students = Student::latest()->paginate(3);

        return view('welcome', compact('about','site_name','logo','facebook','twitter','linkedin','telegram','instagram','youtube','phone','email','shortabout', 'about_image','faq_img1','faq_img2','faqs', 'services', 'teachers','students'));
    }

    public function about(){

        $about = WebsiteSettings::where('key','about_site')->first();
        $about_image = WebsiteSettings::where('key','about_image')->first();

        $faq_img1 = WebsiteSettings::where('key','faq_img1')->first();
        $faq_img2 = WebsiteSettings::where('key','faq_img2')->first();


        $shortabout = WebsiteSettings::where('key','short_about_site')->first();

        $logo = WebsiteSettings::where('key','logo')->first();
        $facebook = WebsiteSettings::where('key','facebook')->first();
        $twitter = WebsiteSettings::where('key','twitter')->first();
        $linkedin = WebsiteSettings::where('key','linkedin')->first();
        $telegram = WebsiteSettings::where('key','telegram')->first();
        $instagram = WebsiteSettings::where('key','instagram')->first();
        $youtube = WebsiteSettings::where('key','youtube')->first();

        $phone = WebsiteSettings::where('key','phone')->first();
        $email = WebsiteSettings::where('key','email')->first();

        $teachers = Teacher::paginate(4);



        $faqs = Faq::latest()->paginate(3);

        $services = Service::all();

        $students = Student::latest()->paginate(3);

        return view('about', compact('about','logo','facebook','twitter','linkedin','telegram','instagram','youtube','phone','email','shortabout', 'about_image','faq_img1','faq_img2','faqs', 'services', 'teachers','students'));
    }

    public function faqs(){
        $faqs = Faq::latest()->get();

        $about = WebsiteSettings::where('key','about_site')->first();
        $about_image = WebsiteSettings::where('key','about_image')->first();

        $faq_img1 = WebsiteSettings::where('key','faq_img1')->first();
        $faq_img2 = WebsiteSettings::where('key','faq_img2')->first();


        $shortabout = WebsiteSettings::where('key','short_about_site')->first();

        $logo = WebsiteSettings::where('key','logo')->first();
        $facebook = WebsiteSettings::where('key','facebook')->first();
        $twitter = WebsiteSettings::where('key','twitter')->first();
        $linkedin = WebsiteSettings::where('key','linkedin')->first();
        $telegram = WebsiteSettings::where('key','telegram')->first();
        $instagram = WebsiteSettings::where('key','instagram')->first();
        $youtube = WebsiteSettings::where('key','youtube')->first();

        $phone = WebsiteSettings::where('key','phone')->first();
        $email = WebsiteSettings::where('key','email')->first();


        return view('faqs', compact('about','logo','facebook','twitter','linkedin','telegram','instagram','youtube','phone','email','shortabout', 'about_image','faq_img1','faq_img2','faqs'));
    }

    public function services(){
        $services = Service::all();
        $shortabout = WebsiteSettings::where('key','short_about_site')->first();
        $logo = WebsiteSettings::where('key','logo')->first();
        $facebook = WebsiteSettings::where('key','facebook')->first();
        $twitter = WebsiteSettings::where('key','twitter')->first();
        $linkedin = WebsiteSettings::where('key','linkedin')->first();
        $telegram = WebsiteSettings::where('key','telegram')->first();
        $instagram = WebsiteSettings::where('key','instagram')->first();
        $youtube = WebsiteSettings::where('key','youtube')->first();

        $phone = WebsiteSettings::where('key','phone')->first();
        $email = WebsiteSettings::where('key','email')->first();

        return view('services', compact('services','logo','facebook','twitter','linkedin','telegram','instagram','youtube','phone','email','shortabout'));


    }

    public function teachers(){
        $services = Service::all();
        $shortabout = WebsiteSettings::where('key','short_about_site')->first();
        $logo = WebsiteSettings::where('key','logo')->first();
        $facebook = WebsiteSettings::where('key','facebook')->first();
        $twitter = WebsiteSettings::where('key','twitter')->first();
        $linkedin = WebsiteSettings::where('key','linkedin')->first();
        $telegram = WebsiteSettings::where('key','telegram')->first();
        $instagram = WebsiteSettings::where('key','instagram')->first();
        $youtube = WebsiteSettings::where('key','youtube')->first();
        $teachers = Teacher::all();

        $phone = WebsiteSettings::where('key','phone')->first();
        $email = WebsiteSettings::where('key','email')->first();

        return view('teacher', compact('teachers','logo','facebook','twitter','linkedin','telegram','instagram','youtube','phone','email','shortabout'));


    }
}
