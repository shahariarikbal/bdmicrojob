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
        //Account Verification Code...
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
        return view('frontend.auth.user.my-task');
    }

    public function showAcceptedTask()
    {
        return view('frontend.auth.user.accepted-task');
    }

    public function showJobDetails($id)
    {
        $postDetail = Post::with('specificTasks', 'jobSubmit')->find($id);
        $isPostSubmit = PostSubmit::where('user_id', auth()->user()->id)->where('post_id', $postDetail->id)->first();
        $totalPostSubmit = PostSubmit::where('post_id', $postDetail->id)->get()->count();
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

         $submitPost = new PostSubmit();
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

    // public function showDeposit()
    // {
    //     return view('frontend.auth.user.deposit');
    // }
}
