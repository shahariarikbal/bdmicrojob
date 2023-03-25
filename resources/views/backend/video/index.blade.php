@extends('backend.master')

@section('title')
    Video list
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
                		<h2>Video list</h2>            			
            		</div>
            		<div class="col-md-6 text-right">
                		<a href="{{ url('admin/video/create') }}" class="btn btn-primary">Add</a>
            		</div>
            	</div>

            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Video Code</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Models\Video::orderBy('id', 'desc')->get() as $video)
                            <tr>
                                <th>{{ $loop->index+1 }}</th>
                                <td>{{ $video->title }}</td>
                                <td>{{ $video->video_link }}</td>
                                <td>
    {{--                                 @if($video->status == 1)
                                        <a href="#" class="btn btn-sm btn-success">Active</a>
                                    @else
                                        <a href="#" class="btn btn-sm btn-warning">Inactive</a>
                                    @endif --}}

                                    <a href="{{ url('admin/video/edit' , $video->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    <form action="{{ url('admin/video/delete', $video->id) }}" method="post" class="d-inline" onsubmit="return confirm('Are you sure?')" id="delete{{ $video->id }}">

                                    	@csrf


                                    	<button type="submit" class="btn btn-sm btn-danger">Delete</button>

                                	</form>
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
