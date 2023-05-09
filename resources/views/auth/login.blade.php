{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Login Form</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body{
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        .login-section {
            overflow-x: hidden;
        }

        .login-sec-left-wave{
            position: fixed;
            bottom: 0;
            left: 0;
            height: 100%;
            z-index: -1;
        }

        .login-content-wrapper {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-contant-left img {
            width: 100%;
        }

        .login-form img {
            width: 100%;
            max-width: 200px;
        }

        .login-form .title {
            margin: 15px 0;
            color: #333;
            text-transform: uppercase;
            font-size: 2.9rem;
        }

        .login-form {
            width: 100%;
            max-width: 500px;
            text-align: center;
            padding: 20px 0;
        }

        .login-contant-left {
            margin-right: 60px;
        }

        .animate-label .login-form-item-outer label {
            margin-bottom: 0;
            position: absolute;
            top: 13px;
            left: 14px;
            z-index: -1;
        }

        .animate-label .login-form-item-outer label {
            margin-bottom: 0;
            position: absolute;
            top: 12px;
            left: 14px;
            z-index: -1;
            padding: 1px 5px;
            font-size: 16px;
            -webkit-transition: .3s cubic-bezier(.25,.8,.5,1);
            transition: .3s cubic-bezier(.25,.8,.5,1);
            -webkit-transform-origin: top left;
            transform-origin: top left;
            -webkit-animation: v-shake .6s cubic-bezier(.25,.8,.5,1);
            animation: v-shake .6s cubic-bezier(.25,.8,.5,1);
        }
        @-webkit-keyframes v-shake {
            59% {
                margin-left: 0
            }
            60%,
            80% {
                margin-left: 2px
            }
            70%,
            90% {
                margin-left: -2px
            }
        }
        @keyframes v-shake {
            59% {
                margin-left: 0
            }
            60%,
            80% {
                margin-left: 2px
            }
            70%,
            90% {
                margin-left: -2px
            }
        }
        .animate-label .login-form-item-outer {
            position: relative;
            z-index: 1;
        }
        .animate-label .login-form-item-outer input {
            background: transparent;
            height: 50px;
            margin-bottom: 20px;
        }

        .animate-label .login-form-item-outer input:focus {
            box-shadow: none;
        }

        .animate-label .login-form-item-outer input:focus + label,
        .animate-label input.filled + label {
            top: -11px;
            z-index: 111;
            background: #ffffff;
            font-size: 14px;
            animation: none;
        }
        .animate-label .login-form-item-outer input.empty {
            border: 1px solid #7E41C2;
        }
        .animate-label .login-form-item-outer input.empty + label {
            color: #7E41C2;
        }

        .animate-label .login-form-item-outer label {
            color: #999;
        }

        .animate-label .login-form-item-outer label i {
            margin-right: 5px;
        }

        .login-form-submit {
            display: block;
            width: 100%;
            height: 50px;
            border-radius: 25px;
            outline: none;
            border: none;
            background: #7E41C2;
            background-size: 200%;
            font-size: 1.2rem;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            text-transform: uppercase;
            margin: 1rem 0;
            cursor: pointer;
            transition: .5s;
        }
        .sign-in-link {
            text-decoration: none;
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            background: #9a9a9a;
            padding: 5px 20px;
            border-radius: 30px;
            transition: all .3s ease;
        }
        .sign-in-link:hover {
            background: #7e41c2d6;
            color: #fff;
        }
        .not-robot-outer {
            text-align: initial;
            display: flex;
            align-items: center;
        }

        .not-robot-outer input#robot {
            width: 22px;
            height: 22px;
            margin-right: 10px;
        }

        .forgot-password-link-outer {
            text-align: end;
        }

        .forgot-password-link {
            display: inline-block;
            text-decoration: none;
            font-size: 17px;
            font-weight: 900;
            text-transform: capitalize;
            color: #7e41c2;
            transition: all .3s ease;
        }
        .forgot-password-link:hover {
            color: #000;
        }

        @media screen and (max-width: 1024px){
            .col-lg-6.col-md-6.sm-device-none {
                display: none;
            }
            .login-sec-left-wave{
                display: none;
            }
        }

    </style>
</head>
<body>
<section class="login-section">
    <img class="login-sec-left-wave" src="https://raw.githubusercontent.com/sefyudem/Responsive-Login-Form/master/img/wave.png">
    <div class="login-content-wrapper">
        <div class="row">
            <div class="col-lg-6 col-md-6 sm-device-none">
                <div class="login-contant-left">
                    <img src="https://raw.githubusercontent.com/sefyudem/Responsive-Login-Form/master/img/bg.svg">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="login-content-right">
                    <form action="{{ route('login') }}" method="POST" class="form-group login-form animate-label">
                        @csrf
                        <img src="{{ asset('/logo/'.$setting->logo) }}" />
                        <h2 class="title">Welcome</h2>
                        <div class="login-form-item-outer">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <label>
                                <i class="fas fa-user"></i>
                                Email
                            </label>
                            @error('email')
                                <h6 class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </h6>
                            @enderror
                        </div>
                        <div class="login-form-item-outer">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
                            <label>
                                <i class="fas fa-lock"></i>
                                Password
                            </label>
                            @error('password')
                                <h6 class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </h6>
                            @enderror
                        </div>
                        <div class="forgot-password-link-outer">
                            <a href="{{ url('/forgot/password') }}" class="forgot-password-link">
                                forgot password
                            </a>
                        </div>
                        <div class="not-robot-outer">
                            <input type="checkbox" name="robot" id="robot" required>
                            <label for="robot">I am not a robot.</label>
                        </div>
                        <button type="submit" class="login-form-submit">Log In</button>
                        <a href="{{ route('register') }}" class="sign-in-link">Registration</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>
   // Input Validation For Animate Label
    $('.animate-label input').on('change', function(){
        if($(this).val().length > 0){
            $(this).addClass('filled');
        }else{
            $(this).removeClass('filled');
        }
        });

    $('.animate-label input').on('focusout', function(){
        if($(this).val().length > 0){
            $(this).removeClass('empty');
        }else{
            $(this).addClass('empty');
        }
    });

</script>
</body>
</html>
