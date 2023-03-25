@extends('frontend.auth.master')

@section('title')
	My Code
@endsection

@push('page-css')
                                    <style>
    #wrapper #content-wrapper .container-fluid {
        padding: 30px 30px 30px 120px !important;
        /* min-height: 110vh; */
    }

    .video-block-parent{
    	position: relative;
    }
    .video-block1{
    	/*position: absolute;*/
    	/*top: 50%;*/
    	/*left: 50%;*/
    	/*transform: translate(-50%,-50%);*/
    	width: 100%;
    	padding: 64px 0;
    	padding-bottom: 158px;
    }

    .custom-earn2{
    	width: 75% !important;
    	margin: 0 auto;
    }

    .earn-box-one{
    font-size: 28px !important;
    font-weight: 400 !important;
    margin: 29px auto !important;
}

    .video-block1 .image-block{
    /* margin-bottom: 15px; */
    padding-top: 0px;
}
    .video-block1 .image-block img{
    width: 250px;
    height: 250px;
    border-radius: 50%;
}
    .video-block1 .title{
    font-size: 40px;
    font-weight: 500;
    text-transform: capitalize;
    margin: 15px 0;
    color: #545454;
}


    .video-block1 .text-boxes{
    width: 50% !important;
    margin: 0 auto;
    /* margin-bottom: 85px; */
}
    .video-block1 .text-box{
    display: inline-block;
    margin-right: 29px;
}

.video-block1 .text-box:first-child {
    float: left;
}

.video-block1 .text-box:last-child {
    float: right;
}


    .video-block1 .text-box .icon{
    width: 25px;
    vertical-align: text-bottom;
}
    .video-block1 .text-box u{
    font-size: 28px;
    font-weight: 500;
    margin-left: 13px;
}

    </style>
@endpush

@section('content')

{{-- container-fluid pb-0 here --}}
<div class="container-fluid pb-0 video-block-parent">
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
                {{-- <h6>Featured Videos</h6> --}}
             </div>
          </div>
      </div>

    </div>

    <div class="video-block video-block1 section-padding text-center">

    	<div class="row">
    		<div class="col-md-12">
    			<div class="image-block">
    				<img src="{{asset('users/'.$user->avatar)}}" alt="">
    			</div>

                <h6 class="title">{{ auth()->user()->name }}</h6>
    		</div>
    	</div>


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
       <div class="col-md-12">
           <div class="row">
               <div class="col-md-2"></div>
               <div class="col-md-8">
                <div class="text-box" style="color: #545454; font-weight: 600; font-size: 15px;">
                    <img class="icon" src="{{asset('backend')}}/img/share.png" alt="">
                    <u>Share With Friends</u>
                 </div>
                 <div class="text-box" style="color: #545454; font-weight: 600; cursor: pointer;">
                    <img class="icon" src="{{asset('backend')}}/img/copy.png" alt="">
                    <u onclick="copyCode()">Copy Refer Code</u>
                    <input type="hidden" value="{{ $user->refer_code }}" id="referCode" />
                 </div>
               </div>
               <div class="col-md-2"></div>
           </div>
       	</div>
    </div>
 </div>
@endsection

@push('page-scripts')
    <script type="text/javascript">
        function copyCode() {
            /* Get the text field */
            var copyText = document.getElementById("referCode");

            /* Select the text field */
            copyText.select();

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);

            /* Alert the copied text */
            alert("Copied the text: " + copyText.value);
            }
    </script>
@endpush
