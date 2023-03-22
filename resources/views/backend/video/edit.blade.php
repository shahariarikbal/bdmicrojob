@extends('backend.master')

@section('title')
    Video list
@endsection

@push('page-css')
    <style>
    	h2,label{
    		text-transform: capitalize;
    	}
    </style>
@endpush


@section('content')
    <div class="container-fluid pb-0">
        <div class="card">
            <div class="card-header">
            	<div class="row">
            		<div class="col-md-6">
                		<h2>Video add</h2>            			
            		</div>
            	</div>

            </div>
            <div class="card-body">
                <div class="col-md-12">
                	<form action="{{ url('admin/video/update', $video->id) }}" method="post" enctype="multipart/form-data">
                		@csrf
                        
                        <div class="form-group">
                            <label for="title">title</label>
                            <input type="text" name="title" value="{{ $video->title }}" required placeholder="enter video link" class="form-control">
                        </div>
                		
                		<div class="form-group">
                			<label for="video_link">video code</label>
                			<input type="text" name="video_link" value="{{ $video->video_link }}" required placeholder="enter video link" class="form-control">
                		</div>

                		<button type="submit" class="btn btn-success mt-3">Submit</button>
                	</form>
                </div>
            </div>
        </div>
    </div>
@endsection
