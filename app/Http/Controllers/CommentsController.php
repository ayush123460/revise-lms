<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Comments;

class CommentsController extends Controller
{
    public function create(Request $request)
    {
        $pid = $request->post_id;
        $comment = $request->comment;
        Comments::create([
            'content' => $comment,
            'user_id' => auth()->user()->id,
            'post_id' => $pid
        ]);

        return back();
    }
}
