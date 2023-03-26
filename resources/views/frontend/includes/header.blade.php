<header class="header-main">
    <nav class="nav-main">
        <!-- logo start -->
        <a href="{{ url('/') }}" class="header-main-logo">
             <img src="{{ asset('/frontend/') }}/assets/logo/bd jobs.png" style="height: 70px;" />
{{--            BD<span>Microjob</span>--}}
        </a>
        <!-- logo End -->
        <!-- Small Device btn start -->
        <div class="nav-toggle-btn">
            <div class="btn-inner"></div>
        </div>
        <!-- Small Device btn End -->
        <!-- Nav items start -->
        <ul class="nav-items-wrapper">
            <li class="nav-item-main">
                <a class="nav-item-main-link active" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item-main">
                <a class="nav-item-main-link" href="{{ url('/about') }}">
                    About us
                </a>
            </li>
            <li class="nav-item-main">
                <a class="nav-item-main-link" href="#">
                    How It Works
                </a>
            </li>
            <li class="nav-item-main">
                <a class="nav-item-main-link" href="{{ url('/faq') }}">FAQ</a>
            </li>
            </li>
            <li class="nav-item-main">
                <a class="nav-item-main-link" href="{{ url('/contact') }}">
                  Contact Us
                </a>
            </li>
            <li class="nav-item-main">
                @if(!Auth::check())


                  <a class="nav-item-main-link hide-item" href="{{ url('/user/register/form') }}" style="cursor: pointer;">Login / Register</a>

                @else

                  <a class="nav-item-main-link hide-item" onclick="document.querySelector('#logout').submit()" style="cursor: pointer;">Logout</a>
                @endif
            </li>
        </ul>
        <!-- Nav items End --><div class="header-social-icon">
            <ul class="social-icon-list">
                <li class="social-icon-list-item">
                    <a href="" class="social-icon-item-link">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="social-icon-list-item">
                    <a href="" class="social-icon-item-link">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="social-icon-list-item">
                    <a href="" class="social-icon-item-link">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="login-register-btn-outer">
            @if(!Auth::check())

              <button onclick="location.href='{{ url('user/register/form') }}'" class="login-register-btn" name="button" type="button" style="cursor: pointer;">Login / Register</button>

            @else

              <button onclick="document.querySelector('#logout').submit()" class="login-register-btn" name="button" type="button" style="cursor: pointer;">Logout</button>
            @endif
        </div>
    </nav>
</header>


<form action="{{ url('logout') }}" method="post" class="d-none" id="logout">
  @csrf

</form>

<div class="sign-in-modal">
    <div class="inner--sign-in-modal">
      <div class="val-info">
        <span class="overlay sign-in-side"></span>
        <div class="tab tab-sign-in active">
          Login
        </div>
        <div class="tab tab-sign-up">
          Register
        </div>
      </div>
      <div class="content-info">
        <div class="content-sign-in">
          <div class="wrap--content-sign-in">
            <div class="greetings">
              Welcome back, be sure to login in order to proceed.
            </div>

            <form class="" action="index.html" method="post">

              <div class="input-control">
                <input type="text" name="" value="" placeholder="Email">
              </div>
              <div class="input-control">
                <input type="text" name="" value="" placeholder="Password">
              </div>
              <button type="submit" name="button"> Login </button>
            </form>

            <div class="close-login">
              Close <span>[</span><span>x</span><span>]</span>
            </div>

          </div>
        </div>
        <div class="content-sign-up">
          <div class="wrap--content-sign-up">
            <div class="greetings">
              Welcome Mr(s) <span class="greetings-name"></span> <span class="greetings-surname"></span>
            </div>

            <form class="" action="index.html" method="post">
              <div class="input-control">
                <input type="text" name="" value="" class="input-firstname" placeholder="First Name">
              </div>
              <div class="input-control">
                <input type="text" name="" value="" class="input-lastname" placeholder="Last Name">
              </div>
              <div class="input-control">
                <input type="text" name="" value="" placeholder="Email">
              </div>
              <div class="input-control">
                <input type="text" name="" value="" placeholder="Password">
              </div>
              <button type="submit" name="button"> Register </button>
            </form>

            <div class="close-login">
              Close <span>[</span><span>x</span><span>]</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
