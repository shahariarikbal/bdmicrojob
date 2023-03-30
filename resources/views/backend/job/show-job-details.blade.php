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
                                <a href="{{ url('/admin/dashboard') }}" class="nid-details-back-btn-inner">Back</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="nid-details-right-btn-outer">
                                <a href="{{ url('/admin/job/approve/'.$job_post->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Approve</a>
                                <a href="{{ url('/admin/job/reject/'.$job_post->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Reject</a>
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
                                                Job Category:
                                            </h5>
                                            <p class="sumitted-job-details-value">
                                                {{ $job_post->category->name }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="sumitted-job-details-outer">
                                            <h5 class="sumitted-job-details-label">
                                                Job Title:
                                            </h5>
                                            <p class="sumitted-job-details-value">
                                                {{ $job_post->title }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="sumitted-job-details-outer">
                                            <h5 class="sumitted-job-details-label">
                                                User Name:
                                            </h5>
                                            <p class="sumitted-job-details-value">
                                                {{ $job_post->user->name }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="sumitted-job-details-outer">
                                            <h5 class="sumitted-job-details-label">
                                                User Email:
                                            </h5>
                                            <p class="sumitted-job-details-value">
                                                {{ $job_post->user->email }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="sumitted-job-details-outer">
                                            <h5 class="sumitted-job-details-label">
                                                Status:
                                            </h5>
                                            <p class="sumitted-job-details-value">
                                                @if ($job_post->is_approved==0)
                                                    Pending
                                                @elseif($job_post->is_approved==1)
                                                    Approved
                                                @else
                                                    Rejected
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="sumitted-job-details-image-outer">
                                            <h5 class="sumitted-job-details-label">
                                                Thumbnail
                                            </h5>
                                            <img src="{{ asset('/thumbnail/'.$job_post->avatar) }}" class="sumitted-job-details-image" alt="Card Image" />
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
