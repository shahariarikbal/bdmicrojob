<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TermCondition;

class TermConditionController extends Controller
{
    public function showTermCondition ()
    {
        $term_conditions = TermCondition::all();
        return view ('backend.term_condition.show-term-condition', compact('term_conditions'));
    }

    public function createTermCondition ()
    {
        return view('backend.term_condition.create-term-condition');
    }

    public function storeTermCondition (Request $request)
    {
        $term_condition = new TermCondition();
        $term_condition->title = $request->title;
        $term_condition->description = $request->description;

        $term_condition->save();
        return redirect('/admin/term-condition')->with('success', 'Created successfully!');
    }

    public function editTermCondition ($id)
    {
        $term_condition = TermCondition::find($id);
        return view('backend.term_condition.edit-term-condition', compact('term_condition'));
    }

    public function updateTermCondition (Request $request, $id)
    {
        $term_condition = TermCondition::find($id);
        $term_condition->title = $request->title;
        $term_condition->description = $request->description;

        $term_condition->save();
        return redirect('/admin/term-condition')->with('success', 'Updated successfully!');
    }

    public function deleteTermCondition ($id)
    {
        $term_condition = TermCondition::find($id);
        $term_condition->delete();
        return redirect('/admin/term-condition')->with('success', 'Deleted successfully!');
    }
}
