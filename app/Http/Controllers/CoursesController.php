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
        ->post('http://localhost:8001/api/teacher', [
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show(Courses $courses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit(Courses $courses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courses $courses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courses $courses)
    {
        //
    }
}
