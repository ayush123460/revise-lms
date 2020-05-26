<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Courses;
use App\Syllabus;
use App\Chapters;

class ChaptersController extends Controller
{
    public function create(Request $request)
    {
        $name = $request->chapter_name;
        $cid = $request->course_id;

        $course = Courses::find($cid)->with('syllabus')->first();

        if(!$course->syllabus) {

            $s = Syllabus::create([
                'course_id' => $cid
            ]);

        } else {

            $s = $course->syllabus;

        }

        $c = Chapters::create([
            'name' => $name,
            'syllabus_id' => $s->id,
        ]);

        return back();
    }

    public function complete(Request $request)
    {

        $c = Chapters::where('id', $request->chapter_id)->first();

        if($c->completed == 0) {

            $c->completed = 1;

        } else {

            $c->completed = 0;

        }

        $c->save();

        return back()->with([
            'msg' => 'Chapter updated.'
        ]);

    }
}
