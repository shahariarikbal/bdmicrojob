@extends('frontend.auth.master')

@section('title')
	Job Post Success
@endsection

@section('content')
    <section class="job-details-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <h1>Job is created successfully. Please wait for admin approval</h1>
                    <h3>Per Worker Earn: {{ $per_worker_earn }}tk</h3>
                    <h3>Job Cost: {{ $job_cost }}tk</h3>
                    <h3>Job Commission: {{ $job_commission }}tk ({{ $admin_commission }}%)</h3>
                    <h3>Total Cost: {{ $postPriceEarnPrice }}tk</h3>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page-scripts')
    <script type="text/javascript">

    </script>
@endpush
