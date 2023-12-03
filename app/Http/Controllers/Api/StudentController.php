<?php

namespace App\Http\Controllers\Api;

use App\Traits\Filter;
use App\Traits\Search;
use App\Models\Setting;
use App\Models\Requests;
use App\Models\Student;
use App\Traits\OrderBy;
use App\Traits\Pagination;
use App\Traits\UploadImage;
use App\Traits\SendResponse;
use Illuminate\Http\Request;
use App\Models\CustomNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    use SendResponse, Pagination,Search, Filter, OrderBy, UploadImage;

    public function addRequest(Request $request){
        $request = $request->json()->all();
        $validator = Validator::make($request, [
            'teacher_id' => 'required',
            'student_id' => 'required'
        ], [
            'teacher_id.required' => 'هذا الحقل مطلوب',
            'student_id.required' => 'هذا الحقل مطلوب',
        ]);
        if ($validator->fails()) {
            return $this->send_response(400, "حصل خطأ في المدخلات", $validator->errors(), []);
        }

        $Requests = Requests::create([
            'teacher_id'=> $request['teacher_id'],
            'student_id'=> $request['student_id'],
            'booking_status'=> 0,
            'booking_date'=>date('Y-m-d H:i:s')
        ]);
        $student = Student::find($request['student_id']);

        $notification = CustomNotification::create([
            'teacher_id'=> $request['teacher_id'],
            'title'=> "حجز جلسه",
            'body'=>"لديك طلب قبل ".$student->name,
        ]);
        return $this->send_response(200,'تم ارسال طلبك بنجاح',[],[],[]);

    }















    public function Settings(){
        $setting = Setting::first();

        return response()->json([
            'message' => 'Settings retrieved successfully',
            'settings' => $setting,
        ], 200);
    }
    public function notifications(){
        $notifications= UserNotifications::all();

        return response()->json([
            'message' => 'Notifications retrieved successfully',
            'notifications' => $notifications,
        ], 200);
    }
    public function banners(){
        $banner = Banner::all();

        return response()->json([
            'message' => 'Banner retrieved successfully',
            'banner' => $banner,
        ], 200);
    }
    public function news(){
        $news = News::paginate(10);
        return response()->json([
            'message' => 'Banner retrieved successfully',
            'banner' => $news,
        ], 200);
    }
    public function faq(){
        $faqs = Faq::all();
        return response()->json([
            'message' => 'Banner retrieved successfully',
            'banner' => $faqs,
        ], 200);
    }



}
