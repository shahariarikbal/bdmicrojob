<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LikeCommentRequest;
use App\Models\LikeComment;
use Auth;

class LikeCommentController extends Controller
{
    public function storeComment(LikeCommentRequest $request, $id)
    {
        if(Auth::check()){
            $comment = new LikeComment();
            $comment->post_id = $id;
            $comment->post_type = 'forum';
            $comment->user_id = Auth::user()->id;
            $comment->action_type = 1;
            $comment->comments = $request->comments;
            $comment->save();
            return redirect()->back()->with('success', 'Comment is done successfully!!');
        }

        else{
            return redirect('/login');
        }
    }

    public function storeLike ($id)
    {
        if(Auth::check()){
            $like = new LikeComment();
            $like->post_id = $id;
            $like->post_type = 'forum';
            $like->user_id = Auth::user()->id;
            $like->action_type = 2;
            $like->save();
            return redirect()->back();
        }

        else{
            return redirect('/login');
        }
    }
}
