<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\NidVerificationRequest;
use App\Models\JobReport;
use App\Models\NidVerification;
use App\Models\PostSubmit;
use App\Models\Notification;
use App\Models\Deposit;
use App\Models\Withdraw;
use Auth;

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
        $post_submits = PostSubmit::where('user_id',Auth::user()->id)->with('post')->Paginate(10);
        return view('frontend.auth.user.my-task', compact('post_submits'));
    }

    public function showAcceptedTask()
    {
        return view('frontend.auth.user.accepted-task');
    }

    public function showJobDetails($id)
    {
        $postDetail = Post::with('specificTasks', 'jobSubmit')->find($id);
        $isPostSubmit = PostSubmit::where('user_id', auth()->user()->id)->where('post_id', $postDetail->id)->first();
        $totalPostSubmit = PostSubmit::where('post_id', $postDetail->id)->where('status','1')->get()->count();
        return view('frontend.auth.user.job.job-details', compact('postDetail', 'isPostSubmit', 'totalPostSubmit'));
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
        return view ('frontend.auth.user.submitted-job-details');
    }

    public function submittedJobApprove ($id)
    {

        if(Auth::check()){
            $submitted_job = PostSubmit::where('id',$id)->with('post')->first();

            if($submitted_job->status != '1'){
                $submitted_job->status = '1';
                if($submitted_job->save()){
                    $worker = User::find($submitted_job->user_id);
                    $previous_income=$worker->total_income;
                    $worker->total_income = $previous_income+$submitted_job->post->worker_earn;
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
}
