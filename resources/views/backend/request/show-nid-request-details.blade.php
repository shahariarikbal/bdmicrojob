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
                        <button type="button" class="btn btn-sm btn-success">Approved</button>
                        <button type="button" class="btn btn-sm btn-danger">Reject</button>
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
                                        Saidul Islam
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="nid-details-outer">
                                    <h5 class="nid-details-label">
                                        Email
                                    </h5>
                                    <p class="nid-details-value">
                                        info@gmail.com
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="nid-details-outer">
                                    <h5 class="nid-details-label">
                                        Phone 
                                    </h5>
                                    <p class="nid-details-value">
                                        012345678996
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="nid-details-outer">
                                    <h5 class="nid-details-label">
                                        Card Type 
                                    </h5>
                                    <p class="nid-details-value">
                                        Birth
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="nid-details-outer">
                                    <h5 class="nid-details-label">
                                        Card Number 
                                    </h5>
                                    <p class="nid-details-value">
                                        012345678996
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="nid-details-outer">
                                    <h5 class="nid-details-label">
                                        Status 
                                    </h5>
                                    <p class="nid-details-value">
                                        Pending
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="nid-details-outer">
                                    <h5 class="nid-details-label">
                                        Card Image 
                                    </h5>
                                    <img src="{{ asset('backend/') }}/img/Rectangle 24.png" class="nid-details-image" alt="Card Image" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="nid-details-outer">
                                    <h5 class="nid-details-label">
                                        User Image
                                    </h5>
                                    <img src="{{ asset('backend/') }}/img/Rectangle 29.png" class="nid-details-image" alt="User Image" />
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
