<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Student extends Model
{
    use HasFactory;

    private static $student, $image, $imageExtension, $imageName, $imageDirectory, $imageUrl;

    private static function getImage($request)
    {
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = rand(100, 1000) . '.' . self::$imageExtension;
        self::$imageDirectory = 'images/upload/student/';
        self::$image->move(self::$imageDirectory, self::$imageName);
        self::$imageUrl = self::$imageDirectory . self::$imageName;
        return self::$imageUrl;
    }
    public static function newStudent($request)
    {
        self::$student = new Student();
        self::$student->name = $request->name;
        self::$student->email = $request->email;
        if($request->password)
        {
            self::$student->password = bcrypt($request->password);
        }
        else
        {
            self::$student->password = bcrypt($request->mobile);
        }
        self::$student->mobile = $request->mobile;
        self::$student->save();
        return self::$student;
    }

    public static function changePassword($request)
    {
        self::$student = Student::find(Session::get('student_id'));
        self::$student->password = bcrypt($request->password);
        self::$student->save();
    }

    public static function changeProfile($request)
    {
        self::$student = Student::find(Session::get('student_id'));
        if ($request->file('image'))
        {
            if (file_exists(self::$student->image))
            {
                unlink(self::$student->image);
            }
            self::$imageUrl = self::getImage($request);
        }
        else
        {
            self::$imageUrl = self::$student->image;
        }
        self::$student->name = $request->name;
        self::$student->mobile  = $request->mobile;
        self::$student->address  = $request->address;
        self::$student->date_of_birth  = $request->date_of_birth;
        self::$student->nid  = $request->nid;
        self::$student->gender  = $request->gender;
        self::$student->image  = self::$imageUrl;
        self::$student->save();
    }

}
