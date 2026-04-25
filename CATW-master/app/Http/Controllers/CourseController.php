<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public function create(Request $request,Course $course)
    {
        $data = $request->validate([
            'course' => 'required',
            'class' => 'required',
            'fullname' => 'required|max:255',
            'birthday' => 'required',
            'phone' => 'required',
            'email' => 'required|email|max:255|unique:users',
        ]);

        $user = User::create([
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'birthday' => $data['birthday'],
            'url_avatar' => 'https://ui-avatars.com/api/?name=' . $data['fullname'],
            'password' => '',
            'status' => 'Waiting'
        ]);

        $user->classes()->attach($data['class']);

        $request->session()->flash('message', 'Successful registration, Your account will be approved by the administrator !');

        return redirect()->route('register-course',$course->id);
    }

    public function showFormRegisterCourse(Course $course)
    {
        return view('courses.register-course',compact('course'));
    }

    public function showCourse(Course $course)
    {
        return view('courses.show-course',compact('course'));
    }

    public function showFormRegisterCourseForMember(Course $course)
    {
        if(!Auth::guard('web')->check())
        {
            return redirect()->route('register-course',$course->id);
        }   

        return view('courses.register-course-member',compact('course'));
    }

    public function createForMember(Request $request,Course $course)
    {
        if(!Auth::guard('web')->check())
        {
            return redirect()->route('register-course',$course->id);
        }   

        $data = $request->validate([
            'course' => 'required',
            'class' => 'required',
        ]);
        
        $classStudents = Auth::guard('web')->user()->classes;


        foreach($classStudents as $class)
        {
            if($class->id == $data['class'])
            {
                $request->session()->flash('message', 'You have already registered for this course, Please choose another course !');

                return redirect()->route('register-course-member',$course->id);
            }
        }

        Auth::guard('web')->user()->classes()->attach($data['class']);

        $request->session()->flash('message', 'Successful registration !');

        return redirect()->route('register-course-member',$course->id);
    }
}
