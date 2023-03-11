<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Askbootstrap">
      <meta name="author" content="Askbootstrap">
      <title>BD Micro Jobs</title>
      <link rel="icon" type="image/png" href="img/favicon.png">
      <link href="{{ asset('/backend/') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="{{ asset('/backend/') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href="{{ asset('/backend/') }}/css/osahan.css" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('/backend/') }}/vendor/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="{{ asset('/backend/') }}/vendor/owl-carousel/owl.theme.css">

      {{-- toastr --}}
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />



      <style type="text/css">
         .full-height, .login-main-wrapper {
             height: calc({{ Request::route()->getName() == 'login' ? 100 : 140}}vh - 0rem) !important;
         }

         @if (Request::route()->getName() == 'register')
            .login-main-right {
               padding: 122px 52px !important;
            }
         @endif
      </style>

   </head>
   <body class="login-main-body">
      <section class="login-main-wrapper">
         <div class="container-fluid pl-0 pr-0">
            <div class="row no-gutters">
               <div class="col-md-5 p-5 bg-white full-height">
                  <div class="login-main-left">
                     <div class="text-center mb-5 login-main-left-header pt-4">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('/frontend/') }}/assets/logo/GLOBAL.png" style="height: 80px;"/>
                        </a>
                        <h5 class="mt-3 mb-3">{{ Request::route()->getName() == 'login' ? 'Welcome' : 'Register' }} to Global Earn Money</h5>
                        <p>Get Easy Earning With Lots Of Earning Sources <br> Awesome Features With Amazing Bonuses.</p>
                     </div>


                     @if (Request::route()->getName() == 'login')


                        <form action="{{ url('/login') }}" method="POST">

                           @csrf
                           

                           

                           <div class="form-group">
                              <label class="text-capitalize">email</label>
                              <input type="email" name="email" class="form-control" placeholder="Enter email" required>



                              @if ($errors->has('email'))
                                 <div class="text-danger">{{ $errors->first('email') }}</div>
                              @endif


                           </div>

                           

                           <div class="form-group">
                              <label class="text-capitalize">password</label>
                              <input type="password" name="password" class="form-control" placeholder="Enter password" required>



                              @if ($errors->has('password'))
                                 <div class="text-danger">{{ $errors->first('password') }}</div>
                              @endif


                           </div>
                           
                           <div class="mt-4">
                              <div class="row">
                                 <div class="col-12">
                                    <button type="submit" class="btn btn-outline-primary btn-block btn-lg">Sign In</button>
                                 </div>
                              </div>
                           </div>
                        </form>
                        <div class="text-center mt-5">
                           <p class="light-gray">Don’t have an account? <a href="{{ url('register') }}">Sign Up</a></p>
                        </div>

                     @else

                        {{-- register --}}

                        <form action="{{ url('/register') }}" method="post" enctype="multipart/form-data">

                           @csrf
                           

                           <div class="form-group">
                              <label class="text-capitalize">name</label>
                              <input type="text" name="name" class="form-control" placeholder="Enter name" required>

                              @if ($errors->has('name'))
                                 <div class="text-danger">{{ $errors->first('name') }}</div>
                              @endif
                           </div>
                           

                           <div class="form-group">
                              <label class="text-capitalize">email</label>
                              <input type="email" name="email" class="form-control" placeholder="Enter email" required>



                              @if ($errors->has('email'))
                                 <div class="text-danger">{{ $errors->first('email') }}</div>
                              @endif


                           </div>
                           

                           <div class="form-group">
                              <label class="text-capitalize">phone</label>
                              <input type="text" name="phone" class="form-control" placeholder="Enter phone" required>



                              @if ($errors->has('phone'))
                                 <div class="text-danger">{{ $errors->first('phone') }}</div>
                              @endif


                           </div>
                           

                           <div class="form-group">
                              <label class="text-capitalize">password</label>
                              <input type="password" name="password" class="form-control" placeholder="Enter password" required>



                              @if ($errors->has('password'))
                                 <div class="text-danger">{{ $errors->first('password') }}</div>
                              @endif


                           </div>
                           

                           <div class="form-group">
                              <label class="text-capitalize">Confirm Password</label>
                              <input type="password" name="password_confirmation" class="form-control" placeholder="Enter password" required>



                              @if ($errors->has('password'))
                                 <div class="text-danger">{{ $errors->first('password') }}</div>
                              @endif


                           </div>
                           

                           <div class="form-group">
                              <label class="text-capitalize">avatar</label>
                              <input type="file" name="avatar" class="form-control-file" required>



                              @if ($errors->has('avatar'))
                                 <div class="text-danger">{{ $errors->first('avatar') }}</div>
                              @endif


                           </div>

                           <div class="mt-4">
                              <div class="row">
                                 <div class="col-12">
                                    <button type="submit" class="btn btn-outline-primary btn-block btn-lg">Sign Up</button>
                                 </div>
                              </div>
                           </div>
                        </form>
                        <div class="text-center mt-5">
                           <p class="light-gray">Already have an account? <a href="{{ url('/login') }}">Sign In</a></p>
                        </div>

                     @endif

                  </div>
               </div>
               <div class="col-md-7 full-height">
                  <div class="login-main-right bg-white p-5 mt-5 mb-5">
                     <div class="owl-carousel owl-carousel-login">
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="{{ asset('/backend/') }}/img/login.png" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">​Watch videos offline</h5>
                              <p class="mb-4">when an unknown printer took a galley of type and scrambled<br> it to make a type specimen book. It has survived not <br>only five centuries</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="{{ asset('/backend/') }}/img/login.png" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">Download videos effortlessly</h5>
                              <p class="mb-4">when an unknown printer took a galley of type and scrambled<br> it to make a type specimen book. It has survived not <br>only five centuries</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="{{ asset('/backend/') }}/img/login.png" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">Create GIFs</h5>
                              <p class="mb-4">when an unknown printer took a galley of type and scrambled<br> it to make a type specimen book. It has survived not <br>only five centuries</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      {{-- <script src="{{ asset('/backend/') }}/vendor/jquery/jquery.min.js" type="d2e5d5ec9e690d3951a1c613-text/javascript"></script> --}}

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

      {{-- toastr --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


      <script src="{{ asset('/backend/') }}/vendor/bootstrap/js/bootstrap.bundle.min.js" type="d2e5d5ec9e690d3951a1c613-text/javascript"></script>
      <script src="{{ asset('/backend/') }}/vendor/jquery-easing/jquery.easing.min.js" type="d2e5d5ec9e690d3951a1c613-text/javascript"></script>
      <script src="{{ asset('/backend/') }}/vendor/owl-carousel/owl.carousel.js" type="d2e5d5ec9e690d3951a1c613-text/javascript"></script>



      <script src="{{ asset('/backend/') }}/js/custom.js" type="d2e5d5ec9e690d3951a1c613-text/javascript"></script>
      <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js"
      data-cf-settings="d2e5d5ec9e690d3951a1c613-|49" defer=""></script>
      <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"6e1902b6ab83880e","version":"2021.12.0","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}' crossorigin="anonymous"></script>




    {{-- toastr --}}
    <script type="text/javascript">    
       @if (Session::has('Success'))
           toastr.options = {
             "closeButton": true,
             "debug": false,
             "newestOnTop": false,
             "progressBar": true,
             "positionClass": "toast-top-right",
             "preventDuplicates": false,
             "onclick": null,
             "showDuration": "300",
             "hideDuration": "1000",
             "timeOut": "5000",
             "extendedTimeOut": "1000",
             "showEasing": "swing",
             "hideEasing": "linear",
             "showMethod": "fadeIn",
             "hideMethod": "fadeOut"
           }   
          toastr.success('{{Session::get('Success')}}');
       @endif
       @if (Session::has('Error'))
           toastr.options = {
             "closeButton": true,
             "debug": false,
             "newestOnTop": false,
             "progressBar": true,
             "positionClass": "toast-top-right",
             "preventDuplicates": false,
             "onclick": null,
             "showDuration": "300",
             "hideDuration": "1000",
             "timeOut": "5000",
             "extendedTimeOut": "1000",
             "showEasing": "swing",
             "hideEasing": "linear",
             "showMethod": "fadeIn",
             "hideMethod": "fadeOut"
           }   
          toastr.error('{{Session::get('Error')}}');
       @endif
    </script>

   </body>

   {{-- @dd($errors) --}}
</html>
