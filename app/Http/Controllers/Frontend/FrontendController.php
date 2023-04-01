<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\HomePage;
use App\Models\Post;

class FrontendController extends Controller
{
    public function index()
    {
        $job_posts = Post::where('is_approved', 1)->with('user','category')->orderBy('created_at', 'desc')->Paginate(5);
        $homepage = HomePage::first();
        return view('frontend.home.index', compact('homepage', 'job_posts'));
    }

    public function aboutUs(){
        return view('frontend.setting.about-us');
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
        return view('frontend.setting.terms-condition');
    }

    public function showPrivacyPolicy(){
        return view('frontend.setting.privacy-policy');
    }
}
