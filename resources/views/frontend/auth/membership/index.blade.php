@extends('frontend.auth.master')

@section('title')
    Membership
@endsection

@push('page-css')

@endpush

@section('content')
<div class="container-fluid pb-0">
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
                <h6>Upgrate your membership package</h6>
             </div>
          </div>
       </div>
    </div>
    <div class="video-block section-padding">
       <div class="row">
          <div class="col-xl-2 col-sm-6 mb-3"></div>
          <div class="col-xl-8 col-sm-6 mb-3">
             <div class="custom-earn2">
                <div class="row">
                   <div class="col-md-12">
                    <p class="earn-box-one" style="text-align: center; margin-top: 35px; font-size: 20px;">Membership Status : <b>{{ $user->membership->name ?? '' }}</b></p>
                   </div>
               </div>
             </div>
          </div>
          <div class="col-xl-2 col-sm-6 mb-3"></div>
       </div>
    </div>

    <div class="video-block section-padding">
       <div class="row">
           @foreach ($memeberships as $memebership)
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="{{ $loop->index % 4 == 0 ? 'custom-card-one' : '' || $loop->index % 4 == 1 ? 'custom-card-two' : '' || $loop->index % 4 == 2 ? 'custom-card-three' : '' || $loop->index % 4 == 0 ? 'custom-card-four' : '' }}" style="height: 300px;">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="earn-box-one" style="margin-left: 50px;">{{ $memebership->name }} Subscriber</p>
                            <p class="earn-box-one" style="margin-left: 65px;"><span style="font-size: 24px;">{{ $memebership->per_month_charge }}</span>/Month</p>
                            @foreach (json_decode($memebership->facilities) as $facilities)
                            <p class="" style="margin-top: -12px; text-align: center; color: white;">{{ $facilities }}</p>
                            @endforeach
                            <p class="" style="margin-top: -18px; text-align: center; color: white;">Fast Withdrawal</p>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/user/subscription/'.$memebership->id) }}"
                    class="btn btn-sm btn-primary"
                    style="margin-left: 79px;margin-top: 20px;">Upgrate</a>
            </div>
           @endforeach
       </div>
    </div>
 </div>
@endsection
