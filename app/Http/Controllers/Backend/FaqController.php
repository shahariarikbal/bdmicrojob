<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function faqs()
    {
        $page = 'index';
        $data = Faq::orderBy('id', 'desc')->paginate(30);
        return view('backend.faq.faq', compact('page', 'data'));
    }

    public function createFaq()
    {
        $page = 'create';
        $data = '';
        return view('backend.faq.faq', compact('page', 'data'));
    }
    public function faqEdit(Faq $faq)
    {
        $page = 'edit';
        $data = '';
        return view('backend.faq.faq', compact('page', 'data', 'faq'));
    }

    public function faqStore(Request $request)
    {
        $faq = $request->all();
        Faq::create($faq);
        return redirect()->back()->with('success', 'Faq has been created');
    }
    public function faqPost(Request $request, Faq $faq)
    {
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        return redirect()->back()->with('success', 'Faq has been update');
    }

    public function faqDelete(Faq $faq)
    {
        $faq->delete();
        return redirect()->back()->with('success', 'Faq has been deleted');
    }
}
