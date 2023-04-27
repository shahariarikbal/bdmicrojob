@extends('frontend.master')

@section('contain')
<main>
    <section class="home-banner-section-wrapper">
        <div class="home-banner-image-outer">
            <img src="{{ asset('/homepage/'.$homepage->slider_image) }}">
        </div>
        <div class="home-banner-content">
            <h2 class="banner-content" style="color:blue">
                {{--  Get <span>Easy Earning</span> With Lots Of <span>Earning Sources</span>  --}}
                {{ $homepage->slider_title }}
            </h2>
        </div>
    </section>
    {{-- <section class="counter-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="counter-item-outer">
                        <h4 class="counter-title">Page Views</h4>
                        <h3 class="counter-number">{{ $visitorCount ?? 0 }}</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="counter-item-outer">
                        <h4 class="counter-title">Total Users</h4>
                        <h3 class="counter-number">{{ $userCount ?? 0 }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="extra-earning-section-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-image-outer">
                        <img src="{{ asset('/homepage/'.$homepage->first_image) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="section-right-content">
                        <h3 class="right-content-title">
                            {{--  Get <span class="extra-color">Extra Earning</span> <span>Easy</span> And <span>Secured</span>  --}}
                            <span>{{ $homepage->first_image_title }}</span>
                        </h3>
                        {!! $homepage->first_image_description !!}
                    </div>
                    {{-- <div class="learn-more-btn-outer">
                        <button type="button" class="learn-more-btn-inner">Learn More</button>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <section class="feature-section-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-left-content">
                        <h3 class="left-content-title">
                            {{--  Awesome <span class="extra-color">Features</span> With <span>Amazing Bonuses</span>  --}}
                            <span class="extra-color">{{ $homepage->second_image_title }}</span>
                        </h3>
                        <ul class="feature-section-list">
                            {!! $homepage->second_image_description !!}
                            {{--  <li class="feature-section-list-item">
                                <img src="{{ asset('/frontend/') }}/assets/images/point.png">
                                Too Easy To Use Anytime Anywhere Around
                            </li>
                            <li class="feature-section-list-item">
                                <img src="{{ asset('/frontend/') }}/assets/images/point.png">
                                Amazing Interface For Beginners And Ametures
                            </li>
                            <li class="feature-section-list-item">
                                <img src="{{ asset('/frontend/') }}/assets/images/point.png">
                                Extraa Income Anytime Anywhere
                            </li>
                            <li class="feature-section-list-item">
                                <img src="{{ asset('/frontend/') }}/assets/images/point.png">
                                Watch Videos And Get Rewards Instantly
                            </li>
                            <li class="feature-section-list-item">
                                <img src="{{ asset('/frontend/') }}/assets/images/point.png">
                                Share Links And Get Bonus
                            </li>
                            <li class="feature-section-list-item">
                                <img src="{{ asset('/frontend/') }}/assets/images/point.png">
                                Get Instantly Paid Via Bank Or E-wallet
                            </li>  --}}
                        </ul>
                    </div>
                    {{-- <div class="learn-more-btn-outer">
                        <button type="button" class="learn-more-btn-inner">Learn More</button>
                    </div> --}}
                </div>
                <div class="col-md-6">
                    <div class="right-image-outer">
                        <img src="{{ asset('/homepage/'.$homepage->second_image) }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="recent-activitis-section">
        <div class="container">
            <div class="section-title-outer">
                <h5 class="subtitle">
                    BDMicrojob
                </h5>
                <h1 class="title">
                    Recent Activity
                </h1>
            </div>
            <div class="recent-activity-items-wrapper">
                @foreach ($job_posts as $job_post )
                @php
                    $worker = \App\Models\PostSubmit::where('post_id', $job_post->id)->where('status', '!=' ,'2')->get()->count();
                @endphp
                @if ($worker < $job_post->worker_number)
                <a href="{{ url('/dashboard') }}" class="recent-activity-item-outer">
                    <div class="text-right text-blue">Posted Date: {{ date('m-d-Y', strtotime($job_post->created_at)) }}</div>
                    <div class="item-title">
                        <span>{{ $job_post->title }} </span>
                    </div>
                    <div class="item-content">
                        <div class="item-left-content">
                            <span>
                                {{ $job_post->user->name }}
                            </span>
                        </div>
                        <div class="item-center-content">
                            <div class="progress-label">
                                {{ $worker }} OF {{ $job_post->worker_number }}
                            </div>
                            <div class="progress">
                                @if ($worker >= 100)
                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="{{ $worker }}" aria-valuemin="0" aria-valuemax="{{ $job_post->worker_number }}"></div>
                                @else
                                <div class="progress-bar" role="progressbar" style="width: {{ $worker }}%" aria-valuenow="{{ $worker }}" aria-valuemin="0" aria-valuemax="{{ $job_post->worker_number }}"></div>
                                @endif
                            </div>
                        </div>
                        <div class="item-right-content">
                            <div class="totla-earning">
                                BDT <b>{{ $job_post->category->worker_earning }}</b>
                            </div>
                        </div>
                    </div>
                </a>
                @endif
                @endforeach
                {{--  <div class="recent-activity-item-outer">
                    <div class="text-right text-blue">6 minutes ago</div>
                    <div class="item-title">
                        <span>Install and Register App </span>
                    </div>
                    <div class="item-content">
                        <div class="item-left-content">
                            <span>
                                Rasel
                            </span>
                        </div>
                        <div class="item-center-content">
                            <div class="progress-label">
                                20 OF 24
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="item-right-content">
                            <div class="totla-earning">
                                $ <b>0.0200</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="recent-activity-item-outer">
                    <div class="text-right text-blue">6 minutes ago</div>
                    <div class="item-title">
                        <span>Install and Register App </span>
                    </div>
                    <div class="item-content">
                        <div class="item-left-content">
                            <span>
                                Rasel
                            </span>
                        </div>
                        <div class="item-center-content">
                            <div class="progress-label">
                                20 OF 24
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 35%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="item-right-content">
                            <div class="totla-earning">
                                $ <b>0.0200</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="recent-activity-item-outer">
                    <div class="text-right text-blue">6 minutes ago</div>
                    <div class="item-title">
                        <span>Install and Register App </span>
                    </div>
                    <div class="item-content">
                        <div class="item-left-content">
                            <span>
                                Rasel
                            </span>
                        </div>
                        <div class="item-center-content">
                            <div class="progress-label">
                                20 OF 24
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="item-right-content">
                            <div class="totla-earning">
                                $ <b>0.0200</b>
                            </div>
                        </div>
                    </div>
                </div>  --}}
            </div>
        </div>
    </section>
    <section class="video-section-wrapper">
        <div class="container">
            <div class="col-md-8 m-auto">
                <div class="video-section-top-content">
                    <h3 class="video-section-top-title">
                        {{--  How <span class="extra-color">BD Micro Jobs</span> Works ? And How You Can <span>Get Paid ?</span>  --}}
                        <span>{{ $homepage->how_works_title }}</span>
                    </h3>
                    <div class="video-section-top-des-outer">
                        {{--  <p class="video-section-top-des">  --}}
                            {!! $homepage->how_works_description !!}
                        {{--  </p>  --}}
                        {{--  <p class="video-section-top-des">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Congue quam id a, nam ipsum euismod vulputate et aliquam. Tortor ipsum dolor sem venenatis. Nec sagittis eleifend sit sem enim arcu
                        </p>
                        <p class="video-section-top-des">
                            Tortor ipsum dolor sem venenatis. Nec sagittis eleifend sit sem enim arcu. Eget faucibus vitae mauris convallis felis, sed dolor massa.
                        </p>  --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="video-section-outer">
            <div class="video-section-image-outer">
                <img src="{{ asset('/homepage/'.$homepage->footer_image) }}">
            </div>
            <div class="video-icon-outer">
                <i class="fas fa-play-circle"></i>
            </div>
        </div>
    </section>
    <section class="signup-now-section-wrapper">
        <div class="container">
            <div class="col-md-8 m-auto">
                <h3 class="signup-now-section-title">
                    {{--  <span>Sign Up Now</span> & Get Busy With Lots Of <span class="extra-color">Earning Sources</span>  --}}
                    <span class="extra-color">{{ $homepage->footer_title }}</span>
                </h3>
                <p class="signup-now-section-des">
                    {!! $homepage->footer_description !!}
                </p>
                <div class="section-btn-outer">
                    <button type="button" class="section-btn-inner">
                        Go To The Dashboard
                    </button>
                </div>
            </div>
        </div>
    </section>
    <section class="counter-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="counter-item-outer">
                        <h4 class="counter-title">Page Views</h4>
                        <h3 class="counter-number">{{ $visitorCount ?? 0 }}</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="counter-item-outer">
                        <h4 class="counter-title">Total Users</h4>
                        <h3 class="counter-number">{{ $userCount ?? 0 }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="faq-section-wrapper">
        <div class="container">
            <div class="col-md-8 m-auto">
                <h3 class="faq-section-title">
                    Check <span>Frequently Asked Questions</span> For <span class="extra-color">More Info</span>
                </h3>
                <p class="faq-section-des">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Congue quam id a, nam ipsum euismod vulputate et aliquam. Tortor ipsum dolor sem venenatis. Nec sagittis eleifend sit sem enim arcu.
                </p>
                <div class="faq-section-btn-outer">
                    <button type="button" class="faq-section-btn-inner">
                        See FAQs
                    </button>
                </div>
            </div>
        </div>
    </section> --}}
</main>
@endsection
