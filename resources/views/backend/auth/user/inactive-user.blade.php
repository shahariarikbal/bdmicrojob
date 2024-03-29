@extends('backend.master')

@section('title')
    Inactive User list
@endsection

@push('page-css')
    {{-- expr --}}
@endpush


@section('content')
    <div class="container-fluid pb-0">
        <div class="card">
            <div class="card-header">
                <div class="row">
            		<div class="col-md-6">
                		<h2>Inactive User list</h2>
            		</div>
                    <div class="col-md-6 text-right">
                        <a href="{{ url('/admin/users') }}" class="btn btn-primary">Back</a>
                    </div>
            	</div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive-scroll">
                        <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">InActivation Time</th>
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
                                <td>{{ $user->updated_at }}</td>
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
    </div>
@endsection
