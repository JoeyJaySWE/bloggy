<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class CommentsController extends Controller
{
    public function createComment(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:30',
            'comment' => 'required|string|max:300',
        ]);

        $comment = new Comment();
        $comment->post_id = $request->input('post_id');
        $comment->name = $request->input('name');
        $comment->comment = $request->input('comment');
        //dd($comment);
        $comment->save();

        return back()->withSuccess('Your comment was created!');
    }

    public function deleteComment(Comment $comment)
    {
        $comment->delete();
        return back()->withSuccess('Your comment is deleted!');
    }
}
