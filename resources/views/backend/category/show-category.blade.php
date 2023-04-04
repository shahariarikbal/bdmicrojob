@extends('backend.master')

@section('title')
    Category list
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
                		<h2>Category list</h2>
            		</div>
            		<div class="col-md-6 text-right">
                		<a href="{{ url('admin/category/create') }}" class="btn btn-primary">Add</a>
            		</div>
            	</div>

            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Estimated Commission</th>
                            <th scope="col">Each Worker Earning</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <th>{{ $loop->index+1 }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->price }}%</td>
                                <td>{{ $category->worker_earning }}tk</td>
                                <td>
                                    @if($category->status == 1)
                                    <a href="#" class="btn btn-sm btn-success">Active</a>
                                    @else
                                    <a href="#" class="btn btn-sm btn-warning">Inactive</a>
                                    @endif
                                </td>
                                <td>
                                    @if ($category->status==true)
                                    <a href="{{ url('admin/category/inactive' , $category->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Inactivate</a>
                                    @elseif ($category->status==false)
                                    <a href="{{ url('admin/category/active' , $category->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-success">Activate</a>
                                    @endif
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
