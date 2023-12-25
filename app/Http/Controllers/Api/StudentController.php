<?php

namespace App\Http\Controllers\Api;

use App\Traits\Filter;
use App\Traits\Search;
use App\Models\Setting;
use App\Models\Student;
use App\Traits\OrderBy;
use Twilio\Rest\Client;
use App\Models\Requests;
use App\Traits\Pagination;
use App\Traits\UploadImage;
use App\Traits\SendResponse;
use Illuminate\Http\Request;
use App\Models\CustomNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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

    public function getStudent(Request $request){
        $request = $request->json()->all();
        $validator= Validator::make($request,[
            'id'=>'required|exists:students,id',
        ]);
        if($validator->fails()){
            return $this->send_response(400,'فشل عملية ',$validator->errors(),[]);
        }
        $student = Student::find($request['id']);
        return $this->send_response(200,'تم احضار معلومات الطالب',[],$student);
    }

    public function updateStudent(Request $request){
        $request = $request->json()->all();
        $validator= Validator::make($request,[
            "id" => "required",
            "name" => "required|string|max:255|min:3|unique:students,name," . $request['id'],
            "password" => "required|string|max:255|min:8",
            "age" => "required|integer",
            "gender" => "required|string|max:255|min:3",
            "country" => "required|string|max:255|min:3",
            "city" => "required|string|max:255|min:3",
        ],
        [
            'name.required' => 'حقل الاسم مطلوب',
            'name.unique' => 'الاسم الذي قمت بأدخاله مستخدم سابقا',
            'age.required' => 'حقل العمر مطلوب',
            'gender.required' => 'حقل الجنس مطلوب',
            'country.required' => 'حقل البلد مطلوب',
            'city.required' => 'حقل المدينة مطلوب',
        ]);
        if($validator->fails()){
            return $this->send_response(400,'فشل العملية ',$validator->errors(),[]);
        }

        $student = Student::find($request['id']);
        if (Hash::check($request['password'], $student->password)) {
            $student->update([
                "name" =>$request['name'],
                "age" =>$request['age'],
                "gender" =>$request['gender'],
                "country" =>$request['country'],
                "city" =>$request['city'],
            ]);
        }else {
            return $this->send_response(400,'ادخلت كلمة مرور غير صحيحه',[],[]);
        }
        return $this->send_response(200,'تم تحديث المعلومات الطالب بنجاح',[],$student);
    }
    public function updatePasswordStudent(Request $request){
        $request = $request->json()->all();
        $validator= Validator::make($request,[
            "id" => "required",
            "password_old" => "required|string|max:255|min:8",
            "password_new" => "required|string|max:255|min:8",
        ]);
        if($validator->fails()){
            return $this->send_response(400,'فشل العملية ',$validator->errors(),[]);
        }
        $student = Student::find($request['id']);
        if (Hash::check($request['password_old'], $student->password)) {
            $student->update([
                'password'=>bcrypt($request['password_new'])
            ]);
        }else {
            return $this->send_response(400,'كلمة المرور السابقة غير صحيحه',[],[]);
        }
        return $this->send_response(200,'تم تحديث المعلومات الطالب بنجاح','تم تحديث كلمة المرور بنجاح');
    }
    public function updatePhoneStudent(Request $request){
        $request = $request->json()->all();
        $validator= Validator::make($request,[
            "id" => "required",
            "password" => "required|string|max:255|min:8",
            "new_phone" => "required|string|max:11|min:7|unique:students,phone",
            "zipcode" => "required",
        ],[
            'new_phone.required' => 'حقل رقم الهاتف مطلوب',
            'new_phone.unique' => 'رقم الهاتف الذي قمت بأدخاله مستخدم سابقا',
        ]);
        if($validator->fails()){
            return $this->send_response(400,'فشل العملية ',$validator->errors(),[]);
        }
        $student = Student::find($request['id']);
        if (Hash::check($request['password'], $student->password)) {
            $random_code=$this->sendCode($request['zipcode'],$request['new_phone']);
            $student->update([
                'otp'=>$random_code
            ]);
            return $this->send_response(200,'تم ارسال رمز التحقق',[], Student::find($student->id));
        }else {
            return $this->send_response(400,'كلمة المرور السابقة غير صحيحه',[],[]);
        }
        return $this->send_response(200,'تم تحديث المعلومات الطالب بنجاح','تم تحديث كلمة المرور بنجاح');
    }

    public function sendCode($zipcode,$number_phone)
    {
        $random_code= substr(str_shuffle("0123456789"), 0, 6);
        try {

            $message = 'Your OTP is: '.$random_code;
            $account_sid = "ACb4bad69885b7465f6843d3287d89e777";
            $auth_token = "0789394f0876e20d244d24e2a71d55e6";
            $twilio_number = "+16466635154";

            $client = new Client($account_sid, $auth_token);
            $client->messages->create($zipcode.$number_phone, [
                'from' => $twilio_number,
                'body' => $message
            ]);
            return $random_code;

        }catch (Exception $e) {
            return $this->send_response(400,'فشل عملية',$e->getMessage(),[]);
        }
    }
        public function updateImageStudent(Request $request){
            $request = $request->json()->all();
            $validator= Validator::make($request,[
                'id'=>'required|exists:students,id',
                'image'=>'required',
            ]);
            if($validator->fails()){
                return $this->send_response(400,'فشل عملية ',$validator->errors(),[]);
            }
            $student = Student::find($request['id']);
            $student->update([
                'image'=> $this->uploadPicture($request['image'], '/images/student')
            ]);
            return $this->send_response(200,'تم تغير الصورة بنجاح',[],Student::find($student->id));
        }


    public function VerifyPhoneStudent(Request $request){
        $request = $request->json()->all();
        $validator= Validator::make($request,[
            'id'=>'required|exists:students,id',
            "new_phone" => "required|string|max:11|min:7|unique:students,phone",
            'otp'=>'required|min:6|max:6',
        ],
        [
            'new_phone.required' => 'حقل رقم الهاتف مطلوب',
            'new_phone.unique' => 'رقم الهاتف الذي قمت بأدخاله مستخدم سابقا',
        ]);
        if($validator->fails()){
            return $this->send_response(400,'فشل عملية ',$validator->errors(),[]);
        }
         $student = Student::find($request['id']);
         if($request['otp'] == $student->otp){
            $student->update([
                'phone'=> $request['new_phone']
            ]);
            return $this->send_response(200,'تم التحقق بنجاح',[],Student::find($student->id));
        }else{
            return $this->send_response(400,'ادخلت رمز تحقق غير صحيح',[],[]);
        }
    }
    public function getNotificationsStudent(Request $request){
        $request = $request->json()->all();
        $notification = CustomNotification::where("student_id",$request['id']);
        if (!isset($_GET['skip']))
            $_GET['skip'] = 0;
        if (!isset($_GET['limit']))
            $_GET['limit'] = 10;
        $res = $this->paging($notification->orderBy("created_at", "DESC"),  $_GET['skip'],  $_GET['limit']);
        return $this->send_response(200, 'تم احضار جميع الاخبار بنجاح', [], $res["model"], null, $res["count"]);
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
