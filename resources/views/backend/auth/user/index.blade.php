@extends('backend.master')

@section('title')
    User list
@endsection

@push('page-css')
    {{-- expr --}}
@endpush


@section('content')
    <div class="container-fluid pb-0">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                        <h4>Members list</h4>
                    </div>
                    <div class="col-md-8">
                        <form action="{{ url('/admin/users') }}" method="get">
                            <div class="row">
                                <div class="col-md-7">
                                    <input type="email" name="email" class="form-control" placeholder="Email" style="height: 40px;margin-bottom: 10px;">
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <button type="submit" class="input-group-text text-white btn btn-primary" style="margin-right: 5px">Search</button>
                                        <a href="{{ url('/admin/users') }}" class="input-group-text text-white btn btn-danger">Clear</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="col-md-6 text-right">
                        <a href="{{ url('/admin/dashboard') }}" class="btn btn-primary">Back</a>
                    </div>  --}}
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th>{{ $loop->index+1 }}</th>
                                <td>
                                    @if ($user->avatar != null)
                                    <img src="{{ asset('user/'.$user->avatar) }}" height="30" width="30" style="border-radius: 50%"/>
                                    @else
                                    <img src="{{ asset('backend/img/user-avater.png') }}" height="30" width="30" style="border-radius: 50%"/>
                                    @endif{{ $user->name }}
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    @if($user->status == 1)
                                        <a href="{{ url('/admin/active/'.$user->id) }}" class="btn btn-sm btn-success">Active</a>
                                    @else
                                        <a href="{{ url('/admin/inactive/'.$user->id) }}" class="btn btn-sm btn-warning">Inactive</a>
                                    @endif
                                    <a href="{{ url('/admin/tip/'.$user->id) }}" class="btn btn-sm btn-danger">Tips</a>
                                    {{--  <a href="{{ url('/admin/delete/'.$user->id) }}" class="btn btn-sm btn-danger">Delete</a>  --}}
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                      {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
