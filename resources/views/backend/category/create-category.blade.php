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
                		<h2>Add Category</h2>
            		</div>
            	</div>

            </div>
            <div class="card-body">
                <div class="col-md-12">
                	<form action="{{ url('admin/category/store') }}" method="post" enctype="multipart/form-data">
                		@csrf

                		<div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{old('name')}}" placeholder="Enter Category Name" class="form-control">
                            @if ($errors->has('name'))
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="price">Estimated Commission in Percentage (%)</label>
                            <input type="text" name="price" value="{{old('price')}}" placeholder="Enter Estimated Commission" class="form-control">
                            @if ($errors->has('price'))
                            <div class="text-danger">{{ $errors->first('price') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="worker_earning">Each Worker Earning</label>
                            <input type="text" name="worker_earning" value="{{old('worker_earning')}}" placeholder="Enter Estimated Each Worker Earning" class="form-control">
                            @if ($errors->has('worker_earning'))
                            <div class="text-danger">{{ $errors->first('worker_earning') }}</div>
                            @endif
                        </div>
                		<button type="submit" class="btn btn-success mt-3">Submit</button>
                	</form>
                </div>
            </div>
        </div>
    </div>
@endsection
