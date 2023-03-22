<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Models\Membership;
use Hash;
use Illuminate\Http\Request;
use Session;
use Str;

class MembershipController extends Controller
{
	public function index(){
		return view('backend.membership.index');
	}
	public function create(){
		return view('backend.membership.create');
	}
	public function store(Request $request){
		// return $request->all();

		$membership = new Membership;

		$membership->name = $request->name;
		$membership->facilities = json_encode($request->facilities);
		$membership->per_month_charge = $request->per_month_charge;
		$membership->per_video_cost = $request->per_video_cost;
		$membership->status = 1;

		$membership->save();

		return redirect('admin/membership/index')->with('Success', 'Membership added successfully');
	}
	public function edit($id){
		$membership = Membership::find($id);

		if (!$membership) {			
			return redirect()->back()->with('Error', 'Data not found');
		}

		return view('backend.membership.edit', compact('membership'));
	}
	public function update(Request $request, $id){
		$membership = Membership::find($id);

		if (!$membership) {			
			return redirect()->back()->with('Error', 'Data not found');
		}

		$membership->name = $request->name;
		$membership->facilities = json_encode($request->facilities);
		$membership->per_month_charge = $request->per_month_charge;
		$membership->per_video_cost = $request->per_video_cost;
		$membership->status = 1;

		$membership->save();

		return redirect('admin/membership/index')->with('Success', 'Membership updated successfully');
	}
	public function delete(Request $request, $id){
		$membership = Membership::find($id);

		if (!$membership) {			
			return redirect()->back()->with('Error', 'Data not found');
		}

		$membership->delete();

		return redirect('admin/membership/index')->with('Success', 'Membership deleted successfully');
	}
}