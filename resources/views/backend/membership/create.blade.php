@extends('backend.master')

@section('title')
    Membership list
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
                		<h2>Membership add</h2>            			
            		</div>
                    {{-- <div class="col-md-6 text-right">
                        <a href="{{ url('/admin/users') }}" class="btn btn-primary">Back</a>
                    </div> --}}
            	</div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                	<form action="{{ url('admin/membership/store') }}" method="post" enctype="multipart/form-data">
                		@csrf
                        
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" name="name" value="" required class="form-control" placeholder="Enter name">

                            @if ($errors->has('name'))
                                <div class="text-danger">{{ $errors->first('name')}}</div>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="per_month_charge">per month charge</label>
                            <input type="number" name="per_month_charge" value="" required class="form-control" placeholder="Enter per month charge">

                            @if ($errors->has('per_month_charge'))
                                <div class="text-danger">{{ $errors->first('per_month_charge')}}</div>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="facilities">facilities 1</label>
                            <input type="text" name="facilities[]" value="" required class="form-control" placeholder="Enter facilities">

                            @if ($errors->has('facilities'))
                                <div class="text-danger">{{ $errors->first('facilities')}}</div>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="facilities">facilities 2</label>
                            <input type="text" name="facilities[]" value="" class="form-control" placeholder="Enter facilities">

                            @if ($errors->has('facilities'))
                                <div class="text-danger">{{ $errors->first('facilities')}}</div>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="facilities">facilities 3</label>
                            <input type="text" name="facilities[]" value="" class="form-control" placeholder="Enter facilities">

                            @if ($errors->has('facilities'))
                                <div class="text-danger">{{ $errors->first('facilities')}}</div>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="facilities">facilities 4</label>
                            <input type="text" name="facilities[]" value="" class="form-control" placeholder="Enter facilities">

                            @if ($errors->has('facilities'))
                                <div class="text-danger">{{ $errors->first('facilities')}}</div>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="facilities">facilities 5</label>
                            <input type="text" name="facilities[]" value="" class="form-control" placeholder="Enter facilities">

                            @if ($errors->has('facilities'))
                                <div class="text-danger">{{ $errors->first('facilities')}}</div>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="facilities">facilities 6</label>
                            <input type="text" name="facilities[]" value="" class="form-control" placeholder="Enter facilities">

                            @if ($errors->has('facilities'))
                                <div class="text-danger">{{ $errors->first('facilities')}}</div>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="per_video_cost">per video cost</label>
                            <input type="number" name="per_video_cost" value="" required class="form-control" placeholder="Enter per video cost">

                            @if ($errors->has('per_video_cost'))
                                <div class="text-danger">{{ $errors->first('per_video_cost')}}</div>
                            @endif
                        </div>

                		<button type="submit" class="btn btn-success mt-3">Submit</button>
                	</form>
                </div>
            </div>
        </div>
    </div>
@endsection
