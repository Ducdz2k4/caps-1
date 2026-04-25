<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Admin;
use App\Course;
use App\Lesson;
use App\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::all();

        $courses = Course::all();

        $classes = ClassRoom::all();

        $lessons = Lesson::all();

        $admins = Admin::where('role','Admin')->get();

        $managers = Admin::where('role','Manager')->get();

        return view('admin.home',compact('users','courses','classes','lessons','admins','managers'));
    }
}
