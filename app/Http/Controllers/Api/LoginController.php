<?php

namespace App\Http\Controllers\Api;



use Exception;


use App\Models\Student;
use App\Traits\Pagination;
use App\Traits\SendResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StudentLoginRequest;
use App\Http\Requests\StudentStoreRequest;

use Twilio\Rest\Client;

class LoginController extends Controller{
    use SendResponse, Pagination;

    public function sendCode($zipcode,$number_phone)
    {

        $random_code= substr(str_shuffle("0123456789"), 0, 6);
        // try {

        //     $message = 'Your OTP is: '.$random_code;

        //     $account_sid = "ACfcaee03a4c1d6430a9528f61997fb34d";
        //     $auth_token = "bf59159a51d35ad636e8701f97c73474";
        //     $twilio_number = "+14124604159";

        //     $client = new Client($account_sid, $auth_token);
        //     $client->messages->create($zipcode.$number_phone, [
        //         'from' => $twilio_number,
        //         'body' => $message
        //     ]);
            return $random_code;

        // }catch (Exception $e) {
        //     return $this->send_response(400,'فشل عملية',$e->getMessage(),[]);
        // }
    }

    public function login(Request $request){
        $request = $request->json()->all();
        $validator = Validator::make($request, [
            'phone' => 'required',
            "password" => "required|string|max:255|min:8",
        ], [
            'phone.required' => 'يرجى ادخال رقم الهاتف ',
            'password.required' => 'يرجى ادخال كلمة المرور ',
        ]);
        if ($validator->fails()) {
            return $this->send_response(400, "حصل خطأ في المدخلات", $validator->errors(), []);
        }
        $student = Student::where('phone', $request['phone'])->first();

        if(!$student || !password_verify($request['password'], $student->password)){
            return $this->send_response(400, 'هناك مشكلة تحقق من تطابق المدخلات', null, null, null);
        }
        else if($student->account_status == 0){
            $random_code=$this->sendCode($student->zipcode,$student->phone);
            $student->update([
                'otp'=>$random_code
            ]);
            return $this->send_response(201, 'لم يتم تاكيد رقم الهاتف', $student, [], null);
        }
        $token = $student->createToken('attmaq_student')->plainTextToken;
        return $this->send_response(200,'تم تسجيل الدخول بنجاح',[], $student, $token);

    }
    public function register(Request $request){
        $request = $request->json()->all();
        $validator= Validator::make($request,[
            "name" => "required|string|max:255|min:3|unique:students,name",
            "phone" => "required|string|max:11|min:7|unique:students,phone",
            "password" => "required|string|max:255|min:8",
            "zipcode" => "required",
            "age" => "required|integer",
            "gender" => "required|string|max:255|min:3",
            "country" => "required|string|max:255|min:3",
            "city" => "required|string|max:255|min:3",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "main_language" => "nullable|string|max:255|min:3",
        ],
        [
            'name.required' => 'حقل الاسم مطلوب',
            'name.unique' => 'الاسم الذي قمت بأدخاله مستخدم سابقا',
            'phone.required' => 'حقل رقم الهاتف مطلوب',
            'phone.unique' => 'رقم الهاتف الذي قمت بأدخاله مستخدم سابقا',
            'age.required' => 'حقل العمر مطلوب',
            'gender.required' => 'حقل الجنس مطلوب',
            'country.required' => 'حقل البلد مطلوب',
            'city.required' => 'حقل المدينة مطلوب',
        ]);
        if($validator->fails()){
            return $this->send_response(400,'فشل العملية ',$validator->errors(),[]);
        }
        $random_code=$this->sendCode($request['zipcode'],$request['phone']);
        $student = Student::create([
            'name'=> $request['name'],
            'otp'=>$random_code,
            'phone'=>$request['phone'],
            'zipcode'=>$request['zipcode'],
            'gender'=>$request['gender'],
            'age'=>$request['age'],
            'country'=>$request['country'],
            'city'=>$request['city'],
            'password'=>bcrypt($request['password'])
        ]);
        return $this->send_response(200,'تم اضافة الحساب بنجاح',[], Student::find($student->id));
    }
    public function getNumberPhone(Request $request){
        $request = $request->json()->all();
        $validator = Validator::make($request,[
            'id'=>'required|exists:students,id'
        ]);
        if($validator->fails()){
            return $this->send_response(400,'فشل عملية ',$validator->errors(),[]);
        }
        $user = Student::find($request['id']);
        return $this->send_response(200,'تم جلب بيانات المستخدم',[], $user);
    }
    public function verifyAuthentication(Request $request){
        $request= $request->json()->all();
        $validator= Validator::make($request,[
            'id'=>'required|exists:students,id',
            'otp'=>'required|min:6|max:6',
        ]);
        if($validator->fails()){
            return $this->send_response(400,'فشل عملية ',$validator->errors(),[]);
        }
         $student = Student::find($request['id']);
        if($request['otp'] == $student->otp){
            $student->update([
                'account_status'=> true
            ]);
            $token = $student->createToken('attmaq_student')->plainTextToken;
            return $this->send_response(200,'تم تسجيل الدخول بنجاح',[], $student, $token);
        }else{
            return $this->send_response(400,'ادخلت رمز تحقق غير صحيح',[],[]);
        }
    }
    public function sendCodeAgain(Request $request){
        $request= $request->json()->all();
        $validator= Validator::make($request,[
            'id'=>'required|exists:students,id',
        ]);
        if($validator->fails()){
            return $this->send_response(400,'فشل عملية ',$validator->errors(),[]);
        }
        $student = Student::find($request['id']);
        $random_code=$this->sendCode($student->zipcode,$student->phone);
        $student->update([
            'otp'=>$random_code
        ]);
        return $this->send_response(200,'تم ارسال رمز التحقق بنجاح',[],[]);
    }
    public function sendCodePhone(Request $request){
        $request= $request->json()->all();
        $validator= Validator::make($request,[
            'phone'=>'required|exists:students,phone',
            'zipcode'=>'required',
        ]);
        if($validator->fails()){
            return $this->send_response(400,'فشل عملية ',$validator->errors(),[]);
        }

        $student = Student::where('phone', $request['phone'])->first();
        $random_code= $this->sendCode($request['zipcode'],$request['phone']);
            $student->update([
                'otp'=>$random_code
            ]);
        return $this->send_response(200,'تم ارسال رمز التحقق',[], $student->phone);
    }
    public function confirmVerification(Request $request){
        $request= $request->json()->all();
        $validator= Validator::make($request,[
            'phone'=>'required|exists:students,phone',
            'otp'=>'required|min:6|max:6',
        ]);
        if($validator->fails()){
            return $this->send_response(400,'فشل عملية ',$validator->errors(),[]);
        }

        $student = Student::where('phone', $request['phone'])->first();
        if($request['otp'] == $student->otp){
            return $this->send_response(200,'تم التحقق بنجاح',[],Student::find($student->id));
        }else{
            return $this->send_response(400,'ادخلت رمز تحقق غير صحيح',[],[]);
        }
    }
    public function resetPassword(Request $request){
        $request= $request->json()->all();
        $validator= Validator::make($request,[
            'id'=>'required',
            "password_new" => "required|string|max:255|min:8",
        ]);
        if($validator->fails()){
            return $this->send_response(400,'فشل عملية ',$validator->errors(),[]);
        }

        $student = Student::where('id', $request['id'])->first();
        $student->update([
            'password'=>bcrypt($request['password_new'])
        ]);
        return $this->send_response(200,'تم تغير كلمة المرور بنجاح',[], []);
    }

}
