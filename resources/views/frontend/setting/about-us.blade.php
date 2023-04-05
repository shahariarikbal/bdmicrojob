@extends('frontend.master')

@section('contain')
<section class="banner-section">
    <div class="container">
        <div class="banner-content-wrapper">
            <h1 class="banner-title">About Us</h1>
            <ul class="banner-item">
                <li>
                    <a href="{{ url('/') }}">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:void(0)">
                        About
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>
<section class="terms-condition-section">
    <div class="container">
        <div class="terms-condition-content-wrapper">
            @foreach ($about_us as $about )
            <h4 class="content-title">
                <i class="far fa-hand-point-right"></i>
                {{ $about->title }}
            </h4>
            {!! $about->long_description !!}
            @endforeach
        </div>
    </div>
</section>
@endsection
