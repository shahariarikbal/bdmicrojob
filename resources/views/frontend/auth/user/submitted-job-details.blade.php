@extends('frontend.auth.master')

@section('title')
    Submitted Job Details
@endsection

@section('content')
    <section class="my-task-section">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="nid-details-back-btn-outer">
                                <a href="{{ url('/submitted/job') }}" class="nid-details-back-btn-inner">Back</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="nid-details-right-btn-outer">
                                <a href="{{ url('/submitted/job/approve/'.$submitted_job->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Approve</a>
                                <a href="{{ url('/submitted/job/reject/'.$submitted_job->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Reject</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 m-auto">
                            <div class="sumitted-job-details-wrap">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="sumitted-job-details-outer">
                                            <h5 class="sumitted-job-details-label">
                                                Job Title:
                                            </h5>
                                            <p class="sumitted-job-details-value">
                                                {{ $submitted_job->post->title }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="sumitted-job-details-outer">
                                            <h5 class="sumitted-job-details-label">
                                                Worker Name:
                                            </h5>
                                            <p class="sumitted-job-details-value">
                                                {{ $submitted_job->user->name }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="sumitted-job-details-outer">
                                            <h5 class="sumitted-job-details-label">
                                                Worker Email:
                                            </h5>
                                            <p class="sumitted-job-details-value">
                                                {{ $submitted_job->user->email }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="sumitted-job-details-outer">
                                            <h5 class="sumitted-job-details-label">
                                                Status:
                                            </h5>
                                            <p class="sumitted-job-details-value">
                                                @if($submitted_job->status=='1')
                                                    Approved
                                                @elseif ($submitted_job->status=='2')
                                                    Rejected
                                                @else
                                                    Pending
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    @foreach (json_decode($submitted_job->images) as $image )
                                    <div class="col-md-12">
                                        <div class="sumitted-job-details-image-outer">
                                            <h5 class="sumitted-job-details-label">
                                                Screenshots
                                            </h5>
                                            <img src="{{ asset('/post/'.$image) }}" class="sumitted-job-details-image" alt="Card Image" />
                                        </div>
                                    </div>
                                    @endforeach
                                    {{--  <div class="col-md-12">
                                        <div class="sumitted-job-details-image-outer">
                                            <h5 class="sumitted-job-details-label">
                                                Screenshots
                                            </h5>
                                            <img src="{{ asset('/frontend/') }}/assets/images/video-bg.png" class="sumitted-job-details-image" alt="Card Image" />
                                        </div>
                                    </div>  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page-scripts')
    <script type="text/javascript">

    </script>
@endpush
