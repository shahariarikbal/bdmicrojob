<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Askbootstrap" />
        <meta name="author" content="Askbootstrap" />
        <title>@yield('title', 'Dashboard')</title>

        <link rel="icon" type="image/png" href="{{ asset('backend') }}/img/favicon.png" />

        @include('frontend.auth.includes.css')


        @stack('page-css')
    </head>
    <body id="page-top">


        @include('frontend.auth.includes.nav')




		<div id="wrapper">


        	@include('frontend.auth.includes.sidebar')

			<div id="content-wrapper">

	        	@yield('content')

	        	{{-- @include('frontend.auth.includes.footer') --}}
			</div>
		</div>





        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>





        @include('frontend.auth.includes.logout-modal')



        @include('frontend.auth.includes.scripts')

        @stack('page-scripts')
    </body>
</html>
