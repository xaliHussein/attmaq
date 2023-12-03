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

use Vonage\Client\Credentials\Basic;
use Vonage\Client;
use Vonage\SMS\Message\SMS;

class LoginController extends Controller{
    use SendResponse, Pagination;

    public function sendCode($phone_number)
    {

        $random_code= substr(str_shuffle("0123456789"), 0, 6);
        try {
            // $basic  = new Basic('851a11ff', 'Qhepde8E8JMucJyV');
            // $client = new Client($basic);
            // $message = new SMS('964'.$phone_number, 'ALI','Your OTP is: ' . $random_code);
            // $response = $client->sms()->send($message);
            return $random_code;

        }catch (Exception $e) {
            return $this->send_response(400,'فشل عملية',$e->getMessage(),[]);
        }
    }




    public function login(Request $request){
        $request = $request->json()->all();
        $validator = Validator::make($request, [
            'phone' => 'required',
            'password' => 'required'
        ], [
            'phone.required' => 'يرجى ادخال رقم الهاتف ',
            'password.required' => 'يرجى ادخال كلمة المرور ',
        ]);
        if ($validator->fails()) {
            return $this->send_response(400, "حصل خطأ في المدخلات", $validator->errors(), []);
        }
        $student = Student::where('phone', $request['phone'])->first();

        if(!$student || !password_verify($request['password'], $student->password)){
            return $this->send_response(401, 'هناك مشكلة تحقق من تطابق المدخلات', null, null, null);
        }
        $token = $student->createToken('attmaq_student')->plainTextToken;
        return $this->send_response(200,'تم تسجيل الدخول بنجاح',[], $student, $token);

    }
    public function register(Request $request){
        $request = $request->json()->all();
        $validator= Validator::make($request,[
            "name" => "required|string|max:255|min:3|unique:students,name",
            "phone" => "required|string|max:11|min:11|unique:students,phone",
            "password" => "required|string|max:255|min:8",
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
            return $this->send_response(401,'فشل العملية ',$validator->errors(),[]);
        }
        $random_code=$this->sendCode($request['phone']);
        $student = Student::create([
            'name'=> $request['name'],
            'otp'=>$random_code,
            'phone'=>$request['phone'],
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
            return $this->send_response(401,'فشل عملية ',$validator->errors(),[]);
        }
         $student = Student::find($request['id']);
        if($request['otp'] == $student->otp){
            $student->update([
                'account_status'=> true
            ]);
            return $this->send_response(200,'تم التحقق بنجاح',[],$student);
        }else{
            return $this->send_response(401,'فشلة العملية',[],[]);
        }
    }
    public function sendCodeAgain(Request $request){
        $request= $request->json()->all();
        $validator= Validator::make($request,[
            'id'=>'required|exists:students,id',
        ]);
        if($validator->fails()){
            return $this->send_response(401,'فشل عملية ',$validator->errors(),[]);
        }
        $student = Student::find($request['id']);
        $random_code=$this->sendCode($student->phone);
        $student->update([
            'otp'=>$random_code
        ]);
        return $this->send_response(200,'تم ارسال رمز التحقق بنجاح',[],[]);
    }
}
