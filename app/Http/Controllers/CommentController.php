<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request,$id)
    {

        $comment = new Comment;
        $comment->user_id = auth()->user()->id;
        $comment->report_id = $id;
        $comment->comment = $request->comment;
        $comment->save();

        return back();
    }

    public function destroy(Comment $comment)
    {
        Comment::destroy($comment->id);
        return redirect()->back();
    }

}
