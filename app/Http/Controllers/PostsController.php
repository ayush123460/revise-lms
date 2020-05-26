<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Posts;
use App\Courses;

class PostsController extends Controller
{
    public function create(Request $request)
    {
        $post = $request->post;

        $c = Courses::where('id', $request->course_id)->first();

        if($c) {
            $p = Posts::create([
                'content' => $post,
                'user_id' => auth()->user()->id,
                'course_id' => $c->id,
            ]);
        } else {
            return back()->with('err', 'Sorry.');
        }

        return back();
    }
}
