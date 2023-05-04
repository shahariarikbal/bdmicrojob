@extends('backend.master')

@section('title')
    Contact Messages
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
                		<h4>Contact Messages</h4>
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
                                <th scope="col">Message</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                <tr>
                                    <th>{{ $loop->index+1 }}</th>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}tk</td>
                                    <td>{{ $contact->phone }}tk</td>
                                    <td>{{ $contact->message }}</td>
                                    <td>
                                        <a href="{{ url('admin/contact/delete' , $contact->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>
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
