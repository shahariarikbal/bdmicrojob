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
                <h2>Members list</h2>
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
                                    <img src="{{ asset('users/'.$user->avatar) }}" height="30" width="30" style="border-radius: 50%"/>{{ $user->name }}
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
                </div>
            </div>
        </div>
    </div>
@endsection
