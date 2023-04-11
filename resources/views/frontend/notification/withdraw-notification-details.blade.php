@extends('frontend.auth.master')

@section('title')
	Withdraw Details
@endsection

@section('content')
    <section class="my-task-section">
        <div class="container-fluid">
            <div class="card">
                <div class="col-lg-12 col-md-12">
                    <a href="#" target="_blank" class="payment-method-outer">
                        <h5 class="payment-method-title">
                            Withdraw Details
                        </h5>
                        <p class="payment-method-number">
                            Withdraw Amont: {{ $withdraw->withdraw_amount }} <br>
                            Payment Gateway: {{ $withdraw->payment_gateway }} <br>
                            Payment Gateway Number: {{ $withdraw->payment_gateway_number }} <br>
                            Status: @if ($withdraw->is_approved==true)
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
