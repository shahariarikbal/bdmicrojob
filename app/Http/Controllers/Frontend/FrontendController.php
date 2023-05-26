<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\HomePage;
use App\Models\Post;
use App\Models\AboutUs;
use App\Models\TermCondition;
use App\Models\PrivacyPolicy;
use App\Models\UserForum;
use DB;

class FrontendController extends Controller
{
    public function index()
    {
        visitor()->visit();
        $job_posts = Post::where('is_approved', 1)->where('is_paused', 0)->with('user','category')->orderBy('created_at', 'desc')->Paginate(5);
        $homepage = HomePage::first();
        $visitorCount = DB::table('shetabit_visits')->count();
        $userCount = User::count();
        return view('frontend.home.index', compact('homepage', 'job_posts', 'visitorCount', 'userCount'));
    }

    public function aboutUs(){
        visitor()->visit();
        $about_us = AboutUs::all();
        return view('frontend.setting.about-us', compact('about_us'));
    }

    public function contactUs(){
        visitor()->visit();
        return view('frontend.setting.contact-us');
    }

    public function contactStore (Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->message = $request->message;

        $contact->save();

        visitor()->visit();
        return redirect()->back()->with('Success',"Message is sent successfully!!");
    }

    public function showFaq(){
        visitor()->visit();
        $faqs = Faq::select(['id', 'question', 'answer'])->orderBy('id', 'desc')->get();
        return view('frontend.setting.faq', compact('faqs'));
    }

    public function showTermsConditions(){
        visitor()->visit();
        $term_conditions = TermCondition::all();
        return view('frontend.setting.terms-condition', compact('term_conditions'));
    }

    public function showPrivacyPolicy(){
        visitor()->visit();
        $privacy_policies = PrivacyPolicy::all();
        return view('frontend.setting.privacy-policy', compact('privacy_policies'));
    }

    public function showForum(){
        $forums = UserForum::orderBy('created_at', 'desc')->with('user')->get();
        return view('frontend.forum.forum', compact('forums'));
    }

    public function showBlog(){
        return view('frontend.blog.blog');
    }

    public function showBlogDetails(){
        return view('frontend.blog.blog-details');
    }
}
