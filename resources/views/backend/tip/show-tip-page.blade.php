@extends('backend.master')

@section('title')
    Give Tips
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
                		<h2>Give Tips</h2>
            		</div>
                    <div class="col-md-6 text-right">
                        <a href="{{ url('/admin/users') }}" class="btn btn-primary">Back</a>
                    </div>
            	</div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                	<form action="{{ url('admin/tip/store/'.$user->id) }}" method="post">
                		@csrf

                		<div class="form-group">
                            <label for="user_name">User Name</label>
                            <input type="text" name="user_name" value="{{$user->name}}" class="form-control" readonly>
                            @if ($errors->has('user_name'))
                            <div class="text-danger">{{ $errors->first('user_name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="user_email">User Email</label>
                            <input type="email" name="user_email" value="{{$user->email}}" class="form-control" readonly>
                            @if ($errors->has('user_email'))
                            <div class="text-danger">{{ $errors->first('user_email') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tips_type">Tips Type</label>
                            <select name="tips_type" value="{{ old('tips_type') }}" class="deposit-form-input form-control">
                                <option selected disabled>-- Select Tips Type --</option>
                                <option value="earning">Earning</option>
                                <option value="deposit">Deposit</option>
                            </select>
                            @if ($errors->has('tips_type'))
                            <div class="text-danger">{{ $errors->first('tips_type') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tips_amount">Tips Amount</label>
                            <input type="text" name="tips_amount" value="{{ old('tips_amount') }}" class="form-control">
                            @if ($errors->has('tips_amount'))
                            <div class="text-danger">{{ $errors->first('tips_amount') }}</div>
                            @endif
                        </div>
                		<button type="submit" class="btn btn-success mt-3">Submit</button>
                	</form>
                </div>
            </div>
        </div>
    </div>
@endsection
