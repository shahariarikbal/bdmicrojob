<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Models\Withdraw;
use App\Models\Deposit;
use App\Models\Commission;
use App\Models\UserVideo;
use App\Models\Video;
use App\Models\NidVerification;
use App\Models\Notification;
use App\Models\Contact;
use App\Models\Tip;
use App\Models\HomePage;
use App\Models\AboutUs;
use App\Models\Post;
use App\Models\UserForum;
use App\Models\Blog;
use App\Models\PostSubmit;
use App\Http\Requests\HomePageRequest;
use App\Http\Requests\TipRequest;
use Hash;
use Illuminate\Http\Request;
use Session;
use Stevebauman\Location\Facades\Location;
use Str;
use Auth;
use DB;
use Carbon\Carbon;

class AdminController extends Controller
{

	public function showLoginForm(){
        visitor()->visit();
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

    public function dashboard(Request $request){
        visitor()->visit();
        $sql = DB::table('shetabit_visits')->orderBy('created_at', 'desc');
        if (isset($request->from)) {
            $sql->whereDate('created_at', '>=', $request->from);
        }
        if (isset($request->to)) {
            $sql->whereDate('created_at', '<=', $request->to);
        }
        $visitors = $sql->paginate(50);
        $user_count = User::count();
        $pending_job_count = Post::where('is_approved',0)->count();
        $approved_job_count = Post::where('is_approved',1)->count();
        $total_deposit = User::sum('total_deposit');
        $total_income = User::sum('total_income');
        $total_withdraw = Withdraw::where('is_approved', 1)->sum('withdraw_amount');
        $total_tips = Tip::sum('tips_amount');
        $nid_request = NidVerification::where('status',0)->count();
        $deposit_request = Deposit::where('is_approved',0)->count();
        $withdraw_request = Withdraw::where('is_approved',0)->count();
        $total_commissions = Commission::sum('amount');
    	return view('backend.dashboard', compact('visitors', 'user_count', 'pending_job_count', 'approved_job_count', 'total_deposit', 'total_income', 'total_withdraw', 'total_tips', 'nid_request', 'deposit_request', 'withdraw_request', 'total_commissions'));
    }

    public function visitorView($id)
    {
        visitor()->visit();
       $ip = DB::table('shetabit_visits')->where('id', $id)->find($id);
       $visitor = Location::get($ip->ip);
        return view('backend.visitor.details', compact('visitor'));
    }

    public function users(Request $request)
    {
        visitor()->visit();
        $sql = Tip::with('user')->orderBy('created_at', 'desc');
        if($request->email){
            $userTips = $sql->get()->groupBy('user_id');
            return view('backend.auth.user.index', compact('userTips'));
        }
        if (isset($request->from)) {
            $sql->whereDate('created_at', '>=', $request->from);
        }
        if (isset($request->to)) {
            $sql->whereDate('created_at', '<=', $request->to);
        }
        $userTips = $sql->get()->groupBy('user_id');
        return view('backend.auth.user.index', compact('userTips'));
    }

    public function allUsers (Request $request)
    {
        visitor()->visit();
        if($request->email){
            $users = User::where('email',$request->email)->Paginate(20);
            return view('backend.auth.user.all-user', compact('users'));
        }
        else{
            $users = User::Paginate(20);
            return view('backend.auth.user.all-user', compact('users'));
        }
    }

    public function active(User $user)
    {
        $user->status = 0;
        $user->updated_at = Carbon::now()->toDateTimeString();
        $user->save();
        session()->flash('Success', 'User has been inactive.');
        return redirect()->back();
    }

    public function inactive(User $user)
    {
        $user->status = 1;
        $user->updated_at = Carbon::now()->toDateTimeString();
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

    public function showInactiveUsers ()
    {
        visitor()->visit();
        $users = User::orderBy('created_at', 'desc')->where('status', '!=', 1)->paginate(10);
        return view('backend.auth.user.inactive-user', compact('users'));
    }


    public function logout(Request $request){
    	// return $request;



        Session::forget('admin_id');
        Session::forget('admin_name');

    	return redirect('admin/login');
    }

    public function showVerificationRequest ()
    {
        visitor()->visit();
        $nid_requests = NidVerification::with('user')->orderBy('created_at','desc')->Paginate(10);
        return view('backend.request.show-nid-request', compact('nid_requests'));
    }

    public function showVerificationRequestDetails ($id)
    {
        visitor()->visit();
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
        visitor()->visit();
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
        visitor()->visit();
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
        visitor()->visit();
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

    public function showAboutUs ()
    {
        visitor()->visit();
        $about_us = AboutUs::all();
        return view ('backend.about_us.show-about-us', compact('about_us'));
    }

    public function editAboutUs ($id)
    {
        visitor()->visit();
        $about_us = AboutUs::find($id);
        return view ('backend.about_us.edit-about-us', compact('about_us'));
    }

    public function updateAboutUs (Request $request, $id)
    {
        $about_us = AboutUs::find($id);

        $about_us->title = $request->title;
        $about_us->short_description = $request->short_description;
        $about_us->long_description = $request->long_description;

        $about_us->save();
        return redirect('/admin/about-us')->with('success', 'Updated Successfully!');

    }

    public function adminProfileUpdate ()
    {
        visitor()->visit();
        $auth_admin = Admin::first();
        return view('backend.profile.show-profile', compact('auth_admin'));

    }

    public function storeProfileUpdate (Request $request, $id)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'old_password' => 'required',
            'new_password' => 'required',
            'password_confirmation' => 'required',
        ]);
        $admin = Admin::find(1);
        if(isset($request->new_password)){
            if (password_verify($request->old_password, $admin->password)){
                if($request->new_password==$request->password_confirmation){
                    $admin->password=bcrypt($request->new_password);
                    $admin->email=$request->email;
                    $admin->update();
                    return redirect('/admin/dashboard')->with('success', 'Updated Successfully');
                }
                else{
                    return redirect()->back()->with('error', 'Confirm Password is not Matched!!');
                }
            }
            else{
                return redirect()->back()->with('error', 'Old Password does not Match!!');
            }
        }
        else{
            $admin->email=$request->email;
            $admin->update();
            return redirect('/admin/dashboard')->with('success', 'Updated Successfully');
        }
    }

