<?php

namespace App\Http\Controllers;

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
        return view('user.dashboard');
    }

    public function showPostJob()
    {
        return view('frontend.auth.user.job.post-job');
    }
}
