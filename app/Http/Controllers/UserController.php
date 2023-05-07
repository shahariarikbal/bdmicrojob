<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\NidVerificationRequest;
use App\Mail\UserRegisterEmail;
use App\Models\JobReport;
use App\Models\NidVerification;
use App\Models\PostSubmit;
use App\Models\Notification;
use App\Models\Deposit;
use App\Models\Withdraw;
use App\Models\MarqueeText;
use App\Models\UserReport;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use File;

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
        $token = Str::random(64);
       $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'remember_token' => $token,
            'password' => bcrypt($request->password),
        ]);
        Mail::to($request->email)->send(new UserRegisterEmail($user));
        return redirect()->back()->with('success', 'User has been register successfully, Please verify your email ASAP');
    }

    public function showForgotPassword(){
        return view('auth.forgot-password');
    }

    public function storeForgotPassword (Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if($user){
            $new_password = rand(0, 99999);
            $user->password=bcrypt($new_password);
            $user->update();

            //Mail Send....
            $user_email = $request->email;
            $user_name = $user->name;
            Mail::send('frontend.mail.forgot-password',  [
                'new_password' => $new_password,
                'name' => $user_name,
            ],
                function ($msg) use ($user_email){
                    $msg->from('info@bdmicrojob.com', 'BDMicrojob');
                    $msg->subject('Forgot password mail');
                    $msg->to($user_email);
                });
            //Mail Send....
            return redirect()->back()->with('success','A new password is sent in your email!!');
        }
        else{
            return redirect()->back()->with('error','User with this email is not found!!');
        }
    }

    public function verification($token = null)
    {
        if($token === null){
            return redirect('/login')->with('error', 'Invalid token');
        }

        $user = User::where('remember_token', $token)->first();
        if($user === null){
            return redirect('/login')->with('error', 'Invalid user');
        }

        $user->update([
            'email_verified_at' => Carbon::now(),
            'remember_token' => ''
        ]);

        return redirect('/login')->with('success', 'Your account is activated. You can login now');
    }

    public function index()
    {
        visitor()->visit();
        $categories = Category::select(['id', 'name', 'status', 'price'])->orderBy('created_at', 'desc')->where('status', 1)->get();
        return view('user.dashboard', compact('categories'));
    }

    public function showPostJob()
    {
        visitor()->visit();
        $categories = Category::select(['id', 'name', 'status', 'price', 'worker_earning'])->orderBy('created_at', 'desc')->where('status', 1)->get();
        $form_step = 'one';
        return view('frontend.auth.user.job.post-job', compact('categories', 'form_step'));
    }

    public function postStoreCategoryDetails (Request $request)
    {
        $category_id = $request->cat_id;
        $cat_details = Category::find($category_id);
        $form_step = 'two';
        return view('frontend.auth.user.job.post-job', compact('cat_details', 'form_step'));
    }

    public function postStoreJobInfo (Request $request)
    {
        $form_step = 'three';
        $worker_number = $request->worker_number;
        $worker_earn = $request->worker_earn;
        $category_id = $request->cat_id;
        return view('frontend.auth.user.job.post-job', compact('form_step', 'worker_number', 'worker_earn', 'category_id'));
    }

    public function showAccountVarify()
    {
        if(Auth::check()){
            visitor()->visit();
            $auth_user = Auth::user();
            $nid_verified = $auth_user->nid_verified;
            return view('frontend.auth.user.account-varify', compact('nid_verified'));
        }

        else{
            return redirect('/login');
        }
    }

    public function storeAccountVerify(NidVerificationRequest $request)
    {
        if(Auth::check()){
            $auth_user = Auth::user();
            $nid_verification = new NidVerification();

            if($request->hasFile('card_image')){
                $name = time() . '.' . $request->card_image->getClientOriginalExtension();
                $request->card_image->move('card_verification/', $name);
                $nid_verification->card_image = $name;
            }
            if($request->hasFile('user_image')){
                $name = time() . '-'. '.' . $request->user_image->getClientOriginalExtension();
                $request->user_image->move('card_verification/', $name);
                $nid_verification->user_image = $name;
            }
            $nid_verification->user_id = $auth_user->id;
            $nid_verification->card_type = $request->card_type;
            $nid_verification->card_name = $request->card_name;
            $nid_verification->card_number = $request->card_number;

            $nid_verification->save();
            return redirect()->back()->with('Success','Documents Submission done');
        }

        else{
            return redirect('/login');
        }
    }

    public function historyAccountVerify ()
    {
        visitor()->visit();
        $nid_verifications = NidVerification::where('user_id', Auth::user()->id)->paginate(5);
        return view('frontend.auth.user.account-varify-history', compact('nid_verifications'));
    }

    public function showMyTask()
    {
        visitor()->visit();
        $marquee_text = MarqueeText::where('page_name','may_task')->first();
        $post_submits = PostSubmit::where('user_id',Auth::user()->id)->with('post')->orderBy('created_at', 'desc')->Paginate(10);
        return view('frontend.auth.user.my-task', compact('post_submits', 'marquee_text'));
    }

    public function showAcceptedTask()
    {
        visitor()->visit();
        $marquee_text = MarqueeText::where('page_name','accepted_task')->first();
        $accepted_tasks = PostSubmit::where('user_id',Auth::user()->id)->where('status', '1')->with('post')->Paginate(10);
        return view('frontend.auth.user.accepted-task', compact('accepted_tasks', 'marquee_text'));
    }

    public function showJobDetails($id)
    {
        visitor()->visit();
        if(Auth::user()->status==1){
            $postDetail = Post::with('specificTasks', 'jobSubmit')->where('user_id','!=', Auth::user()->id)->find($id);
            $is_reported = UserReport::where('reporter_id', Auth::user()->id)->where('user_id', $postDetail->user_id)
            ->where('posted_job_id', $id)->count();
            if($postDetail){
                $isPostSubmit = PostSubmit::where('user_id', auth()->user()->id)->where('status', '!=' ,'2')
                ->orderBy('created_at','desc')->where('post_id', $postDetail->id)->first();
                $totalPostSubmit = PostSubmit::where('post_id', $postDetail->id)->where('status','!=','2')->get()->count();
                return view('frontend.auth.user.job.job-details', compact('postDetail', 'isPostSubmit', 'totalPostSubmit', 'is_reported'));
            }
            else{
                return redirect()->back()->with('Error','Not Found!!');
            }
        }
        return redirect()->back()->with('danger','You are suspended for certain hours!!');
    }

    public function showJobReport($id)
    {
        visitor()->visit();
        $postReport = Post::with('specificTasks')->find($id);
        return view('frontend.auth.user.job.job-report', compact('postReport'));
    }

    public function showJobPosterReport($id)
    {
        visitor()->visit();
        $userReport = Post::with('specificTasks','user')->find($id);
        return view('frontend.auth.user.job.job-poster-report', compact('userReport'));
    }

    public function showFreelancerJobReport($id)
    {
        visitor()->visit();
        $job_details = PostSubmit::where('id', $id)->with('post','user')->first();
        //dd($job_details);
        return view('frontend.auth.user.user-report', compact('job_details'));
    }

    public function storeFreelancerJobReport (Request $request)
    {
        $auth_user = Auth::user();
        if($auth_user){
            // $is_reported = UserReport::where('reporter_id', $auth_user->id)->where('user_id', $request->user_id)
            // ->where('submitted_job_id', $request->submitted_job_id)->first();
            $job_details = PostSubmit::where('id', $request->submitted_job_id)->first();
            if($job_details->is_reported==false){
                $user_report = new UserReport();
                $user_report->reporter_id = $auth_user->id;
                $user_report->user_id = $request->user_id;
                $user_report->report_type = 1;
                $user_report->submitted_job_id = $request->submitted_job_id;
                $user_report->message = $request->message;
                if($user_report->save()){
                    $user = User::find($request->user_id);
                    $user->job_submit_report = $user->job_submit_report+1;
                    $user->save();
                    $job_details->is_reported = true;
                    $job_details->save();
                    return redirect('/submitted/job/pending')->with('success', 'Report is submitted successfully!');
                }
                else{
                    return redirect('/submitted/job/pending')->with('error', 'Technical error!!');
                }

                //Automatic block if report count is 5..
                // if($user_report->save()){
                //     $report_count = UserReport::where('user_id',$request->user_id)->count();
                //     if($report_count>=5){
                //         $user = User::find($request->user_id);
                //         $user->status = false;
                //         $user->save();
                //         return redirect('/submitted/job/pending')->with('success', 'Report submitted successfully!');
                //     }
                //     else{
                //         return redirect('/submitted/job/pending')->with('success', 'Report submitted successfully!');
                //     }
                // }
                // else{
                //     return redirect('/submitted/job/pending')->with('error', 'Technical error!!');
                // }
                //Automatic block if report count is 5..
            }
            else{
                return redirect()->back()->with('error', 'Already reported!!');
            }
        }
        else{
            return redirect('/login');
        }

    }

    public function storeJobPosterReport(Request $request)
    {
        $auth_user = Auth::user();
        if($auth_user){
            $is_reported = UserReport::where('reporter_id', $auth_user->id)->where('user_id', $request->user_id)
            ->where('posted_job_id', $request->posted_job_id)->first();
            if(!$is_reported){
                $user_report = new UserReport();
                $user_report->reporter_id = $auth_user->id;
                $user_report->user_id = $request->user_id;
                $user_report->report_type = 0;
                $user_report->posted_job_id = $request->posted_job_id;
                $user_report->message = $request->message;
                if($user_report->save()){
                    $user = User::find($request->user_id);
                    $user->job_post_report = $user->job_post_report+1;
                    $user->save();
                    return redirect('/dashboard')->with('success', 'Report is submitted successfully!');
                }
                else{
                    return redirect('/dashboard')->with('error', 'Technical error!!');
                }
            }
            else{
                return redirect()->back()->with('error', 'Already reported!!');
            }
        }
        else{
            return redirect('/login');
        }
    }

    public function submitJobReport(Request $request, $id)
    {
        $this->validate($request, [
            'message' => 'required'
        ]);

        $submitReport = new JobReport();
        $submitReport->user_id = auth()->user()->id;
        $submitReport->post_id = $id;
        $submitReport->message = $request->message;
        $submitReport->save();
        visitor()->visit();
        return redirect()->back()->with('success', 'Post report has been submitted');
    }

    public function postSubmit(Request $request, $id)
    {
        $this->validate($request, [
            'work_prove' => 'required',
            'images' => 'required',
        ]);

        if($request->hasfile('images'))
         {
            foreach($request->file('images') as $file)
            {
                $name = mt_rand(10000, 99999).'.'.$file->extension();
                $file->move('post/', $name);
                $data[] = $name;
            }
         }
         //Get Job Post with ID for job owner...
         $job_post = Post::find($id);
         $job_owner = User::find($job_post->user_id);
         //Get Job Post with ID for job owner...

         $submitPost = new PostSubmit();
         $submitPost->job_owner_id = $job_owner->id;
         $submitPost->user_id = auth()->user()->id;
         $submitPost->post_id = $id;
         $submitPost->work_prove = $request->work_prove;
         $submitPost->images = json_encode($data);
         $submitPost->save();
        visitor()->visit();
         return redirect()->back()->with('success', 'Post has been submitted');
    }

    public function showMyPost()
    {
        visitor()->visit();
        $posts = Post::with('category')->orderBy('created_at', 'desc')->where('user_id', auth()->user()->id)->get();
        return view('frontend.auth.user.my-post', compact('posts'));
    }

    public function showAddWorker($id)
    {
        return view('frontend.auth.user.add-worker');
    }

    public function postEdit($id)
    {
        $post = Post::find($id);
        $categories = Category::select(['id', 'name', 'status', 'price'])->orderBy('created_at', 'desc')->where('status', 1)->get();
        return view('frontend.auth.user.job.edit-post-job', compact('categories', 'post'));
    }

    public function postDelete($id)
    {
        $postDelete = Post::find($id);
        $postDelete->delete();
        visitor()->visit();
        return redirect()->back()->with('success', 'Post has been deleted');
    }

    public function showSubmittedPendingJob()
    {
        visitor()->visit();
        $submitted_jobs = PostSubmit::where('job_owner_id', Auth::user()->id)->where('status','0')->with('user','post')->orderBy('created_at', 'desc')->Paginate(10);
        return view('frontend.auth.user.submitted-job', compact('submitted_jobs'));
    }

    public function showSubmittedApprovedJob ()
    {
        visitor()->visit();
        $submitted_jobs = PostSubmit::where('job_owner_id', Auth::user()->id)->where('status','1')->with('user','post')->orderBy('created_at', 'desc')->Paginate(10);
        return view('frontend.auth.user.submitted-job', compact('submitted_jobs'));
    }

    public function showSubmittedRejectedJob ()
    {
        visitor()->visit();
        $submitted_jobs = PostSubmit::where('job_owner_id', Auth::user()->id)->where('status','2')->with('user','post')->orderBy('created_at', 'desc')->Paginate(10);
        return view('frontend.auth.user.submitted-job', compact('submitted_jobs'));
    }

    public function showSubmittedJobDetails ($id)
    {
        visitor()->visit();
        $submitted_job = PostSubmit::where('job_owner_id', Auth::user()->id)->where('id', $id)->with('user', 'post')->first();
        return view ('frontend.auth.user.submitted-job-details', compact('submitted_job'));
    }

    public function submittedJobApprove ($id)
    {

        if(Auth::check()){
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
        else{
            return redirect('/login');
        }
    }

    public function submittedJobReject ($id)
    {
        if(Auth::check()){
            $submitted_job = PostSubmit::where('id',$id)->with('post')->first();

            if($submitted_job->status != '1'){
                if($submitted_job->status != '2'){
                    $submitted_job->status = '2';
                    $submitted_job->save();
                    return redirect()->back()->with('Success','Rejected Successfully!');
                }

                else{
                    return redirect()->back()->with('Error','Already Rejected!');
                }
            }
            else{
                return redirect()->back()->with('Error','Already Approved!');
            }

        }
        else{
            return redirect('/login');
        }
    }

    public function nidNotificationSeen ($id)
    {
        $notification = Notification::find($id);
        $notification->is_seen = true;

        if($notification->save()){
            return view('frontend.notification.nid-notification-details',compact('notification'));
        }
        else{
            return redirect()->back();
        }

    }

    public function depositNotificationSeen ($id)
    {
        $notification = Notification::find($id);
        $notification->is_seen = true;

        if($notification->save()){
            $deposit = Deposit::find($notification->notifiable_id);
            return view('frontend.notification.deposit-notification-details',compact('deposit'));
        }
        else{
            return redirect()->back();
        }
    }

    public function withdrawNotificationSeen ($id)
    {
        $notification = Notification::find($id);
        $notification->is_seen = true;

        if($notification->save()){
            $withdraw = Withdraw::find($notification->notifiable_id);
            return view('frontend.notification.withdraw-notification-details',compact('withdraw'));
        }
        else{
            return redirect()->back();
        }
    }

    public function tipNotificationSeen ($id)
    {
        $notification = Notification::find($id);
        $notification->is_seen = true;

        if($notification->save()){
            return view('frontend.notification.tip-notification-details',compact('notification'));
        }
        else{
            return redirect()->back();
        }
    }

    public function userProfileUpdate()
    {
        if(Auth::check()){
            visitor()->visit();
            $auth_user = Auth::user();
            return view('frontend.auth.user.profile', compact('auth_user'));
        }

        else{
            return redirect('/login');
        }
    }

    public function storeProfileUpdate (Request $request, $id)
    {
        $user = User::find($id);
        if($request->hasFile('avatar')){
            if(file_exists(public_path('user/'.$user->avatar))){
                File::delete(public_path('user/'.$user->avatar));
                $name = time() . '.' . $request->avatar->getClientOriginalExtension();
                $request->avatar->move('user/', $name);
                $user->avatar = $name;
            }
            else{
                $name = time() . '.' . $request->avatar->getClientOriginalExtension();
                $request->avatar->move('user/', $name);
                $user->avatar = $name;
            }

        }
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->name = $request->name;

        $user->save();
        return redirect()->back()->with('success', 'Updated Successfully!');
    }

    public function storePasswordUpdate (Request $request, $id)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required',
            'password_confirmation' => 'required',

        ]);
        $user = User::find($id);
        if(isset($request->new_password)){
            if (password_verify($request->old_password, $user->password)){
                if($request->new_password==$request->password_confirmation){
                    $user->password=bcrypt($request->new_password);
                    $user->update();
                    return redirect()->back()->with('success', 'Updated Successfully');
                }
                else{
                    return redirect()->back()->with('error', 'Confirm Password is not Matched!!');
                }
            }
            else{
                return redirect()->back()->with('error', 'Old Password does not Match!!');
            }
        }
    }
}
