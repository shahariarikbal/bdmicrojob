<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MarqueeText;

class MarqueeController extends Controller
{
    public function showMarqueeText ()
    {
        $marquee_texts = MarqueeText::all();
        return view ('backend.marquee.show-marquee', compact('marquee_texts'));
    }

    public function editMarqueeText ($id)
    {
        $marquee_text = MarqueeText::find($id);
        return view('backend.marquee.edit-marquee', compact('marquee_text'));
    }

    public function updateMarqueeText (Request $request, $id)
    {
        $marquee_text = MarqueeText::find($id);
        $marquee_text->marquee_text = $request->marquee_text;
        $marquee_text->save();
        return redirect('/admin/marque-text')->with('success', 'Updated successfully!');
    }
}
