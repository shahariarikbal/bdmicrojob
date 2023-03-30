@extends('backend.master')

@section('title')
    Job list
@endsection

@push('page-css')
<style type="text/css">
    
</style>
@endpush

@section('content')
    <section class="my-task-section">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="nid-details-back-btn-outer">
                                <a href="#" class="nid-details-back-btn-inner">Back</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="nid-details-right-btn-outer">
                                <a href="#" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Approve</a>
                                <a href="#" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Reject</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 m-auto">
                            <div class="sumitted-job-details-wrap">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="sumitted-job-details-outer">
                                            <h5 class="sumitted-job-details-label">
                                                Job Title:
                                            </h5>
                                            <p class="sumitted-job-details-value">
                                                dfdg
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="sumitted-job-details-outer">
                                            <h5 class="sumitted-job-details-label">
                                                Worker Name:
                                            </h5>
                                            <p class="sumitted-job-details-value">
                                                dfgdg
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="sumitted-job-details-outer">
                                            <h5 class="sumitted-job-details-label">
                                                Worker Email:
                                            </h5>
                                            <p class="sumitted-job-details-value">
                                               xdfsdg
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="sumitted-job-details-outer">
                                            <h5 class="sumitted-job-details-label">
                                                Status:
                                            </h5>
                                            <p class="sumitted-job-details-value">
                                                dswfedrs
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="sumitted-job-details-image-outer">
                                            <h5 class="sumitted-job-details-label">
                                                Screenshots
                                            </h5>
                                            <img src="{{ asset('/frontend/') }}/assets/images/video-bg.png" class="sumitted-job-details-image" alt="Card Image" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
