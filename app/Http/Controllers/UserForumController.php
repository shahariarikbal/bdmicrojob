<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserForumRequest;
use App\Models\UserForum;
use Auth;

class UserForumController extends Controller
{
    public function showForum ()
    {
        if(Auth::check()){
            $auth_user = Auth::user();
            $forums = UserForum::where('user_id', $auth_user->id)->with('user')->orderBy('created_at', 'desc')->get();
            //dd($forums);
            return view ('frontend.auth.user.my-forum', compact('forums'));
        }

        else{
            return redirect('/login');
        }
    }

    public function showMyForumDetails ($id)
    {
        if(Auth::check()){
            $forum = $forum = UserForum::where('id', $id)->where('user_id', Auth::user()->id)->with('user')->first();
            return view ('frontend.auth.user.my_forum_details', compact('forum'));
        }

        else{
            return redirect('/login');
        }
    }

    public function showForumDetails ($id)
    {
        $forum = UserForum::where('id', $id)->with('user')->first();
        return view('frontend.forum.forum-details', compact('forum'));
    }

    public function storeForum (UserForumRequest $request)
    {
        if(Auth::check()){
            $forum = new UserForum();
            $forum->description = $request->description;
            $forum->user_id = Auth::user()->id;
            if($request->hasFile('image')){
                $name = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move('forum/', $name);
                $forum->image = $name;
            }
            $forum->save();
            return redirect()->back()->with('success', 'Posted Successfully!');
        }

        else{
            return redirect('/login');
        }

    }
}
