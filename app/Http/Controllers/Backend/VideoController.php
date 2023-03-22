<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Models\Video;
use Hash;
use Illuminate\Http\Request;
use Session;
use Str;

class VideoController extends Controller
{
	public function index(){
		return view('backend.video.index');
	}
	public function create(){
		return view('backend.video.create');
	}
	public function store(Request $request){
		// return $request->all();

		$video = new Video;

		$video->title = $request->title;
		$video->video_link = $request->video_link;

		$video->save();

		return redirect('admin/video/index')->with('Success', 'Video added successfully');
	}
	public function edit($id){
		$video = Video::find($id);

		if (!$video) {			
			return redirect()->back()->with('Error', 'Data not found');
		}

		return view('backend.video.edit', compact('video'));
	}
	public function update(Request $request, $id){
		$video = Video::find($id);

		if (!$video) {			
			return redirect()->back()->with('Error', 'Data not found');
		}

		$video->title = $request->title;
		$video->video_link = $request->video_link;

		$video->save();

		return redirect('admin/video/index')->with('Success', 'Video updated successfully');
	}
	public function delete(Request $request, $id){
		$video = Video::find($id);

		if (!$video) {			
			return redirect()->back()->with('Error', 'Data not found');
		}

		$video->delete();

		return redirect('admin/video/index')->with('Success', 'Video deleted successfully');
	}
}