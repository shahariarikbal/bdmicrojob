@extends('backend.master')

@section('title')
    About Us list
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
                		<h2>About Us list</h2>
            		</div>
            		{{--  <div class="col-md-6 text-right">
                		<a href="{{ url('admin/category/create') }}" class="btn btn-primary">Add</a>
            		</div>  --}}
            	</div>

            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <table class="table table-striped table-responsive">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Short Description</th>
                            <th scope="col">Short Description<</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($about_us as $about)
                            <tr>
                                <th>{{ $loop->index+1 }}</th>
                                <td>{{ $about->title }}</td>
                                <td>{{ $about->short_description }}</td>
                                <td>{!! $about->long_description !!}</td>
                                <td>
                                    <a href="{{ url('admin/edit/about-us' , $about->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    {{--  <a href="{{ url('admin/about/delete' , $about->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>  --}}
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
