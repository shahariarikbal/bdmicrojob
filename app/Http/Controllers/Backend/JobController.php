<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Deposit;
use App\Models\Post;
use App\Models\SpecificTask;
use App\Models\User;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function showJob ()
    {
        visitor()->visit();
        $job_posts = Post::with('user', 'category')->orderBy('created_at', 'desc')->Paginate(10);
        return view ('backend.job.show-jobs', compact('job_posts'));
    }

    public function showPendingJob ()
    {
        visitor()->visit();
        $pending_job_posts = Post::with('user')->where('is_approved', 0)->orderBy('created_at', 'desc')->Paginate(10);
        return view ('backend.job.show-pending-jobs', compact('pending_job_posts'));
    }

    public function showJobDetails ($id)
    {
        visitor()->visit();
        $job_post = Post::with('user','category')->where('id', $id)->first();
        return view ('backend.job.show-job-details', compact('job_post'));
    }

    public function postStore(PostRequest $request)
    {
        $deposit = User::where('id', auth()->user()->id)->first();
        if(empty($deposit)){
            return redirect()->back()->with('info', 'Please deposit your account balance first');
        }

        $imageName = time() .'.'.$request->avatar->extension();
        $image = $request->avatar->move('thumbnail', $imageName);

        $post = new Post();
        $post->cat_id = $request->cat_id;
        $post->user_id = auth()->user()->id;
        $post->title = $request->title;
        $post->required_task = $request->required_task;
        $post->avatar = $imageName;
        $post->worker_number = $request->worker_number;
        // $post->worker_earn = $request->worker_earn;
        $post->required_screenshot = $request->required_screenshot;
        // $post->estimated_date = $request->estimated_date;

        $category = Category::where('id', $post->cat_id)->first();
        // $postPriceEarnPrice = $category->price + $request->total_cost;
        $per_worker_earn = $category->worker_earning;
        $admin_commission = $category->price;
        $job_cost = $request->worker_number * $category->worker_earning;
        $job_commission = (($category->price * $job_cost)/100);
        $postPriceEarnPrice = $job_cost + $job_commission;
        $userDeposit = User::where('id', auth()->user()->id)->first();

        if($userDeposit->total_deposit < $postPriceEarnPrice){
            // return redirect()->back()->with('error', 'Insufficient balance');
            return view ('frontend.auth.user.job.job-post-failed', compact('job_cost', 'job_commission', 'postPriceEarnPrice', 'per_worker_earn', 'admin_commission'));
        }
        if($deposit->total_deposit == 0){
            return redirect()->back()->with('info', 'Please deposit your account balance first');
        }else{
            $post->save();
        }

        //Balance Debit from deposit amount
        if ($post->save()){
            // $category = Category::where('id', $post->cat_id)->first();
            // $postPriceEarnPrice = $category->price + $request->total_cost;
            // $userDeposit = User::where('id', auth()->user()->id)->first();

            // if($userDeposit->total_deposit < $postPriceEarnPrice){
            //     return redirect()->back()->with('info', 'Insufficient balance');
            // }

            // $userDeposit->total_deposit = ($userDeposit->total_deposit - $category->price) - $request->total_cost;
            $userDeposit->total_deposit = ($userDeposit->total_deposit - $postPriceEarnPrice);
            $userDeposit->save();
        }

        //Data save specific task in another table
        if ($post->save()){
            foreach($request->specific_task as $k => $task){
                $specificTask = new SpecificTask();
                $specificTask->post_id = $post->id;
                $specificTask->specific_task = $request->specific_task[$k];
                $specificTask->save();
            }
            return view ('frontend.auth.user.job.job-post-success', compact('job_cost', 'job_commission', 'postPriceEarnPrice', 'per_worker_earn', 'admin_commission'));
        }

        return redirect()->back()->withSuccess('Your post has been submitted');
    }

    public function approveJob ($id)
    {
        $job_post = Post::find($id);
        if($job_post->is_approved==1 && $job_post->is_approved!=2){
            return redirect()->back()->with('error','Already Approved!');
        }

        elseif($job_post->is_approved==0 && $job_post->is_approved!=2){
            $job_post->is_approved=1;
            $job_post->save();
            return redirect('/admin/pending/jobs')->with('success', 'Job post is approved successfully!!');
        }

        else{
            return redirect()->back()->with('error', 'Already rejected!');
        }
    }

    public function rejectJob ($id)
    {
        $job_post = Post::where('id', $id)->with('category')->first();
        if($job_post->is_approved==1 && $job_post->is_approved!=2){
            return redirect()->back()->with('error','Already Approved!');
        }
        elseif($job_post->is_approved==0 && $job_post->is_approved!=1){
            $job_post->is_approved=2;

            //Return Deposit Money....
            if($job_post->save()){
                $user = User::find($job_post->user_id);

                $job_cost = $job_post->worker_number * $job_post->category->worker_earning;
                $job_commission = (($job_post->category->price * $job_cost)/100);
                $postPriceEarnPrice = $job_cost + $job_commission;
                $user->total_deposit = ($user->total_deposit + $postPriceEarnPrice);
                $user->save();
                return redirect('/admin/pending/jobs')->with('success', 'Job post is rejected successfully!!');
            }
            //Return Deposit Money....
            else{
                return redirect()->back()->with('error', 'Operation failed!!');
            }
        }

        else{
            return redirect()->back()->with('error', 'Already rejected!');
        }
    }
}
