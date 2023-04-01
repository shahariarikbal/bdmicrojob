@extends('frontend.auth.master')

@section('title')
	Deposit
@endsection

@section('content')
    <section class="deposit-section">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header p-3">
                    <h2 class="text-center m-0 text-blue deposit-sec-title">Withdraw</h2>
                    <div class="card-body">
                        <div>
                            <p class="deposit-sec-notice" style="padding: 5px; border: 2px solid #7E41C2; border-radius: 4px;">NOTICE : Minimum withdraw amount: 100tk with 15% commission. Thank You</p>
                        </div>
                        <form action="{{ url('/withdraw/earning') }}" method="POST" class="deposit-form form-group">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="user_name" class="deposit-form-label">Full Name</label>
                                    <input type="text" name="user_name" readonly value="{{ $auth_user->name }}" class="deposit-form-input form-control" placeholder="Full Name">
                                    @if ($errors->has('user_name'))
                                    <div class="text-danger">{{ $errors->first('user_name') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="user_phone" class="deposit-form-label">Phone Number</label>
                                    <input type="number" name="user_phone" readonly value="{{ $auth_user->phone }}" class="deposit-form-input form-control" placeholder="Phone Number">
                                    @if ($errors->has('user_phone'))
                                    <div class="text-danger">{{ $errors->first('user_phone') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="user_email" class="deposit-form-label">Email</label>
                                    <input type="email" name="user_email" readonly value="{{ $auth_user->email }}" class="deposit-form-input form-control" placeholder="Email">
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
                                        {{--  <option value="rocket">Rocket</option>  --}}
                                    </select>
                                    @if ($errors->has('payment_gateway'))
                                    <div class="text-danger">{{ $errors->first('payment_gateway') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="payment_gateway_number" class="deposit-form-label">Payment Gateway Number</label>
                                    <input type="text" name="payment_gateway_number" class="deposit-form-input form-control" value="{{ old('payment_gateway_number') }}" placeholder="Bkash/Nagad Number">
                                    @if ($errors->has('payment_gateway_number'))
                                    <div class="text-danger">{{ $errors->first('payment_gateway_number') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="withdraw_amount" class="deposit-form-label">Deposit Amount</label>
                                    <input type="number" name="withdraw_amount" value="{{ old('withdraw_amount') }}" class="deposit-form-input form-control" placeholder="Withdraw Amount">
                                    @if ($errors->has('withdraw_amount'))
                                    <div class="text-danger">{{ $errors->first('withdraw_amount') }}</div>
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
                                @if ($auth_user->nid_verified==1 && $auth_user->total_income>=115)
                                <button type="submit" class="deposit-form-btn">Continue to payment</button>
                                @elseif ($auth_user->nid_verified!=1 && $auth_user->total_income>=115)
                                <div><h1 class="text-danger">Your NID/Birth Certificate is not verified yet!!</h1></div>
                                @elseif ($auth_user->nid_verified==1 && $auth_user->total_income<115)
                                <div><h1 class="text-danger">Insufficient Earning Balance!!</h1></div>
                                @elseif ($auth_user->nid_verified!=1 && $auth_user->total_income<115)
                                <div><h1 class="text-danger">NID is not Verified & Insufficient Earning Balance!!</h1></div>
                                @endif
                            </div>
                        </form>
                    </div>
                    {{--  <div class="text-right">
                        <div class="text-center">
                            <img class="gateway-branding" src="https://workupjob.com/assets/img/brand/donex.png" />
                        </div>
                    </div>  --}}
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page-scripts')
    <script type="text/javascript">

    </script>
@endpush
