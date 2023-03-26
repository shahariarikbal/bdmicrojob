<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.home.index');
    }

    public function aboutUs(){
        return view('frontend.setting.about-us');
    }

    public function contactUs(){
        return view('frontend.setting.contact-us');
    }

    public function showFaq(){
        return view('frontend.setting.faq');
    }

    public function showTermsConditions(){
        return view('frontend.setting.terms-condition');
    }

    public function showPrivacyPolicy(){
        return view('frontend.setting.privacy-policy');
    }
}