    public function showForum ()
    {
        visitor()->visit();
        $forums = UserForum::with('user')->orderBy('created_at', 'desc')->get();
        return view('backend.forum.show-forum', compact('forums'));
    }

    public function showForumDetails ($id)
    {
        visitor()->visit();
        $forum = UserForum::where('id', $id)->with('user')->first();
        return view('backend.forum.show-forum-details', compact('forum'));
    }

    public function showBlog ()
    {
        visitor()->visit();
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        return view('backend.blog.show-blog', compact('blogs'));
    }

    public function createBlog ()
    {
        visitor()->visit();
        return view('backend.blog.create-blog');
    }

    public function storeBlog (Request $request)
    {
        $blog = new Blog();
        $blog->short_title = $request->short_title;
        $blog->slug = Str::slug($request->short_title);
        $blog->long_title = $request->long_title;
        $blog->short_description = $request->short_description;
        $blog->long_description = $request->long_description;
        if($request->hasFile('image')){
            $name = rand(0,1000) . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('blog/', $name);
            $blog->image = $name;
        }

        $blog->save();
        return redirect('/admin/all-blog')->with('success','Created Successfully!');
    }

    public function editBlog ($id)
    {
        visitor()->visit();
        $blog = Blog::find($id);
        return view ('backend.blog.edit-blog', compact('blog'));
    }

    public function updateBlog (Request $request, $id)
    {
        $blog = Blog::find($id);
        $blog->short_title = $request->short_title;
        $blog->slug = Str::slug($request->short_title);
        $blog->long_title = $request->long_title;
        $blog->short_description = $request->short_description;
        $blog->long_description = $request->long_description;

        if($request->hasFile('image')){
            if ($blog->image && file_exists(public_path('blog/'.$blog->image))){
                unlink(public_path('blog/'.$blog->image));
            }
            $name = rand(0,1000) . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('blog/', $name);
            $blog->image = $name;
        }

        $blog->save();
        return redirect('/admin/all-blog')->with('success','Updated Successfully!');
    }

    public function deleteBlog ($id)
    {
        $blog = Blog::find($id);
        if ($blog->image && file_exists(public_path('blog/'.$blog->image))){
            unlink(public_path('blog/'.$blog->image));
        }

        $blog->delete();
        return redirect()->back()->with('success','Deleted Successfully!');
    }

    public function pendingTask ()
    {
        visitor()->visit();
        $pending_tasks = PostSubmit::where('status','0')->with('user','post')->orderBy('created_at', 'asc')->Paginate(10);
        return view ('backend.task.list', compact('pending_tasks'));
    }

    public function pendingTaskDetails ($id)
    {
        visitor()->visit();
        $pending_task = PostSubmit::where('id', $id)->with('user', 'post')->first();
        return view ('backend.task.details', compact('pending_task'));
    }

    public function pendingTaskApprove ($id)
    {
        $submitted_job = PostSubmit::where('id',$id)->with('post')->first();
        $job_post = Post::where('id', $submitted_job->post_id)->with('category')->first();

        if($submitted_job->status != '1'){
            $submitted_job->status = '1';
            if($submitted_job->save()){
                $worker = User::find($submitted_job->user_id);
                $previous_income=$worker->total_income;
                $worker->total_income = $previous_income+$job_post->category->worker_earning;
                $worker->save();

                return redirect()->back()->with('Success','Approved Successfully!');
                }
            }
            else{
                return redirect()->back()->with('Error','Already Approved!');
            }
    }

}
