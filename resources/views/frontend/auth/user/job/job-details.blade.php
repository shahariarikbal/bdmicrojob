@extends('frontend.auth.master')

@section('title')
	Job Details
@endsection

@section('content')
    <section class="job-details-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="job-details-top">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="done-job-outer">
                                    <div class="done-job-left">
                                        <h5 class="title">DONE</h5>
                                        <h3 class="number">0 of {{ $postDetail->worker_number }}</h3>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="done-job-right">
                                        <span class="icon-outer">
                                            <i class="fas fa-check-circle"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="earn-money-outer">
                                    <h3>
                                        YOU CAN EARN <strong>৳ {{ $postDetail->worker_earn }}</strong>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="job-details-form-item">
                        <div class="job-details-form-top">
                            <div class="left">
                                <h4 class="title">
                                    {{ $postDetail->title }}
                                </h4>
                            </div>
                            <div class="right">
                                <a href="{{ url('/dashboard') }}" class="hide-btn-inner">Hide</a>
                            </div>
                        </div>
                        <img src="{{ asset('/thumbnail/'.$postDetail->avatar) }}" alt="image" class="top-image">
                        <h4 class="job-details-text-title">
                            <i class="fas fa-list"></i>
                             What is expected from workers?
                        </h4>
                        @foreach($postDetail->specificTasks as $task)
                            <div class="job-details-text-outer" style="background:#e3e3e3;padding: 10px;border-radius:5px; margin-top: 10px;">
                                <p class="job-details-text">
                                    {{ $task->specific_task }}
                                </p>
                            </div>
                        @endforeach
                        <div class="report-btn-outer">
                            <a href="{{ url('/job/report/'.$postDetail->id) }}" class="report-btn-inner">Report</a>
                        </div>
                    </div>
                    <div class="job-details-form-item">
                        <h4 class="job-details-text-title">
                            REQUIRED PROOF THAT TASK WAS FINISHED?
                        </h4>
                        <p class="job-details-text">
                            1. {{ $postDetail->required_task }}
                        </p>
                    </div>
                    <form action="" method="" class="job-details-form form-group">
                        <div class="job-details-form-item">
                            <h4 class="job-details-text-title">
                                Submit required work Prove
                            </h4>
                            <textarea name="prove_details" rows="5" cols="50" class="form-control"></textarea>
                        </div>
                        <div class="job-details-form-item">
                            <h4 class="job-details-text-title">
                                UPLOAD SCREENSHOT PROVE
                            </h4>
                            <input type="file" name="screenshot" multiple class="form-control">
                        </div>
                        <button type="submit" class="job-details-form-sub-btn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page-scripts')
    <script type="text/javascript">

    </script>
@endpush
