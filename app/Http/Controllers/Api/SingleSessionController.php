<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\SingleSession;
use App\Traits\SendResponse;
use Illuminate\Http\Request;
use App\Traits\OrderBy;
use App\Traits\Pagination;

use Illuminate\Support\Facades\Validator;

class SingleSessionController extends Controller
{
    use SendResponse,Pagination,OrderBy;

    public function createSession(Request $request){
        $request = $request->json()->all();

        $validator = Validator::make($request, [
            "teacher_id" => "required|exists:teachers,id",
            "student_id" => "required|exists:students,id",
        ], [
            "teacher_id.required" => "يرجى ادخال رقم الاستاذ",
            "student_id.required" => "يرجى ادخال عنوان الطالب ",
            "student_id.exists" => "حساب هذا الطالب غير متوفر",
            "teacher_id.exists" => "حساب هذا الاستاذ غير متوفر",
        ]);

        if ($validator->fails()) {
            return $this->send_response(400, "حصل خطأ في المدخلات", $validator->errors(), []);
        }

        // prevent student to join to other courses when he's already join on session -> status = in progress
        $sessions = SingleSession::where('student_id',$request['student_id'])
            ->where(function ($query) {
                $query->where('status', 'in progress');
                $query->orWhere('status','accept');
            })
            ->get();
        if(count($sessions) > 0){
            return $this->send_response(400, "يجب ان تكمل الجلسات الحالية قبل الانضمام الا جلسات اخرى", [], []);
        } else {
           $sesssion =  SingleSession::create([
                "teacher_id" => $request['teacher_id'],
                "student_id" => $request['student_id'],
                "status" => "request"
            ]);
            return $this->send_response(200, 'تم ارسال طلبك بنجاح بانتضار موافقة الاستاذ', [],$sesssion, null, null);
        }
    }

    public function getCurrentSession(){

        $id = auth()->user()->id;
        $sessions = SingleSession::where('student_id',$id)
            ->where(function ($query) {
                $query->where('status', 'in progress');
                $query->orWhere('status','accept');
                $query->orWhere('status','completed');
            });
            if (!isset($_GET['skip']))
                $_GET['skip'] = 0;
            if (!isset($_GET['limit']))
                $_GET['limit'] = 10;
            $res = $this->paging($sessions->orderBy("created_at", "DESC"),  $_GET['skip'],  $_GET['limit']);
            return $this->send_response(200, 'تم احضار الجلسات بنجاح', [], $res["model"], null, $res["count"]);
    }

    public  function getCourses(Request $request) {

        if (isset($_GET["session_id"])) {
            $lessons = Course::where('single_session_id',$_GET["session_id"]);

            if (!isset($_GET['skip']))
                $_GET['skip'] = 0;
            if (!isset($_GET['limit']))
                $_GET['limit'] = 10;
            $res = $this->paging($lessons->orderBy("created_at", "DESC"),  $_GET['skip'],  $_GET['limit']);
            return $this->send_response(200, 'تم احضار الكورسات بنجاح', [], $res["model"], null, $res["count"]);
        }else{
            return $this->send_response(400, 'الكورسات غير متوفره', [], []);
        }

    }

    public  function getLessons(Request $request) {

        if (isset($_GET["course_id"])) {
            $lessons = Lesson::where('course_id',$_GET["course_id"]);

            if (!isset($_GET['skip']))
                $_GET['skip'] = 0;
            if (!isset($_GET['limit']))
                $_GET['limit'] = 10;
            $res = $this->paging($lessons->orderBy("created_at", "DESC"),  $_GET['skip'],  $_GET['limit']);
            return $this->send_response(200, 'تم احضار الدروس بنجاح', [], $res["model"], null, $res["count"]);
        }else{
            return $this->send_response(400, 'الدروس غير متوفره', [], []);
        }
    }
}
