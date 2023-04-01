<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Models\UserVideo;
use App\Models\Video;
use App\Models\NidVerification;
use App\Models\Notification;
use App\Models\Contact;
use App\Models\Tip;
use App\Models\HomePage;
use App\Http\Requests\HomePageRequest;
use App\Http\Requests\TipRequest;
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

    public function showVerificationRequest ()
    {
        $nid_requests = NidVerification::with('user')->orderBy('created_at','desc')->Paginate(10);
        return view('backend.request.show-nid-request', compact('nid_requests'));
    }

    public function showVerificationRequestDetails ($id)
    {
        $nid_request = NidVerification::with('user')->find($id);
        return view('backend.request.show-nid-request-details',compact('nid_request'));
    }

    public function approveNidRequest ($id)
    {
        $nid_request = NidVerification::find($id);

        if($nid_request){
            $nid_request->status = 1;
            if($nid_request->save()){
                $user = User::find($nid_request->user_id);
                if($user->nid_verified!=1 && $user->nid_verified!=2){
                    $user->nid_verified = 1;
                    $user->save();
                    //Notification....
                    $notification = new Notification();
                    $notification->message = 'Account verification request is approved';
                    $notification->specific_user_id = $nid_request->user_id;
                    $notification->notification_for = "user";
                    $nid_request->nidVerification()->save($notification);
                    //Notification....
                    return redirect()->back()->with('Success','Approved Successfully!!');
                }
                else{
                    return redirect()->back()->with('Error','Already Approved!!');
                }
            }
        }
    }

    public function rejectNidRequest ($id)
    {
        $nid_request = NidVerification::find($id);

        if($nid_request && $nid_request->status !=1){
            if($nid_request->status==2){
                return redirect()->back()->with('Error','Already Rejected!!');
            }
            else{
                $nid_request->status = 2;
                $nid_request->save();
                //Notification....
                $notification = new Notification();
                $notification->message = 'Account verification request is rejected';
                $notification->specific_user_id = $nid_request->user_id;
                $notification->notification_for = "user";
                $nid_request->nidVerification()->save($notification);
                //Notification....
                return redirect()->back()->with('Success','Rejected Successfully!!');
            }
        }
        else{
            return redirect()->back()->with('Error','Already Approved!!');
        }
    }

    public function showContact ()
    {
        $contacts = Contact::Paginate(10);
        return view ('backend.contact.show-contacts', compact('contacts'));
    }

    public function deleteContact ($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->back()->with('Success','Deleted Successfully!!');
    }

    public function showHomePage ()
    {
        $homepage = HomePage::first();
        return view ('backend.homepage.show-homepage', compact('homepage'));
    }

    public function updateHomePage (HomePageRequest $request)
    {
        $homepage = HomePage::first();
        if($request->hasFile('slider_image')){
            if(file_exists(public_path('homepage/'.$homepage->slider_image))){
                File::delete(public_path('homepage/'.$homepage->slider_image));
                $name = rand(0, 99999) . '.' . $request->slider_image->getClientOriginalExtension();
                $request->slider_image->move('homepage/', $name);
                $homepage->slider_image = $name;
            }
            else{
                $name = rand(0, 99999) . '.' . $request->slider_image->getClientOriginalExtension();
                $request->slider_image->move('homepage/', $name);
                $homepage->slider_image = $name;
            }

        }

        if($request->hasFile('first_image')){
            if(file_exists(public_path('homepage/'.$homepage->first_image))){
                File::delete(public_path('homepage/'.$homepage->first_image));
                $name = rand(0, 99999) . '.' . $request->first_image->getClientOriginalExtension();
                $request->first_image->move('homepage/', $name);
                $homepage->first_image = $name;
            }
            else{
                $name = rand(0, 99999) . '.' . $request->first_image->getClientOriginalExtension();
                $request->first_image->move('homepage/', $name);
                $homepage->first_image = $name;
            }

        }

        if($request->hasFile('second_image')){
            if(file_exists(public_path('homepage/'.$homepage->second_image))){
                File::delete(public_path('homepage/'.$homepage->second_image));
                $name = rand(0, 99999) . '.' . $request->second_image->getClientOriginalExtension();
                $request->second_image->move('homepage/', $name);
                $homepage->second_image = $name;
            }
            else{
                $name = rand(0, 99999) . '.' . $request->second_image->getClientOriginalExtension();
                $request->second_image->move('homepage/', $name);
                $homepage->second_image = $name;
            }

        }

        if($request->hasFile('footer_image')){
            if(file_exists(public_path('homepage/'.$homepage->footer_image))){
                File::delete(public_path('homepage/'.$homepage->footer_image));
                $name = rand(0, 99999) . '.' . $request->footer_image->getClientOriginalExtension();
                $request->footer_image->move('homepage/', $name);
                $homepage->footer_image = $name;
            }
            else{
                $name = rand(0, 99999) . '.' . $request->footer_image->getClientOriginalExtension();
                $request->footer_image->move('homepage/', $name);
                $homepage->footer_image = $name;
            }

        }

        $homepage->slider_title = $request->slider_title;
        $homepage->first_image_title = $request->first_image_title;
        $homepage->first_image_description = $request->first_image_description;
        $homepage->second_image_title = $request->second_image_title;
        $homepage->second_image_description = $request->second_image_description;
        $homepage->how_works_title = $request->how_works_title;
        $homepage->how_works_description = $request->how_works_description;
        $homepage->footer_title = $request->footer_title;
        $homepage->footer_description = $request->footer_description;

        $homepage->save();
        return redirect()->back()->with('success', 'Updated Successfully');
    }

    public function showTip ($user_id)
    {
        $user = User::find($user_id);
        return view ('backend.tip.show-tip-page', compact('user'));
    }

    public function storeTip (TipRequest $request, $user_id)
    {
        $user = User::find($user_id);
        if($user){
            $tip = new Tip();
            $tip->user_id = $user_id;
            $tip->tips_type = $request->tips_type;
            $tip->tips_amount = $request->tips_amount;

            if($tip->save()){
                if($request->tips_type=='earning'){
                    $user->total_income = $user->total_income + $request->tips_amount;
                    $user->save();
                    //Notification....
                    $notification = new Notification();
                    $notification->message = 'You have received tips'.' '.$request->tips_amount.' '.'tk on earning from admin!!';
                    $notification->specific_user_id = $user_id;
                    $notification->notification_for = "user";
                    $tip->tip()->save($notification);
                    //Notification....
                    return redirect()->back()->with('success', 'Tips are given successfully!!');
                }
                elseif($request->tips_type=='deposit'){
                    $user->total_deposit = $user->total_deposit + $request->tips_amount;
                    $user->save();
                    //Notification....
                    $notification = new Notification();
                    $notification->message = 'You have received tips'.' '.$request->tips_amount.' '.'tk on deposit from admin!!';
                    $notification->specific_user_id = $user_id;
                    $notification->notification_for = "user";
                    $tip->tip()->save($notification);
                    //Notification....
                    return redirect()->back()->with('success', 'Tips are given successfully!!');
                }
            }
            else{
                return redirect()->back()->with('error', 'Failed to give tips!!');
            }
        }
        else{
            return redirect()->back()->with('error', 'User not found!!');
        }
    }


}
