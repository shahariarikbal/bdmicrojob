@extends('frontend.auth.master')

@section('title')
	Dashboard
@endsection

@push('meta')
    {{--  <meta http-equiv="refresh" content="10">  --}}
@endpush

@push('page-css')
    <style>
    /* #wrapper #content-wrapper .container-fluid {
        padding: 30px 30px 30px 30px !important;
    } */
      progress {
         width: 100%;
         height: 20px;
         accent-color: #6908ac;
      }
    </style>
@endpush

@section('content')

{{-- container-fluid pb-0 here --}}
<!-- <div class="container-fluid pb-0">
    <div class="top-mobile-search">
       <div class="row">
          <div class="col-md-12">
             <form class="mobile-search">
                <div class="input-group">
                   <input type="text" placeholder="Search for..." class="form-control">
                   <div class="input-group-append">
                      <button type="button" class="btn btn-dark"><i class="fas fa-search"></i></button>
                   </div>
                </div>
             </form>
          </div>
       </div>
    </div>
    <div class="video-block section-padding">
       <div class="row">
          <div class="col-md-12">
             <div class="main-title">
                <div class="btn-group float-right right-action">
                   <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Your Subscription : <b>{{ $user->membership->name ?? '' }}</b>
                   </a>
                </div>
                <h6>Featured Videos</h6>
             </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
             <div class="video-card">
                <div class="video-card-image">
                   <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                   <a href="#"><img class="img-fluid" src="{{ asset('backend/') }}/img/Rectangle 24.png" alt=""></a>
                   <span class="wdp-ribbon wdp-ribbon-three">New</span>
                </div>
                <div class="video-card-body">
                   <div class="video-title">
                      <a href="#">New Way Of Learning Online !</a>
                   </div>
                   <div class="video-page text-success">
                      <span class="education">Education</span> : <b class="earn">Earn BDT50</b>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
             <div class="video-card">
                <div class="video-card-image">
                   <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                   <a href="#"><img class="img-fluid" src="{{ asset('backend/') }}/img/Rectangle 29.png" alt=""></a>
                   <span class="wdp-ribbon wdp-ribbon-three">New</span>
                </div>
                <div class="video-card-body">
                 <div class="video-title">
                    <a href="#">New Way Of Learning Online !</a>
                 </div>
                 <div class="video-page text-success">
                    <span class="education">Education</span> : <b class="earn">Earn BDT50</b>
                 </div>
                </div>
             </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
             <div class="video-card">
                <div class="video-card-image">
                   <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                   <a href="#"><img class="img-fluid" src="{{ asset('backend/') }}/img/Rectangle 30.png" alt=""></a>
                </div>
                <div class="video-card-body">
                 <div class="video-title">
                    <a href="#">New Way Of Learning Online !</a>
                 </div>
                 <div class="video-page text-success">
                    <span class="education">Education</span> : <b class="earn">Earn BDT50</b>
                 </div>
                </div>
             </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
             <div class="video-card">
                <div class="video-card-image">
                   <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                   <a href="#"><img class="img-fluid" src="{{ asset('backend/') }}/img/Rectangle 31.png" alt=""></a>
                   <span class="wdp-ribbon wdp-ribbon-three">New</span>
                </div>
                <div class="video-card-body">
                 <div class="video-title">
                    <a href="#">New Way Of Learning Online !</a>
                 </div>
                 <div class="video-page text-success">
                    <span class="education">Education</span> : <b class="earn">Earn BDT50</b>
                 </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="video-block section-padding">
       <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
             <div class="custom-card-one">
                <div class="row">
                   <div class="col-md-4">
                    <img src="{{ asset('backend/') }}/img/Vector.png" style="height: 50px; margin-top: 25px; margin-left: 15px;"/>
                   </div>
                   <div class="col-md-8">
                    <p class="earn-box-one">How To Earn From Tarded24 ?</p>
                   </div>
               </div>
             </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
             <div class="custom-card-two">
                <div class="row">
                   <div class="col-md-4">
                      <div style="border: 2px solid #ffffff; height: 40px; margin-top: 25px; margin-left: 15px; border-radius: 8px; width: 50px;">
                         <img src="{{ asset('backend/') }}/img/Vector1.png" style="height: 20px; margin-top: 8px; margin-left: 15px;"/>
                      </div>
                   </div>
                   <div class="col-md-8">
                    <p class="earn-box-one">Watch Videos Now ! And Earn !</p>
                   </div>
               </div>
             </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
             <div class="custom-card-three">
                <div class="row">
                   <div class="col-md-4">
                    <img src="{{ asset('backend/') }}/img/Vector2.png" style="height: 50px; margin-top: 25px; margin-left: 15px;"/>
                   </div>
                   <div class="col-md-8">
                    <p class="earn-box-one">Share Links And Get Rewards !</p>
                   </div>
               </div>
             </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
             <div class="custom-card-four">
                <div class="row">
                   <div class="col-md-4">
                    <img src="{{ asset('backend/') }}/img/Vector3.png" style="height: 50px; margin-top: 25px; margin-left: 15px;"/>
                   </div>
                   <div class="col-md-8">
                    <p class="earn-box-one">Refer To Your Friend And Earn !</p>
                   </div>
               </div>
             </div>
          </div>
       </div>
    </div>
    <hr/>
    <div class="video-block section-padding">
       <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
             <div class="video-card">
                <div class="video-card-image">
                   <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                   <a href="#"><img class="img-fluid" src="{{ asset('backend/') }}/img/Rectangle 24.png" alt=""></a>
                </div>
                <div class="video-card-body">
                   <div class="video-title">
                      <a href="#">New Way Of Learning Online !</a>
                   </div>
                   <div class="video-page text-success">
                      <span class="education">Education</span> : <b class="earn">Earn BDT50</b>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
             <div class="video-card">
                <div class="video-card-image">
                   <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                   <a href="#"><img class="img-fluid" src="{{ asset('backend/') }}/img/Rectangle 29.png" alt=""></a>
                   <span class="wdp-ribbon wdp-ribbon-three">New</span>
                </div>
                <div class="video-card-body">
                 <div class="video-title">
                    <a href="#">New Way Of Learning Online !</a>
                 </div>
                 <div class="video-page text-success">
                    <span class="education">Education</span> : <b class="earn">Earn BDT50</b>
                 </div>
                </div>
             </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
             <div class="video-card">
                <div class="video-card-image">
                   <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                   <a href="#"><img class="img-fluid" src="{{ asset('backend/') }}/img/Rectangle 30.png" alt=""></a>
                   <span class="wdp-ribbon wdp-ribbon-three">New</span>
                </div>
                <div class="video-card-body">
                 <div class="video-title">
                    <a href="#">New Way Of Learning Online !</a>
                 </div>
                 <div class="video-page text-success">
                    <span class="education">Education</span> : <b class="earn">Earn BDT50</b>
                 </div>
                </div>
             </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
             <div class="video-card">
                <div class="video-card-image">
                   <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                   <a href="#"><img class="img-fluid" src="{{ asset('backend/') }}/img/Rectangle 31.png" alt=""></a>
                </div>
                <div class="video-card-body">
                 <div class="video-title">
                    <a href="#">New Way Of Learning Online !</a>
                 </div>
                 <div class="video-page text-success">
                    <span class="education">Education</span> : <b class="earn">Earn BDT50</b>
                 </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="video-block section-padding">
       <div class="row">
          <div class="col-xl-6 col-sm-6 mb-3">
             <div class="custom-earn1">
                <div class="row">
                   <div class="col-md-12">
                    <p class="earn-box-one" style="text-align: center; margin-top: 35px; font-size: 20px;">Your Total Earning : BDT </p>
                   </div>
               </div>
             </div>
          </div>
          <div class="col-xl-6 col-sm-6 mb-3">
             <div class="custom-earn2">
                <div class="row">
                   <div class="col-md-12">
                    <p class="earn-box-one" style="text-align: center; margin-top: 35px; font-size: 20px;">Your Refer Code Is: </p>
                   </div>
               </div>
             </div>
          </div>
       </div>
    </div>
    <div class="video-block section-padding">
       <div class="col-md-12">
          <div class="row">
             <div class="col-md-3" style="color: #545454; font-weight: 600;">Referral Earning : 250</div>
             <div class="col-md-3" style="color: #545454; font-weight: 600;">Other Earning : 300</div>
             <div class="col-md-3" style="color: #545454; font-weight: 600;">
                <u>Share With Friends</u>
             </div>
             <div class="col-md-3" style="color: #545454; font-weight: 600;">
                <u>Copy Refer Code</u>
             </div>
          </div>
       </div>
    </div>
    <hr/>

    <div class="video-block section-padding">
       <div class="row">
          <div class="col-xl-2 col-sm-6 mb-3"></div>
          <div class="col-xl-8 col-sm-6 mb-3">
             <div class="custom-earn2">
                <div class="row">
                   <div class="col-md-12">
                    <p class="earn-box-one" style="text-align: center; margin-top: 35px; font-size: 20px;">Membership Status : <b></b></p>
                   </div>
               </div>
             </div>
          </div>
          <div class="col-xl-2 col-sm-6 mb-3"></div>
       </div>
    </div>

    <div class="video-block section-padding">
       <div class="row">
        {{-- @dd($memeberships) --}}
{{--           @foreach ($memeberships as $key => $memebership)--}}

