<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Courses;

class HomeController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;

        switch ($role) {
            case 'admin':
                $c = null;
            break;
            case 'teacher':
                $c = Courses::where('teacher_id', auth()->user()->id)->where('active', '1')->get();
            break;
            case 'student':
                $db = DB::table('courses_students')
                        ->where('student_id', auth()->user()->id)
                        ->pluck('course_id');
                if($db->count() > 0)
                    $c = Courses::find($db)->where('active', '1')->get();
                else 
                    $c = $db;
            break;
        }

        return view('home.home', [
            'c' => $c
        ]);
    }

    public function create_class()
    {
        return view('home.class.create', [
            'err' => session()->get('err') ?? null
        ]);
    }
}