<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;

class PrivacyPolicyController extends Controller
{
    public function showPrivacyPolicy ()
    {
        visitor()->visit();
        $privacy_policies = PrivacyPolicy::all();
        return view ('backend.privacy_policy.show-privacy-policy', compact('privacy_policies'));
    }

    public function createPrivacyPolicy ()
    {
        visitor()->visit();
        return view('backend.privacy_policy.create-privacy-policy');
    }

    public function storePrivacyPolicy (Request $request)
    {
        $privacy_policy = new PrivacyPolicy();
        $privacy_policy->title = $request->title;
        $privacy_policy->description = $request->description;

        $privacy_policy->save();
        return redirect('/admin/privacy-policy')->with('success', 'Created successfully!');
    }

    public function editPrivacyPolicy ($id)
    {
        visitor()->visit();
        $privacy_policy = PrivacyPolicy::find($id);
        return view('backend.privacy_policy.edit-privacy-policy', compact('privacy_policy'));
    }

    public function updatePrivacyPolicy (Request $request, $id)
    {
        $privacy_policy = PrivacyPolicy::find($id);
        $privacy_policy->title = $request->title;
        $privacy_policy->description = $request->description;

        $privacy_policy->save();
        return redirect('/admin/privacy-policy')->with('success', 'Updated successfully!');
    }

    public function deletePrivacyPolicy ($id)
    {
        $privacy_policy = PrivacyPolicy::find($id);
        $privacy_policy->delete();
        return redirect('/admin/privacy-policy')->with('success', 'Deleted successfully!');
    }
}
