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
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-10 m-auto">
                    <form method="GET" action="{{ url('/admin/users') }}" class="gobal-serch-form form-group mb-3">
                        @csrf
                        <div class="row" style="width: 100%">
                            <div class="col-md-5 mb-2">
                                <div class="d-flex align-items-center">
                                    <span class="input-group-text bg-gradient-blues" style="background-color: black; color: white">From</span>
                                    <input type="date" class="form-control" name="from" placeholder="From date" aria-label="Username" style="padding: 18px;">
                                </div>
                            </div>
                            <div class="col-md-5 mb-2">
                                <div class="d-flex align-items-center">
                                    <span class="input-group-text bg-gradient-burning" style="background-color: black; color: white">To</span>
                                    <input type="date" class="form-control" name="to" placeholder="To date" aria-label="Server" style="padding: 18px;">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="d-flex align-items-center">
                                    <button type="submit" class="input-group-text text-white btn btn-primary" style="margin-right: 5px">Search</button>
                                    <a href="{{ url('/admin/users') }}" class="input-group-text text-white btn btn-danger">Clear</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive-scroll">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Total Tips</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($userTips as $user)
                                <tr>
                                    <th>{{ $loop->index+1 }}</th>
                                    <td>
                                        @if ($user[0]->user->avatar != null)
                                            <img src="{{ asset('user/'.$user[0]->user->avatar) }}" height="30" width="30" style="border-radius: 50%"/>
                                        @else
                                            <img src="{{ asset('backend/img/user-avater.png') }}" height="30" width="30" style="border-radius: 50%"/>
                                        @endif{{ $user[0]->user->name }}
                                    </td>
                                    <td>{{ $user[0]->user->email }}</td>
                                    <td>{{ $user[0]->user->phone }}</td>
                                    <td>{{ $user[0]->where('user_id', $user[0]->user->id)->sum('tips_amount') }} Tk.</td>
                                    <td>
                                        @if($user[0]->user->status == 1)
                                            <a href="{{ url('/admin/active/'.$user[0]->user_id) }}" class="btn btn-sm btn-success">Active</a>
                                        @else
                                            <a href="{{ url('/admin/inactive/'.$user[0]->user_id) }}" class="btn btn-sm btn-warning">Inactive</a>
                                        @endif
                                        <a href="{{ url('/admin/tip/'.$user[0]->user_id) }}" class="btn btn-sm btn-danger">Tips</a>
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
    </div>
@endsection
