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
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
        $categories = Category::select(['id', 'name', 'status', 'price'])->orderBy('created_at', 'desc')->where('status', 1)->get();
        return view('user.dashboard', compact('categories'));
    }

    public function showPostJob()
    {
        $categories = Category::select(['id', 'name', 'status', 'price', 'worker_earning'])->orderBy('created_at', 'desc')->where('status', 1)->get();
        return view('frontend.auth.user.job.post-job', compact('categories'));
    }

    public function showAccountVarify()
    {
        if(Auth::check()){
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

    public function showMyTask()
    {
        $marquee_text = MarqueeText::where('page_name','may_task')->first();
        $post_submits = PostSubmit::where('user_id',Auth::user()->id)->with('post')->Paginate(10);
        return view('frontend.auth.user.my-task', compact('post_submits', 'marquee_text'));
    }

    public function showAcceptedTask()
    {
        $marquee_text = MarqueeText::where('page_name','accepted_task')->first();
        $accepted_tasks = PostSubmit::where('user_id',Auth::user()->id)->where('status', '1')->with('post')->Paginate(10);
        return view('frontend.auth.user.accepted-task', compact('accepted_tasks', 'marquee_text'));
    }

    public function showJobDetails($id)
    {
        if(Auth::user()->status==1){
            $postDetail = Post::with('specificTasks', 'jobSubmit')->where('user_id','!=', Auth::user()->id)->find($id);
            if($postDetail){
                $isPostSubmit = PostSubmit::where('user_id', auth()->user()->id)->where('status','0')->orWhere('status','1')
                ->orderBy('created_at','desc')->where('post_id', $postDetail->id)->first();
                $totalPostSubmit = PostSubmit::where('post_id', $postDetail->id)->where('status','!=','2')->get()->count();
                return view('frontend.auth.user.job.job-details', compact('postDetail', 'isPostSubmit', 'totalPostSubmit'));
            }
            else{
                return redirect()->back()->with('Error','Not Found!!');
            }
        }
        return redirect()->back()->with('danger','You are suspended for certain hours!!');
    }

    public function showJobReport($id)
    {
        $postReport = Post::with('specificTasks')->find($id);
        return view('frontend.auth.user.job.job-report', compact('postReport'));
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

         return redirect()->back()->with('success', 'Post has been submitted');
    }

    public function showMyPost()
    {
        $posts = Post::with('category')->orderBy('created_at', 'desc')->where('user_id', auth()->user()->id)->get();
        return view('frontend.auth.user.my-post', compact('posts'));
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
        return redirect()->back()->with('success', 'Post has been deleted');
    }

    public function showSubmittedJob()
    {
        $submitted_jobs = PostSubmit::where('job_owner_id', Auth::user()->id)->with('user','post')->Paginate(10);
        return view('frontend.auth.user.submitted-job', compact('submitted_jobs'));
    }

    public function showSubmittedJobDetails ($id)
    {
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
}
