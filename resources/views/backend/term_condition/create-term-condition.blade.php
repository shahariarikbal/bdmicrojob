@extends('backend.master')

@section('title')
    Create Term & Condition
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
                		<h4>Add Term & Condition</h4>
            		</div>
                    <div class="col-md-6 text-right">
                        <a href="{{ url('/admin/term-condition') }}" class="btn btn-primary">Back</a>
                    </div>
            	</div>

            </div>
            <div class="card-body">
                <div class="col-md-12">
                	<form action="{{ url('admin/store/term-condition') }}" method="post" enctype="multipart/form-data">
                		@csrf

                		<div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" value="{{old('title')}}" placeholder="Enter title" class="form-control" required>
                            @if ($errors->has('title'))
                            <div class="text-danger">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="your_summernote" class="form-control" placeholder="Enter description"
                                    rows="5" required></textarea>
                            @if ($errors->has('description'))
                            <div class="text-danger">{{ $errors->first('description') }}</div>
                            @endif
                        </div>
                		<button type="submit" class="btn btn-success mt-3">Submit</button>
                	</form>
                </div>
            </div>
        </div>
    </div>
@endsection
