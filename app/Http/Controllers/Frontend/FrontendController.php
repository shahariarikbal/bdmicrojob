<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\HomePage;
use App\Models\Post;
use App\Models\AboutUs;
use App\Models\TermCondition;
use App\Models\PrivacyPolicy;

class FrontendController extends Controller
{
    public function index()
    {
        $job_posts = Post::where('is_approved', 1)->with('user','category')->orderBy('created_at', 'desc')->Paginate(5);
        $homepage = HomePage::first();
        return view('frontend.home.index', compact('homepage', 'job_posts'));
    }

    public function aboutUs(){
        $about_us = AboutUs::all();
        return view('frontend.setting.about-us', compact('about_us'));
    }

    public function contactUs(){
        return view('frontend.setting.contact-us');
    }

    public function contactStore (Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->message = $request->message;

        $contact->save();
        return redirect()->back()->with('Success',"Message is sent successfully!!");
    }

    public function showFaq(){
        $faqs = Faq::select(['id', 'question', 'answer'])->orderBy('id', 'desc')->get();
        return view('frontend.setting.faq', compact('faqs'));
    }

    public function showTermsConditions(){
        $term_conditions = TermCondition::all();
        return view('frontend.setting.terms-condition', compact('term_conditions'));
    }

    public function showPrivacyPolicy(){
        $privacy_policies = PrivacyPolicy::all();
        return view('frontend.setting.privacy-policy', compact('privacy_policies'));
    }
}
