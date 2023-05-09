@extends('backend.master')

@section('title')
    Privacy Policy
@endsection

@section('content')
    <div class="container-fluid pb-0">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Privacy Policy</h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="text-right">
                        <a href="{{ url('/admin/create/privacy-policy') }}" class="btn btn-sm btn-primary mb-2">Add Privacy Policy</a>
                    </div>
                    <div class="table-responsive-scroll">
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
                                @foreach($privacy_policies as $privacy_policy)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $privacy_policy->title }}</td>
                                        {{--  <td>{!! substr($privacy_policy->description,0,50) !!}</td>  --}}
                                        <td>
                                            <a href="{{ url('/admin/edit/privacy-policy/'.$privacy_policy->id) }}" class="btn btn-sm btn-info">Edit</a>
                                            <a href="{{ url('/admin/delete/privacy-policy/'.$privacy_policy->id) }}" onclick="return confirm('Are you sure delete this data ?')" class="btn btn-sm btn-danger">Delete</a>
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
