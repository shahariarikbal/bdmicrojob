@extends('frontend.master')

@section('contain')
<section class="banner-section">
    <div class="container">
        <div class="banner-content-wrapper">
            <h1 class="banner-title">faq</h1>
            <ul class="banner-item">
                <li>
                    <a href="{{ url('/') }}">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:void(0)">
                        FAQ
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>
<section class="faq-section pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-12 m-auto faq-content">
                <div class="accordion" id="accordionExample">
                    @foreach($faqs as $faq)
                    <div class="accordion-item mb-2">
                        <h2 class="accordion-header" id="headingOne{{ $faq->id }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $faq->id }}" aria-expanded="false" aria-controls="collapseOne">
                                {{ $faq->question }}
                            </button>
                        </h2>
                        <div id="collapseOne{{ $faq->id }}" class="accordion-collapse collapse show" aria-labelledby="headingOne{{ $faq->id }}" data-bs-parent="#accordionExample" style="">
                            <div class="accordion-body">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
