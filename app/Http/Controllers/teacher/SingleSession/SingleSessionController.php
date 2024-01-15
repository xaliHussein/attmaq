<?php

namespace App\Http\Controllers\teacher\SingleSession;

use App\Http\Controllers\Controller;
use App\Models\SingleSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SingleSessionController extends Controller
{
    public function index()
    {
        $teacher_id = auth()->user()->id;
        $activeSingleSessions = SingleSession::where('teacher_id',$teacher_id)
            ->where(function ($query) {
                $query->where('status', 'accept');
                $query->orWhere('status','in progress');
                $query->orWhere('status','completed');
            })
            ->get();
        return view('teacher.singlesessions.index',compact('activeSingleSessions'));
    }

    public function requests()
    {

        $teacher_id = auth()->user()->id;
        $singlesessions = SingleSession::where('teacher_id',$teacher_id)
            ->where(function ($query) {
                $query->where('status', 'request');

            })
            ->get();

        return view('teacher.singlesessions.requests', compact('singlesessions','teacher_id'));
    }

    public  function create()
    {
        return view('teacher.singlesessions.create');
    }

    public function acceptRequest($id){

        $single_session = SingleSession::findOrFail($id);
        $token = $single_session->student->fcm_token;

        $fcm = env('FCM');

        $response = $single_session->teacher->name .  ' تم اضافتك الى الجلسة الفردية الخاصة ب ';

        $notification = [
            'title' => 'تم قبول طلبك',
            'body' => $response,
        ];

        Http::acceptJson()->withToken($fcm)->post(
            'https://fcm.googleapis.com/fcm/send',
            [
                'to' => $token,
                'notification' => $notification,
            ]
        );




        $single_session->status = 'accept';
        $single_session->save();

        return redirect()->route('single-sessions.requests');
    }

    public function rejectRequest($id){
        $single_session = SingleSession::findOrFail($id);

        $token = $single_session->student->fcm_token;

        $fcm = env('FCM');

        $response =  $single_session->teacher->name .  ' تم رفض طلبك الخاص ب ';

        $notification = [
            'title' => 'تم رفض طلبك',
            'body' => $response,
        ];

        Http::acceptJson()->withToken($fcm)->post(
            'https://fcm.googleapis.com/fcm/send',
            [
                'to' => $token,
                'notification' => $notification,
            ]
        );

        $single_session->status = 'reject';
        $single_session->save();
        return redirect()->route('single-sessions.requests');
    }


    public function edit($id){
        $single_session = SingleSession::findOrFail($id);
        return view('teacher.singlesessions.edit',compact('single_session'));

    }

    public function update(Request $request,$id){
        $validated = $request->validate([
            'progress' => 'required|integer|between:1,100',
            'status' => 'required|in:in progress,completed',
        ]);
        $single_session = SingleSession::findOrFail($id);
        $single_session->progress = $request->progress;
        $single_session->status = $request->status;
        $single_session->save();
        return redirect()->route('single-sessions.index');
    }

    public function sendNotification($id){
        $single_session = SingleSession::findOrFail($id);
        return view('teacher.singlesessions.notifications', compact('single_session'));
    }

    public function notifySession(Request $request,$id){

        $single_session = SingleSession::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $token = $single_session->student->fcm_token;

        $fcm = env('FCM');


        $notification = [
            'title' => $request->title,
            'body' => $request->body,
        ];

        Http::acceptJson()->withToken($fcm)->post(
            'https://fcm.googleapis.com/fcm/send',
            [
                'to' => $token,
                'notification' => $notification,
            ]
        );
        return redirect()->route('single-sessions.index');
    }




}
