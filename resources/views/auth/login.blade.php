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
        .login-sec-left-wave{
            position: fixed;
            bottom: 0;
            left: 0;
            height: 100%;
            z-index: -1;
        }

        .login-content-wrapper{
            width: 100vw;
            height: 100vh;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap :7rem;
            padding: 0 2rem;
        }

        .login-contant-left{
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .login-content-right{
            display: flex;
            justify-content: flex-start;
            align-items: center;
            text-align: center;
        }

        .login-contant-left img{
            width: 500px;
        }

        .login-form{
            width: 100%;
            max-width: 360px;
        }

        .login-content-right img{
            height: 100px;
        }

        .login-content-right h2{
            margin: 15px 0;
            color: #333;
            text-transform: uppercase;
            font-size: 2.9rem;
        }

        .login-content-right .login-form-outer{
            position: relative;
            display: grid;
            grid-template-columns: 7% 93%;
            margin: 25px 0;
            padding: 5px 0;
            border-bottom: 2px solid #d9d9d9;
        }


        .login-form-outer .icon{
            color: #d9d9d9;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-form-outer .icon i{
            transition: .3s;
        }

        .login-form-outer > div{
            position: relative;
            height: 45px;
        }

        .login-form-outer > div > h5{
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 18px;
            transition: .3s;
        }

        .login-form-outer:before, .login-form-outer:after{
            content: '';
            position: absolute;
            bottom: -2px;
            width: 0%;
            height: 2px;
            background-color: #7e41c2;
            transition: .4s;
        }

        .login-form-outer:before{
            right: 50%;
        }

        .login-form-outer:after{
            left: 50%;
        }

        .login-form-outer.focus:before, .login-form-outer.focus:after{
            width: 50%;
        }

        .login-form-outer.focus > div > h5{
            top: -5px;
            font-size: 15px;
        }

        .login-form-outer.focus > .login-form-outer .icon > i{
            color: #38d39f;
        }

        .login-form-outer .login-form-input input{
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            border: none;
            outline: none;
            background: none;
            padding: 0.5rem 0.7rem;
            font-size: 1.2rem;
            color: #555;
            font-family: 'poppins', sans-serif;
        }

        .forgot-pass-link{
            display: block;
            text-align: right;
            text-decoration: none;
            color: #999;
            font-size: 0.9rem;
            transition: .3s;
        }

        .forgot-pass-link:hover{
            color: #38d39f;
        }

        .login-form-submit{
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
        .login-form-submit:hover{
            color: #fff;
        }

        .sign-in-link {
            text-decoration: none;
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            background: #9a9a9a;
            padding: 5px 20px;
            border-radius: 30px;
        }

        @media screen and (max-width: 1050px){
            .container{
                grid-gap: 5rem;
            }
        }

        @media screen and (max-width: 1000px){
            .login-content-right h2{
                font-size: 2.4rem;
                margin: 8px 0;
            }

            .login-contant-left img{
                width: 400px;
            }
        }

        @media screen and (max-width: 900px){
            .login-content-wrapper{
                grid-template-columns: 1fr;
            }

            .login-contant-left{
                display: none;
            }

            .login-sec-left-wave{
                display: none;
            }

            .login-content-right{
                justify-content: center;
            }
        }
    </style>
</head>
<body>
<section class="login-section">
    <img class="login-sec-left-wave" src="https://raw.githubusercontent.com/sefyudem/Responsive-Login-Form/master/img/wave.png">
    <div class="login-content-wrapper">
        <div class="login-contant-left">
            <img src="https://raw.githubusercontent.com/sefyudem/Responsive-Login-Form/master/img/bg.svg">
        </div>
        <div class="login-content-right">
            <form action="{{ route('login') }}" method="POST" class="form-group login-form">
                @csrf
                <img src="https://raw.githubusercontent.com/sefyudem/Responsive-Login-Form/master/img/avatar.svg">
                <h2 class="title">Welcome</h2>
                <div class="login-form-outer">
                    <div class="icon">
                      <i class="fas fa-envelope"></i>
                    </div>
                    <div class="login-form-input">
                      <h5>Email</h5>
                      <input id="email" type="email" name="email" class="input @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <h6 class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </h6>
                        @enderror
                    </div>
                </div>
                <div class="login-form-outer">
                    <div class="icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="login-form-input">
                      <h5>Password</h5>
                      <input id="password" type="password" name="password" class="input @error('password') is-invalid @enderror" required autocomplete="current-password">
                        @error('password')
                            <h6 class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </h6>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="login-form-submit">Sign in</button>
                <a href="{{ url('user/register') }}" class="sign-in-link">Sign Up</a>
            </form>
        </div>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>
    const inputs = document.querySelectorAll(".input");
    function addcl(){
        let parent = this.parentNode.parentNode;
        parent.classList.add("focus");
    }
    function remcl(){
        let parent = this.parentNode.parentNode;
        if(this.value == ""){
            parent.classList.remove("focus");
        }
    }
    inputs.forEach(input => {
        input.addEventListener("focus", addcl);
        input.addEventListener("blur", remcl);
    });

</script>
</body>
</html>
