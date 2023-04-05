@extends('frontend.auth.master')

@section('title')
	Deposit Details
@endsection

@section('content')
    <section class="my-task-section">
        <div class="container-fluid">
            <div class="card">
                <div class="col-lg-12 col-md-12">
                    <a href="#" target="_blank" class="payment-method-outer">
                        <h5 class="payment-method-title">
                            Deposit Details
                        </h5>
                        <p class="payment-method-number">
                            Deposit Amont: {{ $deposit->deposit_amount }} <br>
                            Payment Gateway: {{ $deposit->payment_gateway }} <br>
                            Transaction ID: {{ $deposit->transaction_id }} <br>
                            Status: @if ($deposit->is_approved==true)
                                        Approved
                                    @else
                                        Pending
                                    @endif <br>
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
