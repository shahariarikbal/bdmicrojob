<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Models\Post;
use App\Models\SpecificTask;
=======
>>>>>>> 6dd5d474db8f6bc609689756f926541030880e95
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function showJob ()
    {
        return view ('backend.job.show-jobs');
    }
<<<<<<< HEAD

    public function postStore(Request $request)
    {
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
            $post->save();

            if ($post->save()){
                $specificTask = new SpecificTask();
                $specificTask->post_id = $post->id;
                $specificTask->specific_task = $request->specific_task;
                $specificTask->save();
            }

            return redirect()->back()->withSuccess('Your post has been submitted');
    }
=======
>>>>>>> 6dd5d474db8f6bc609689756f926541030880e95
}
