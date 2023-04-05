@extends('backend.master')

@section('title')
    Edit Marquee Text
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
                		<h2>Edit Marquee Text</h2>
            		</div>
            	</div>

            </div>
            <div class="card-body">
                <div class="col-md-12">
                	<form action="{{ url('admin/update/marque-text/'.$marquee_text->id) }}" method="post" enctype="multipart/form-data">
                		@csrf
                        <div class="form-group">
                            <label for="page_name">Page Name</label>
                            <input type="text" name="page_name" value="{{ $marquee_text->page_name }}" placeholder="Enter page_name" class="form-control" readonly>
                            @if ($errors->has('page_name'))
                            <div class="text-danger">{{ $errors->first('page_name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="marquee_text">Marquee Text</label>
                            <textarea name="marquee_text" id="" class="form-control" placeholder="Enter marquee text"
                                    rows="5" required>{{ $marquee_text->marquee_text }}</textarea>
                            @if ($errors->has('marquee_text'))
                            <div class="text-danger">{{ $errors->first('marquee_text') }}</div>
                            @endif
                        </div>
                		<button type="submit" class="btn btn-success mt-3">Submit</button>
                	</form>
                </div>
            </div>
        </div>
    </div>
@endsection
