<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userRegister()
    {
        return view('auth.register');
    }
    public function userRegisterStore(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|confirmed',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->back()->with('success', 'User has been register successfully');
    }

    public function index()
    {
        $categories = Category::select(['id', 'name', 'status', 'price'])->orderBy('created_at', 'desc')->where('status', 1)->get();
        return view('user.dashboard', compact('categories'));
    }

    public function showPostJob()
    {
        $categories = Category::select(['id', 'name', 'status', 'price'])->orderBy('created_at', 'desc')->where('status', 1)->get();
        return view('frontend.auth.user.job.post-job', compact('categories'));
    }

    public function showAccountVarify()
    {
        return view('frontend.auth.user.account-varify');
    }

    public function showMyTask()
    {
        return view('frontend.auth.user.my-task');
    }

    public function showAcceptedTask()
    {
        return view('frontend.auth.user.accepted-task');
    }

    public function showJobDetails($id)
    {
        $postDetail = Post::with('specificTasks')->find($id);
        return view('frontend.auth.user.job.job-details', compact('postDetail'));
    }

    public function showJobReport($id)
    {
        $postDetail = Post::with('specificTasks')->find($id);
        return view('frontend.auth.user.job.job-report', compact('postDetail'));
    }

    // public function showDeposit()
    // {
    //     return view('frontend.auth.user.deposit');
    // }
}
