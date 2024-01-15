<?php

namespace App\Http\Controllers\teacher\Course;

use App\Http\Controllers\Controller;
use App\Models\SingleSession;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index($id)
    {
        $single_session = SingleSession::find($id);
        return view('teacher.courses.index' , compact('single_session'));
    }

    public function create($id)
    {
        $single_session = SingleSession::find($id);
        return view('teacher.courses.create' , compact('single_session'));
    }
}
