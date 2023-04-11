@extends('backend.master')

@section('title')
    Terms & Conditions
@endsection

@section('content')
    <div class="container-fluid pb-0">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Terms & Conditions</h2>
                    </div>
                </div>
            </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <a href="{{ url('/admin/create/term-condition') }}" class="btn btn-sm btn-primary float-right mb-2">Add Terms & Conditions</a>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                {{--  <th scope="col">Description</th>  --}}
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($term_conditions as $term_condition)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $term_condition->title }}</td>
                                        {{--  <td>{!! substr($term_condition->description,0,50) !!}</td>  --}}
                                        <td>
                                            <a href="{{ url('/admin/edit/term-condition/'.$term_condition->id) }}" class="btn btn-sm btn-info">Edit</a>
                                            <a href="{{ url('/admin/delete/term-condition/'.$term_condition->id) }}" onclick="return confirm('Are you sure delete this data ?')" class="btn btn-sm btn-danger">Delete</a>
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
