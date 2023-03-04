@extends('frontend.master')

@section('contain')
<main>
    <section class="home-banner-section-wrapper">
        <div class="home-banner-image-outer">
            <img src="{{ asset('/frontend/') }}/assets/images/home-bg.png">
        </div>
        <div class="home-banner-content">
            <h2 class="banner-content">
                Get <span>Easy Earning</span> With Lots Of <span>Earning Sources</span>
            </h2>
        </div>
    </section>
    <section class="extra-earning-section-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-image-outer">
                        <img src="{{ asset('/frontend/') }}/assets/images/left-image.png">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="section-right-content">
                        <h3 class="right-content-title">
                            Get <span class="extra-color">Extra Earning</span> <span>Easy</span> And <span>Secured</span>
                        </h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Congue quam id a, nam ipsum euismod vulputate et aliquam. Tortor ipsum dolor sem venenatis. Nec sagittis eleifend sit sem enim arcu.
                        </p>
                        <p>
                            Nisl placerat ultrices malesuada tristique nullam quam. In ac, scelerisque sed enim etiam nunc commodo sapien.
                        </p>
                        <p>
                            Tortor ipsum dolor sem venenatis. Nec sagittis eleifend sit sem enim arcu. Eget faucibus vitae mauris convallis felis, sed dolor massa.
                        </p>
                    </div>
                    <div class="learn-more-btn-outer">
                        <button type="button" class="learn-more-btn-inner">Learn More</button>
                    </div>
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
                            Awesome <span class="extra-color">Features</span> With <span>Amazing Bonuses</span>
                        </h3>
                        <ul class="feature-section-list">
                            <li class="feature-section-list-item">
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
                            </li>
                        </ul>
                    </div>
                    <div class="learn-more-btn-outer">
                        <button type="button" class="learn-more-btn-inner">Learn More</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-image-outer">
                        <img src="{{ asset('/frontend/') }}/assets/images/right-image.png">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="video-section-wrapper">
        <div class="container">
            <div class="col-md-8 m-auto">
                <div class="video-section-top-content">
                    <h3 class="video-section-top-title">
                        How <span class="extra-color">Tarded24</span> Works ? And How You Can <span>Get Paid ?</span>
                    </h3>
                    <div class="video-section-top-des-outer">
                        <p class="video-section-top-des">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Congue quam id a, nam ipsum euismod vulputate et aliquam. Tortor ipsum dolor sem venenatis. Nec sagittis eleifend sit sem enim arcu
                        </p>
                        <p class="video-section-top-des">
                            Tortor ipsum dolor sem venenatis. Nec sagittis eleifend sit sem enim arcu. Eget faucibus vitae mauris convallis felis, sed dolor massa.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="video-section-outer">
            <div class="video-section-image-outer">
                <img src="{{ asset('/frontend/') }}/assets/images/video-bg.png">
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
                    <span>Sign Up Now</span> & Get Busy With Lots Of <span class="extra-color">Earning Sources</span>
                </h3>
                <p class="signup-now-section-des">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Congue quam id a, nam ipsum euismod vulputate et aliquam. Tortor ipsum dolor sem venenatis. Nec sagittis eleifend sit sem enim arcu.
                </p>
                <div class="section-btn-outer">
                    <button type="button" class="section-btn-inner">
                        Go To The Dashboard
                    </button>
                </div>
            </div>
        </div>
    </section>
    <section class="faq-section-wrapper">
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
    </section>
</main>
@endsection
