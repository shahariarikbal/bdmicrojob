@extends('frontend.auth.master')

@section('title')
	User Profile
@endsection

@push('page-css')
    <style>
        .error{
            color:red;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid pb-0">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h2>Basic information</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/user/profile/update/'.$user->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label for="name">Name</label>
                                  <input type="text" class="form-control" id="name" name="name" value="{{ $user->name ?? '' }}" placeholder="Enter name">
                                  @if($errors->has('name'))
                                    <div class="error">{{ $errors->first('name') }}</div>
                                  @endif
                                </div>
                                <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="email" class="form-control" id="email" name="email" value="{{ $user->email ?? '' }}" aria-describedby="emailHelp" placeholder="Enter email">
                                  @if($errors->has('email'))
                                    <div class="error">{{ $errors->first('email') }}</div>
                                  @endif
                                </div>
                                <div class="form-group">
                                  <label for="phone">Phone</label>
                                  <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone ?? '' }}" placeholder="Enter your phone number">
                                  @if($errors->has('phone'))
                                    <div class="error">{{ $errors->first('phone') }}</div>
                                  @endif
                                </div>
                                <div class="form-group">
                                    <label for="avatar">Avatar</label>
                                    <input type="file" class="form-control" id="avatar" name="avatar"/>
                                    <img src="{{ asset('users/'.$user->avatar) }}" height="80" width="80" />
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h2>Password change</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/user/password/update/'.$user->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label for="old_password">Old password</label>
                                  <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter old password" />
                                  @if($errors->has('old_password'))
                                    <div class="error">{{ $errors->first('old_password') }}</div>
                                  @endif
                                </div>
                                <div class="form-group">
                                  <label for="new_password">New password</label>
                                  <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new password" />
                                  @if($errors->has('new_password'))
                                    <div class="error">{{ $errors->first('new_password') }}</div>
                                  @endif
                                </div>
                                <div class="form-group">
                                  <label for="password_confirmation">Confirmation password</label>
                                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter your confirm password" />
                                  @if($errors->has('password_confirmation'))
                                    <div class="error">{{ $errors->first('password_confirmation') }}</div>
                                  @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')

@endpush
