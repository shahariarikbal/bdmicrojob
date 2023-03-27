@extends('backend.master')

@section('title')
    NID Details
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
                    <div class="nid-details-back-btn-outer">
                        <a href="{{ url('/admin/nid_verification/request') }}" class="nid-details-back-btn-inner">Back</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="nid-details-right-btn-outer">
                        <a href="{{ url('admin/nid_verification/approve/'.$nid_request->id) }}" onclick="return confirm('Are you sure??')" class="btn btn-sm btn-danger">Approve</a>
                        <a href="{{ url('admin/nid_verification/reject/'.$nid_request->id) }}" onclick="return confirm('Are you sure??')" class="btn btn-sm btn-danger">Reject</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="nid-details-wrap">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="nid-details-outer">
                                    <h5 class="nid-details-label">
                                        Name
                                    </h5>
                                    <p class="nid-details-value">
                                        {{ $nid_request->user->name }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="nid-details-outer">
                                    <h5 class="nid-details-label">
                                        Email
                                    </h5>
                                    <p class="nid-details-value">
                                        {{ $nid_request->user->email }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="nid-details-outer">
                                    <h5 class="nid-details-label">
                                        Phone
                                    </h5>
                                    <p class="nid-details-value">
                                        {{ $nid_request->user->phone }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="nid-details-outer">
                                    <h5 class="nid-details-label">
                                        Card Type
                                    </h5>
                                    <p class="nid-details-value">
                                        {{ $nid_request->card_type }} certificate
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="nid-details-outer">
                                    <h5 class="nid-details-label">
                                        Card Number
                                    </h5>
                                    <p class="nid-details-value">
                                        {{ $nid_request->card_number }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="nid-details-outer">
                                    <h5 class="nid-details-label">
                                        Status
                                    </h5>
                                    <p class="nid-details-value">
                                        @if ($nid_request->status==0)
                                            Pending
                                        @elseif ($nid_request->status==1)
                                            Approved
                                        @else
                                            Rejected
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="nid-details-outer">
                                    <h5 class="nid-details-label">
                                        Card Image
                                    </h5>
                                    <img src="{{ asset('/card_verification/'.$nid_request->card_image) }}" class="nid-details-image" alt="Card Image" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="nid-details-outer">
                                    <h5 class="nid-details-label">
                                        User Image
                                    </h5>
                                    <img src="{{ asset('/card_verification/'.$nid_request->user_image) }}" class="nid-details-image" alt="User Image" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
