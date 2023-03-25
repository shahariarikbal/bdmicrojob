<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Askbootstrap" />
        <meta name="author" content="Askbootstrap" />
        <title>@yield('title', 'Admin')</title>

        <link rel="icon" type="image/png" href="{{ asset('backend') }}/img/favicon.png" />

        @include('backend.includes.css')


        @stack('page-css')
    </head>
    <body id="page-top">


        @include('backend.includes.nav')




		<div id="wrapper">


        	@include('backend.includes.sidebar')

			<div id="content-wrapper">

	        	@yield('content')

	        	{{-- @include('backend.includes.footer') --}}
			</div>
		</div>





        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>





        @include('backend.includes.logout-modal')



        @include('backend.includes.scripts')

        @stack('page-scripts')
    </body>
</html>
