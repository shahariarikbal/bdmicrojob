@extends('backend.master')

@section('title')
	Admin Profile
@endsection

@push('page-css')
    <style>
        .error{
            color:red;
        }
    </style>
@endpush

@section('content')
    <section class="profile-update-section">
      <div class="container-fluid pb-0">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Password change</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/admin/profile/update/'.$auth_admin->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" value="{{ $auth_admin->email }}" name="email" placeholder="Enter old password" />
                                    @if($errors->has('email'))
                                      <div class="error">{{ $errors->first('email') }}</div>
                                    @endif
                                  </div>
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
  </section>
@endsection

@push('page-scripts')

@endpush
