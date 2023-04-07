<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\Student;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EnrollController extends Controller
{
    private $student;
    public function newEnroll(Request $request, $id)
    {
        if (!Session::has('student_id'))
        {
            $this->validate($request, [
                'name' => 'required|regex:/(^([a-zA-z-. ]+)?$)/u|min:2|max:20',
                'email' => 'required|email|unique:students,email',
                'mobile' => 'required|regex:/^(?:\+?88)?01[13-9]\d{8}$/|unique:students,mobile'
            ]);
            $this->student = Student::newStudent($request);
            Session::put('student_id', $this->student->id);
            Session::put('student_name', $this->student->name);
        }

        Enroll::newEnroll($id, Session::get('student_id'));
        return redirect('/complete-enroll')->with('message', 'Your registration is submit successfully. Please wait untill confirmation');
    }

    public function completeEnroll()
    {
        return view('website.training.complete-enroll');
    }

}
