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
                    <div class="accordion-item mb-2">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Watch the video fully?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                            <div class="accordion-body">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur asperiores quisquam necessitatibus, illum iure eaque cumque ut non aliquid impedit voluptas! Culpa similique voluptatum asperiores illum explicabo, libero minus esse.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-2">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Watch the video fully?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
                            <div class="accordion-body">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur asperiores quisquam necessitatibus, illum iure eaque cumque ut non aliquid impedit voluptas! Culpa similique voluptatum asperiores illum explicabo, libero minus esse.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-2">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Watch the video fully?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample" style="">
                            <div class="accordion-body">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur asperiores quisquam necessitatibus, illum iure eaque cumque ut non aliquid impedit voluptas! Culpa similique voluptatum asperiores illum explicabo, libero minus esse.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-2">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Watch the video fully?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample" style="">
                            <div class="accordion-body">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur asperiores quisquam necessitatibus, illum iure eaque cumque ut non aliquid impedit voluptas! Culpa similique voluptatum asperiores illum explicabo, libero minus esse.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-2">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Watch the video fully?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample" style="">
                            <div class="accordion-body">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur asperiores quisquam necessitatibus, illum iure eaque cumque ut non aliquid impedit voluptas! Culpa similique voluptatum asperiores illum explicabo, libero minus esse.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                Watch the video fully?
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample" style="">
                            <div class="accordion-body">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis molestiae exercitationem dolorem dicta voluptate dolores mollitia nam hic. Fuga nostrum fugiat magni quidem excepturi asperiores deserunt dicta tenetur enim magnam.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
