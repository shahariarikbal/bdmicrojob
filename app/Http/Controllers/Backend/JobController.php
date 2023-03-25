<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
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
            return redirect()->back()->with('message', 'Please deposit your account balance first');
        }

        $imageName = time() .'.'.$request->avatar->extension();
        $image = $request->avatar->move('/Thumbnail', $imageName);

        $post = new Post();
        $post->cat_id = $request->cat_id;
        $post->title = $request->title;
        $post->required_task = $request->required_task;
        $post->avatar = $imageName;
        $post->worker_number = $request->worker_number;
        $post->worker_earn = $request->worker_earn;
        $post->required_screenshot = $request->required_screenshot;
        $post->estimated_date = $request->estimated_date;
        if($deposit->total_deposit == 0){
            return redirect()->back()->with('info', 'Please deposit your account balance first');
        }else{
            $post->save();
        }

        if ($post->save()){
            foreach($request->specific_task as $k => $task){
                $specificTask = new SpecificTask();
                $specificTask->post_id = $post->id;
                $specificTask->specific_task = $request->specific_task[$k];
                $specificTask->save();
            }
        }

        return redirect()->back()->withSuccess('Your post has been submitted');
    }
}
