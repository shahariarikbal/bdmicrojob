@extends('backend.master')

@section('title')
    Blog list
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
                		<h2>Blog list</h2>
            		</div>
            		<div class="col-md-6 text-right">
                		<a href="{{ url('admin/create/blog') }}" class="btn btn-primary">Add</a>
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
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                <tr>
                                    <th>{{ $loop->index+1 }}</th>
                                    <td>{{ $blog->short_title }}</td>
                                    <td>{{ $blog->short_description }}</td>
                                    <td>
                                        <img src="{{ asset('blog/'.$blog->image) }}" alt="" height="50px">
                                    </td>
                                    <td>
                                        <a href="{{ url('/admin/edit/blog/'.$blog->id) }}" class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ url('/admin/delete/blog/'.$blog->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>
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
