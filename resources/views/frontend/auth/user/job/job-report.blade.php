@extends('frontend.auth.master')

@section('title')
	Job Report
@endsection

@section('content')
    <section class="job-report-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 m-auto">
                    <div class="job-report-wrapper">
                        <h4 class="job-report-title">
                            Report This Job
                        </h4>
                        <form action="{{ url('/report/submit/'.$postReport->id) }}" method="post" class="job-report-form form-group">
                            @csrf
                            <p class="job-report-form-text">
                                Do you have any issue/problem with this job?<br>
                                Write down below about your problem/reason
                            </p>
                            <div class="form-group">
                                <label class="job-report-form-label" for="report_message">
                                    Describe your issue/reason
                                </label>
                                <textarea class="form-control" id="report_message" rows="5" name="message" placeholder="Write your reason here..."></textarea>
                            </div>
                            <div class="report-form-btn-outer">
                                <button type="submit" class="report-form-btn-inner">
                                    Submit Report
                                </button>
                            </div>
                        </form>
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
