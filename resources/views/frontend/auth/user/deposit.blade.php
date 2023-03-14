@extends('frontend.auth.master')

@section('title')
	My Task
@endsection

@section('content')
    <section class="deposit-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="card">
                        <div class="card-header p-3">
                            <h2 class="text-center m-0 text-blue deposit-sec-title">Instant Deposit</h2>
                            <div class="card-body">
                                <div>
                                    <p class="deposit-sec-notice" style="padding: 5px; border: 2px solid #7E41C2; border-radius: 4px;">NOTICE : Minimum deposit amount: 1$ . Any deposits less then the minimum will not be credited or refunded.Thank You</p>
                                </div>
                                <form action="" method="" class="deposit-form form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="full_name" class="deposit-form-label">Full Name</label>
                                            <input type="text" name="full_name" class="deposit-form-input form-control" placeholder="Full Name">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phone" class="deposit-form-label">Phone Number</label>
                                            <input type="number" name="phone" class="deposit-form-input form-control" placeholder="Phone Number">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="deposit-form-label">Email</label>
                                            <input type="email" name="email" class="deposit-form-input form-control" placeholder="Email">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="address" class="deposit-form-label">Address</label>
                                            <input type="text" name="address" class="deposit-form-input form-control" placeholder="Address">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="city" class="deposit-form-label">City</label>
                                            <input type="text" name="city" class="deposit-form-input form-control" placeholder="City">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="post_code" class="deposit-form-label">Postal Code</label>
                                            <input type="text" name="post_code" class="deposit-form-input form-control" placeholder="Postal Code">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="payment" class="deposit-form-label">Payment Gateway</label>
                                            <select name="payment" class="deposit-form-input form-control">
                                                <option selected disabled>-- Select Payment Gateway --</option>
                                                <option value="bkash">Bkash</option>
                                                <option value="nagad">Nagad</option>
                                                <option value="rocket">Rocket</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="transaction_id" class="deposit-form-label">Transaction Id</label>
                                            <input type="text" name="transaction_id" class="deposit-form-input form-control" placeholder="Transaction Id">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="deposit_amount" class="deposit-form-label">Deposit Amount</label>
                                            <input type="text" name="deposit_amount" class="deposit-form-input form-control" placeholder="Deposit Amount">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="checkbox" name="agree" class="deposit-form-check-input" placeholder="Deposit Amount">
                                            <label for="agree" class="deposit-form-check-label">I agree to all Terms of Service and all Policy.</label>
                                        </div>
                                        <button type="submit" class="deposit-form-btn">Continue to payment</button>
                                    </div>
                                </form>
                            </div>
                            <div class="text-right">
                                <div class="text-center">
                                    <img class="gateway-branding" src="https://workupjob.com/assets/img/brand/donex.png" />
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