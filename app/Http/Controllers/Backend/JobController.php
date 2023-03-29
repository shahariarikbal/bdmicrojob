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
        return view ('backend.job.show-jobs');
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
}
