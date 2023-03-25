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
}
