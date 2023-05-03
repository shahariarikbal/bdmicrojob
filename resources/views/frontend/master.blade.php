<!DOCTYPE html>
<html>
<head>
    {!! $setting->adsense_code !!}
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BD Micro Jobs</title>
	@include('frontend.includes.style')
	@stack('forum-css')
</head>
<body>
	@include('frontend.includes.header')

	@yield('contain')

	@include('frontend.includes.footer')

    @include('frontend.includes.script')
</body>
</html>
