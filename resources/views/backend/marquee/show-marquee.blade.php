@extends('backend.master')

@section('title')
    Marquee list
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
                		<h2>Marquee list</h2>
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
                            <th scope="col">Page Name</th>
                            <th scope="col">Marquee Text</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($marquee_texts as $marquee_text)
                            <tr>
                                <th>{{ $loop->index+1 }}</th>
                                <td>{{ $marquee_text->page_name }}</td>
                                <td>{{ $marquee_text->marquee_text }}</td>
                                <td>
                                    <a href="{{ url('admin/edit/marque-text' , $marquee_text->id) }}" class="btn btn-sm btn-success">Edit</a>
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