{{--            @php--}}
{{--              $color_class = 'one';--}}
{{--              if($key % 4 == 0) $color_class = 'one';--}}
{{--              if($key % 4 == 1) $color_class = 'two';--}}
{{--              if($key % 4 == 2) $color_class = 'three';--}}
{{--              if($key % 4 == 3) $color_class = 'four';--}}
{{--            @endphp--}}

            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="custom-card-" style="height: 300px;">
                    <a href="">
                        <div class="row">
                            <div class="col-md-12">
                            <p class="earn-box-one" style="margin-left: 50px;"> Subscriber</p>
                            <p class="earn-box-one" style="margin-left: 65px;"><span style="font-size: 24px;"></span>/Month</p>
{{--                            @foreach (json_decode($memebership->facilities) as $facilities)--}}
                            <p class="" style="margin-top: -12px; text-align: center; color: white;"></p>
{{--                            @endforeach--}}
                            <p class="" style="margin-top: -18px; text-align: center; color: white;">Fast Withdrawal</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
{{--           @endforeach--}}
       </div>
    </div>
 </div> -->
<div class="dashboard-section container-fluid">
    @php
        $auth_user = Auth::user();
    @endphp
    <input type="hidden" name="cart_count" id="cart_count" value="{{ $cart_count }}">
    <input type="hidden" name="add_to_cart_hours" id="add_to_cart_hours" value="{{ $add_to_cart_hours }}">
    <form action="{{ url('/cart/item/delete') }}" method="GET" id="cartItemDelete" class="d-none">
        @csrf
    </form>
    <input type="hidden" name="status" id="status" value="{{ $auth_user->status }}">
    <form action="{{ url('/user/activate/'.$auth_user->id) }}" method="GET" id="userActivate" class="d-none">
        @csrf
    </form>
    @php
        $auth_user = Auth::user();
        $blockDateTime = $auth_user->updated_at;
        $unblockDateTime = $auth_user->updated_at->addHours(6);
        $totalDuration = Carbon\Carbon::now()->diff($unblockDateTime)->format('%H hour(s):%I minutes(s):%S second(s)');
    @endphp
   <div class="row">
      <div class="col-md-10 m-auto">
         @if ($auth_user->status==1)
         <marquee>{{ $marquee_text->marquee_text }}</marquee>
         @elseif ($auth_user->status==0)
         <h4 style="color:red">You are temporarily blocked!! <a href="/unblock" class="btn btn-primary" onclick="return confirm('Are you sure? 2tk will taken as penalty!')">Instant Unblock</a></h4>
         <h5>You will be automatically unblocked after {{ $totalDuration  }}</h5>
         @endif
         <div class="job-items-wrapper">
            <form action="{{ url('/dashboard') }}" method="get" class="select-category-outer">
                @csrf
               <div class="input-group">
                  <select name="cat_id">
                     <option selected disabled>--- Select Category ---</option>
                      @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                      @endforeach
                  </select>
                  <button type="submit" class="btn btn-lg btn-info">Search</button>
               </div>
            </form>
             @foreach($posts as $post)
            @php
            $worker = \App\Models\PostSubmit::where('post_id', $post->id)->where('status','!=','2')->get()->count();
            $job_cart = \App\Models\Cart::where('post_id', $post->id)->count();
            $total_count = $worker+$job_cart;
            @endphp
            @if ($total_count<$post->worker_number)
                <a href="{{ url('/job/details/'.$post->id) }}" class="job-item-outer">
                    <div class="job-item-left">
                        <h5 class="job-title">
                            {{ $post->title }}
                        </h5>
                    </div>
                    <div class="job-item-center">
                        <div class="progress-label">
                            {{ $total_count }} OF {{ $post->worker_number }}
                        </div>
                        <progress value="{{ $total_count }}" max="{{ $post->worker_number }}"></progress>
                        <!-- <div class="progress">
                            @if ($worker >= 100)
                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="{{ $worker }}" aria-valuemin="0" aria-valuemax="{{ $post->worker_number }}"></div>
                            @else
                            <div class="progress-bar" role="progressbar" style="width: {{ $worker }}%" aria-valuenow="{{ $worker }}" aria-valuemin="0" aria-valuemax="{{ $post->worker_number }}"></div>
                            @endif
                        </div> -->
                    </div>
                    <div class="job-item-right">
                        <h4 class="totla-earning">
                            ৳ {{ $post->category->worker_earning }}
                        </h4>
                    </div>
                </a>
                @endif
                @endforeach
         </div>
      </div>
   </div>
</div>
@endsection

@push('page-scripts')
    <script type="text/javascript">
        let status = document.getElementById('status').value;
        let c_status = parseInt(status);
        let cart_count = document.getElementById('cart_count').value;
        let c_cart_count = parseInt(cart_count);
        let add_to_cart_hours = document.getElementById('add_to_cart_hours').value;
        let c_add_to_cart_hours = parseInt(add_to_cart_hours);
            if(c_cart_count>0 && c_add_to_cart_hours>=1){
                setInterval(function(){
                        document.getElementById('cartItemDelete').submit();
                }, 1000);
            }

            if(c_status==0){
                setInterval(function(){
                    document.getElementById('userActivate').submit();
                }, 10000);
            }
    </script>
@endpush

@push('page-scripts')
    <script type="text/javascript">

    </script>
@endpush
