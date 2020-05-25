<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

use App\Courses;
use App\User;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Courses $course)
    {
        $course = $course->first();
        
        $res = Http::withHeaders([
            'Authorization' => 'Bearer ' . session()->get('token')
        ])
        ->post(env('REVISE_AUTH_URL') . '/api/teacher', [
            'id' => $course->teacher_id
        ]);

        if(auth()->user()->role == 'teacher') {
            $students = DB::table('courses_students')
            ->where('course_id', $course->id)
            ->pluck('student_id');

            $st = User::find($students);
        }

        return view('home.class.view', [
            'c' => $course,
            's' => $course->syllabus(),
            'p' => $course->posts(),
            'm' => $course->material(),
            't' => $res->json(),
            'st' => $st ?? null
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $v = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'grade' => 'required'
        ]);

        if($v->fails()) {
            return back()->with('err', 'Please enter all fields.');
        }

        Courses::create([
            'name' => $request->name,
            'description' => $request->description,
            'grade' => $request->grade,
            'academic_year' => Carbon::now()->year,
            'code' => Str::random(6),
            'teacher_id' => auth()->user()->id
        ]);

        return redirect()->route('auth_home');
    }

    public function join(Request $request)
    {
        if(auth()->user()->role == 'student') {

            $code = $request->code;

            $c = Courses::where('code', $code)->where('active', 1)->first();

            if($c != null) {

                DB::table('courses_students')->insert([
                    'course_id' => $c->id,
                    'student_id' => auth()->user()->id
                ]);

                return route('course_view', $code);

            } else {

                return back()->with('err', 'This class does not exist or is no longer available to join.');

            }

        } else {

            return back()->with('err', 'You are not allowed to join as student.');

        }
    }
}
