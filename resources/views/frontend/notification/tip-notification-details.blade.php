@extends('frontend.auth.master')

@section('title')
	Tip Details
@endsection

@section('content')
    <section class="my-task-section">
        <div class="container-fluid">
            <div class="card">
                <div class="col-lg-12 col-md-12">
                    <a href="#" class="payment-method-outer">
                        <h5 class="payment-method-title">
                            Tip Details
                        </h5>
                        <p class="payment-method-number">
                            {{ $notification->message }}
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page-scripts')
    <script type="text/javascript">

    </script>
@endpush
