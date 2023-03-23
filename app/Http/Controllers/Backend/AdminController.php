<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Models\UserVideo;
use App\Models\Video;
use Hash;
use Illuminate\Http\Request;
use Session;
use Str;

class AdminController extends Controller
{

	public function showLoginForm(){
		return view('backend.login');
	}

    public function login(Request $request){
    	// return $request->all();

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        //if admin table credential matches put id/details on the session
        $admin = Admin::where('email' ,$request->email)->first();


  		if ($admin){
            if (password_verify($request->password, $admin->password)) {
                Session::put('admin_id', $admin->id);
                Session::put('admin_name', $admin->name);

                session()->flash('Success', 'You are successfully logged in');
                return redirect('/admin/dashboard');
            }else {
        		session()->flash('Error', 'Password does not match');
                return redirect()->back();
            }
        }else {
        	session()->flash('Error', 'Email does not match');
            return redirect()->back();
        }
        //redirect to dashboard

    }

    public function dashboard(){
    	return view('backend.dashboard');
    }

    public function users()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.auth.user.index', compact('users'));
    }

    public function active(User $user)
    {
        $user->status = 0;
        $user->save();
        session()->flash('Success', 'User has been inactive.');
        return redirect()->back();
    }

    public function inactive(User $user)
    {
        $user->status = 1;
        $user->save();
        session()->flash('Success', 'User has been active.');
        return redirect()->back();
    }
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('Success', 'User has been deleted.');
        return redirect()->back();
    }


    public function logout(Request $request){
    	// return $request;



        Session::forget('admin_id');
        Session::forget('admin_name');

    	return redirect('admin/login');
    }


}
