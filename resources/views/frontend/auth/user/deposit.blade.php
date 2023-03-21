@extends('frontend.auth.master')

@section('title')
	Deposit
@endsection

@section('content')
    <section class="deposit-section">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header p-3">
                    <h2 class="text-center m-0 text-blue deposit-sec-title">Instant Deposit</h2>
                    <div class="card-body">
                        <div>
                            <h5>
                                1.বিকাশ মার্চেন্ট (পেমেন্ট) => 01580366311 <br>
                                2.নগদ পারসোনাল (সেন্ডমানি) => 01580366311
                            </h5>
                            <p class="deposit-sec-notice" style="padding: 5px; border: 2px solid #7E41C2; border-radius: 4px;">NOTICE : Minimum deposit amount: 100tk . Any deposits less then the minimum will not be credited or refunded.Thank You</p>
                        </div>
                        <form action="{{ url('/store/deposit') }}" method="POST" class="deposit-form form-group" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="user_name" class="deposit-form-label">Full Name</label>
                                    <input type="text" name="user_name" value="{{ $user_name }}" class="deposit-form-input form-control" placeholder="Full Name">
                                    @if ($errors->has('user_name'))
                                    <div class="text-danger">{{ $errors->first('user_name') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="user_phone" class="deposit-form-label">Phone Number</label>
                                    <input type="number" name="user_phone" value="{{ $user_phone }}" class="deposit-form-input form-control" placeholder="Phone Number">
                                    @if ($errors->has('user_phone'))
                                    <div class="text-danger">{{ $errors->first('user_phone') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="user_email" class="deposit-form-label">Email</label>
                                    <input type="email" name="user_email" value="{{ $user_email }}" class="deposit-form-input form-control" placeholder="Email">
                                    @if ($errors->has('user_email'))
                                    <div class="text-danger">{{ $errors->first('user_email') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="user_address" class="deposit-form-label">Address</label>
                                    <input type="text" name="user_address" value="{{ old('user_address') }}" class="deposit-form-input form-control" placeholder="Address">
                                    @if ($errors->has('user_address'))
                                    <div class="text-danger">{{ $errors->first('user_address') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="city" class="deposit-form-label">City</label>
                                    <input type="text" name="city" class="deposit-form-input form-control" value="{{ old('city') }}" placeholder="City">
                                    @if ($errors->has('city'))
                                    <div class="text-danger">{{ $errors->first('city') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="post_code" class="deposit-form-label">Postal Code</label>
                                    <input type="text" name="post_code" class="deposit-form-input form-control" value="{{ old('post_code') }}" placeholder="Postal Code">
                                    @if ($errors->has('post_code'))
                                    <div class="text-danger">{{ $errors->first('post_code') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="payment_gateway" class="deposit-form-label">Payment Gateway</label>
                                    <select name="payment_gateway" value="{{ old('payment_gateway') }}" class="deposit-form-input form-control">
                                        <option selected disabled>-- Select Payment Gateway --</option>
                                        <option value="bkash">Bkash</option>
                                        <option value="nagad">Nagad</option>
                                        <option value="rocket">Rocket</option>
                                    </select>
                                    @if ($errors->has('payment_gateway'))
                                    <div class="text-danger">{{ $errors->first('payment_gateway') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="transaction_id" class="deposit-form-label">Transaction Id</label>
                                    <input type="text" name="transaction_id" value="{{ old('transaction_id') }}" class="deposit-form-input form-control" placeholder="Transaction Id">
                                    @if ($errors->has('transaction_id'))
                                    <div class="text-danger">{{ $errors->first('transaction_id') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="deposit_amount" class="deposit-form-label">Deposit Amount</label>
                                    <input type="number" name="deposit_amount" value="{{ old('deposit_amount') }}" class="deposit-form-input form-control" placeholder="Deposit Amount">
                                    @if ($errors->has('deposit_amount'))
                                    <div class="text-danger">{{ $errors->first('deposit_amount') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="deposit-checkbox-outer">
                                        <input type="checkbox" name="agree" class="deposit-form-check-input" placeholder="Deposit Amount">
                                        <label for="agree" class="deposit-form-check-label">I agree to all Terms of Service and all Policy.</label>
                                        @if ($errors->has('agree'))
                                        <div class="text-danger">{{ $errors->first('agree') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="screenshot" class="deposit-form-label">Payment Sucesfull Screenshot (Optional)</label>
                                    <input type="file" name="screenshot" class="deposit-form-input form-control" placeholder="Deposit Amount">
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
    </section>
@endsection

@push('page-scripts')
    <script type="text/javascript">

    </script>
@endpush
