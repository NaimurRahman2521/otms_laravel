<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    private $student, $enrolls;

    public function login(Request $request)
    {
        $this->student = Student::where('email', $request->email)->first();
        if($this->student)
        {
            if(password_verify($request->password, $this->student->password))
            {
                Session::put('student_id', $this->student->id);
                Session::put('student_name', $this->student->name);
                return redirect('/student/dashboard');
            }
            else
            {
                return back()->with('message', 'Sorry... incorrect password');
            }
        }
        else
        {
            return back()->with('message', 'Sorry...email address is invalid');
        }
    }

    public function signup(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|regex:/(^([a-zA-z-. ]+)?$)/u|min:2|max:20',
            'email' => 'required|email:rfc,dns|unique:students,email',
            'mobile' => 'required|regex:/^(?:\+?88)?01[13-9]\d{8}$/|unique:students,mobile',
            'password' => 'required|min:6'
        ]);

        $this->student = Student::newStudent($request);
        if($this->student)
        {
            Session::put('student_id', $this->student->id);
            Session::put('student_name', $this->student->name);
            return redirect('/student/dashboard')->with('message', 'Successfully registration completed.');
        }
        else
        {
            return back()->with('message', 'Registration failed try again!');
        }
    }

    public function change()
    {
        return view('website.student.change-password');
    }

    public function newPassword(Request $request)
    {
        $this->validate($request, [
            'old' => 'required',
            'new' => 'required|min:6',
            'password' => 'required|min:6'
        ]);
        $this->student = Student::find(Session::get('student_id'));
        if (password_verify($request->old, $this->student->password))
        {
            if ($request->new == $request->password)
            {
                Student::changePassword($request);
                return back()->with('message', 'Password successfully changed!');
            }
            else
            {
                return back()->with('error', 'Do not match new password and confirm password');
            }

        }
        else
        {
            return back()->with('error', 'Do not match old password!');
        }
    }

    public function dashboard()
    {
        return view('website.student.dashboard');
    }

    public function profile()
    {
        $this->student = Student::find(Session::get('student_id'));
        return view('website.student.profile', ['student' => $this->student]);
    }

    public function updateProfile(Request $request)
    {
        Student::changeProfile($request);
        return back()->with('message', 'Profile updated success');
    }

    public function training()
    {
        $this->enrolls = Enroll::where('student_id', Session::get('student_id'))->get();
        return view('website.student.training', ['enrolls' => $this->enrolls]);
    }

    public function logout()
    {
        Session::forget('student_id');
        Session::forget('student_name');
        return redirect('/');
    }
}
