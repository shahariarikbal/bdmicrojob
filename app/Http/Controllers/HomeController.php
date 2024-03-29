<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Membership;
use App\Models\Post;
use App\Models\User;
use App\Models\UserVideo;
use App\Models\Video;
use App\Models\Cart;
use App\Models\MarqueeText;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Support\Renderable|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function home()
    {
        return redirect('/dashboard');
    }
    public function dashboard()
    {
        $auth_user = Auth::user();
        // if($auth_user->email_verified_at != null){
            //Add to cart check start....
            $cart_count = Cart::count();
            if($cart_count>0){
                $cart = Cart::first();
                $currentTime = Carbon::now();
                $updatedTime = $cart->updated_at;
                $add_to_cart_hours = $updatedTime->diffInHours($currentTime);
            }
            else{
                $add_to_cart_hours = 0;
            }
            //dd($add_to_cart_hours);
            //Add to cart check end....
            $cart_count = Cart::count();
            $marquee_text = MarqueeText::where('page_name','dashboard')->first();
            $categories = Category::select(['id', 'name', 'status', 'price'])->orderBy('created_at', 'desc')->where('status', 1)->get();
            $sql = Post::with('specificTasks','category')->where('user_id','!=',Auth::user()->id)->where('is_approved', 1)->where('is_paused', 0)->orderBy('created_at', 'desc');
            if(isset(request()->cat_id)){
                $sql->where('cat_id', request()->cat_id)->get();
            }
            $posts = $sql->get();
            return view('frontend.auth.dashboard', compact('categories', 'posts', 'marquee_text', 'cart_count', 'add_to_cart_hours'));
        // }

        // else{
        //     Auth::logout();
        //     return redirect()->back()->with('error','Your email is not verified yet!!');
        // }
    }

    public function membership()
    {
        $memeberships = Membership::orderBy('created_at', 'desc')->get();
        $user = User::with('membership')->where('id', auth()->user()->id)->first();
        return view('frontend.auth.membership.index', compact('memeberships', 'user'));
    }


    public function ads()
    {
        if (!Auth::user()->membership) {
            return redirect()->back()->with('Error', 'Please purchase a membership to watch videos');
        }


        $videos = Video::where('status', 1)
            ->doesntHave("user_videos")
            // ->whereHas('user_videos', function($user_videos) use($brandIds){
            //     $user_videos->where('user_id', '!=', Auth::user()->id);
            // })
            ->inRandomOrder()
            ->limit(8)
            ->get()
            ;

        return view('frontend.auth.ads.ads', compact('videos'));
    }
    public function code()
    {
        $user = User::with('membership')->where('id', auth()->user()->id)->first();
        return view('frontend.auth.code.code', compact('user'));
    }

    public function subscription($id)
    {
        // return $id;
        $user = User::where('id', auth()->user()->id)->first();
        $user->membership_id = $id;
        $user->save();
        session()->flash('Success', 'Your membership subscription has been successfully submited.');
        return redirect()->back();
    }

    public function profileSettings()
    {
        $user = User::where('id', auth()->user()->id)->first();
        return view('frontend.auth.user.profile', compact('user'));
    }

    public function profileUpdate(Request $request, $id)
    {
        $request->validate([
            'email'          => 'required|email|unique:users,email,'.$id,
            'phone'          => 'required|unique:users,phone,'.$id,
            'name'          => 'required',
        ]);

        $user = User::find($id);
        $old_images = $user->avatar;
        if($request->hasFile('avatar')){
            if(file_exists('users/'.$old_images)){
                unlink('users/'.$old_images);
            }
            $avatar = $request->avatar;
            $avatarName = Str::slug($request->name) . time().'_'.'.'. $avatar->extension();
            $avatar->move('users', $avatarName );
            $user->avatar = $avatarName;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->back()->with('Success', 'Profile has been successfully updated.');
    }

    public function passwordUpdate(Request $request, $id)

    {

        $request->validate([
            'old_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'password_confirmation' => ['same:new_password'],

        ]);

        User::find($id)->update(['password'=> Hash::make($request->new_password)]);
        return redirect()->back()->with('Success', 'Password has been successfully updated.');

    }

    public function watched_video(Request $request,$user_id, $video_id){
        // return $user_id . '  ' . $video_id;

        $video = Video::find($video_id);
        $user = User::find($user_id);

        if(!$user || !$video){
            return response()->json([
                'status' => 'error',
                'message' => 'User or video data not found'
            ]);
        }

        $old_user_video = UserVideo::where('video_id', $video->id)->where('user_id', $user->id)->first();

        if($old_user_video == null){

            $user_video = new UserVideo;

            $user_video->user_id = $user->id;
            $user_video->video_id = $video->id;

            $user_video->save();


            // earning add koro
            $user->total_income += $user->membership ? $user->membership->per_video_cost : 0;
            $user->save();

            return response()->json([
                'status' => 'success',
                'message' => "Saved to watchlist. Thanks",
                'total_income' => $user->total_income,
            ]);
        }else{

            return response()->json([
                'status' => 'error',
                'message' => 'You have already watched the video'
            ]);
        }


        // UserVideo
    }

}
