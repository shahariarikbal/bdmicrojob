@extends('backend.master')

@section('title')
    NID Verification list
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
                		<h2>NID Verification list</h2>
            		</div>
            	</div>

            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <table class="table table-striped table-responsive">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">User Email</th>
                            <th scope="col">User Phone</th>
                            <th scope="col">Type</th>
                            <th scope="col">Card Number</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($nid_requests as $nid_request)
                            <tr>
                                <th>{{ $loop->index+1 }}</th>
                                <td>{{ $nid_request->user->name }}</td>
                                <td>{{ $nid_request->user->email }}</td>
                                <td>{{ $nid_request->user->phone }}</td>
                                <td>{{ $nid_request->card_type }}</td>
                                <td>{{ $nid_request->card_number }}</td>
                                {{--  <td>
                                    <img src="{{ asset('/card_verification/'.$nid_request->card_image) }}" height="100px" width="100px" alt="">
                                </td>
                                <td>
                                    <img src="{{ asset('/card_verification/'.$nid_request->user_image) }}" height="100px" width="100px" alt="">
                                </td>  --}}
                                <td>
                                    @if($nid_request->status == 1)
                                    <a href="#" class="btn btn-sm btn-success">Approved</a>
                                    @elseif ($nid_request->status == 0)
                                    <a href="#" class="btn btn-sm btn-warning">Pending</a>
                                    @elseif ($nid_request->status == 2)
                                    <a href="#" class="btn btn-sm btn-danger">Rejected</a>
                                    @endif
                                </td>
                                <td>
                                    {{--  @if ($nid_request->status==0)
                                    <a href="{{ url('admin/nid_verification/approve/'.$nid_request->id) }}" onclick="return confirm('Are you sure??')" class="btn btn-sm btn-danger">Approve</a>
                                    <a href="{{ url('admin/nid_verification/reject/'.$nid_request->id) }}" onclick="return confirm('Are you sure??')" class="btn btn-sm btn-danger">Reject</a>
                                    @elseif ($nid_request->status==1)
                                    <a href="{{ url('admin/nid_verification/approve/'.$nid_request->id) }}" onclick="return confirm('Are you sure??')" class="btn btn-sm btn-danger">Approve</a>
                                    @elseif ($nid_request->status==2)
                                    <a href="{{ url('admin/nid_verification/reject/'.$nid_request->id) }}" onclick="return confirm('Are you sure??')" class="btn btn-sm btn-danger">Reject</a>
                                    @endif  --}}
                                    <a href="{{ url('admin/nid_verification/details/'.$nid_request->id) }}" class="btn btn-sm btn-primary">Details</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                      {{ $nid_requests->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
