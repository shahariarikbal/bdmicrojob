@extends('frontend.auth.master')

@section('title')
	Dashboard
@endsection

@push('page-css')
    <style>
    #wrapper #content-wrapper .container-fluid {
        padding: 30px 30px 30px 120px !important;
    } 

    </style>
@endpush

@section('content')

{{-- container-fluid pb-0 here --}}
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
                     Your Subscription : <b>{{ Auth::user()->membership ? Auth::user()->membership->name : 'No membership'  }}</b>
                   </a>
                </div>
                <h6>Featured Videos</h6>
             </div>
          </div>

          {{-- @dd($videos) --}}
          @foreach ($videos as $video)
          <div class="col-xl-3 col-sm-6 mb-3">
             <div class="video-card">
                <div class="video-card-image">
                   <a onclick="record_time_save_record({{ $video->id }})" class="play-icon" style="cursor: pointer"  data-toggle="modal" data-target="#video{{ $video->id }}"><i class="fas fa-play-circle"></i></a>
                   <a href="#">
                    {{-- <img class="img-fluid" src="{{ asset('backend/') }}/img/Rectangle 24.png" alt=""> --}}

                    <iframe width=100% height="200" src="https://www.youtube.com/embed/{{ $video->video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </a>
                   <span class="wdp-ribbon wdp-ribbon-three">New</span>
                </div>
                <div class="video-card-body">
                   <div class="video-title">
                      <a style="cursor: pointer"  data-toggle="modal" data-target="#video{{ $video->id }}">{{ $video->title }}</a>
                   </div>
                   <div class="video-page text-success">
                      <span class="education"></span><b class="earn">Earn BDT {{ Auth()->user()->membership->per_video_cost ?? '' }}</b>
                   </div>
                </div>
             </div>
          </div>



          <!-- Modal -->
          <div class="modal fade" id="video{{ $video->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">
                    {{ $video->title }} 
                    <span class="text-success">Time Left 
                      <span id="time_left{{ $video->id }}">2</span><span class="text-success">s</span>
                    </span></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" >&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                    <iframe src="https://www.youtube.com/embed/{{ $video->video_link }}?rel=0&modestbranding=1&autohide=1&mute=1&showinfo=0&controls=0&autoplay=1"  width=100% height="315"  frameborder="0" allowfullscreen></iframe>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

          @endforeach
       </div>
    </div>
 </div>
@endsection

@push('page-scripts')

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
      //save e record for watched video
      let watched_video_ids = [];


      //jodi modal open hoi tahole counter komao
      function record_time_save_record(video_id){

        // jodi ei video already dekhe fele then stop here
        if(watched_video_ids.includes(video_id)){
          toastr.error('You have already watched this video');
          return;
        }

        // few second pore shuru koro, jate modal data dhora jai
        setTimeout(function () {

          // 1 second por por time calculate koro 
          console.clear();
          const myInterval = setInterval(myTimer, 1000);

          function myTimer() {

            // jodi modal khola thake tahole timer 30 theke 0 porjonto komao
            let modal_display = document.querySelector('#video' + video_id).style.display;
            let time_left = document.querySelector('#time_left' + video_id);


            if( modal_display == 'block' && Number(time_left.innerHTML) > 0){
              time_left.innerHTML = Number(time_left.innerHTML) - 1;
            }else{

              // jodi ei video age na dekhe and timer 0 hole ei record db te store koro
              // modal must open thakte hobe
              if (!watched_video_ids.includes(video_id) &&  modal_display == 'block') {

                axios.get('{{ url("/user/watched-video/" . Auth::user()->id ?? '') }}/' + video_id)
                .then(response=>{
                  console.log(response.data)
                  if (response.data.status == 'success') {
                    toastr.success(response.data.message);
                    watched_video_ids.push(video_id);

                    // total_income update koro
                    document.querySelector('#total_income').innerHTML = response.data.total_income != null ? response.data.total_income : 0;
                  }else if (response.data.status == 'error'){
                    toastr.error(response.data.message);
                  }


                }).catch(error=>{
                  console.log(error)
                })

              } 

              // stop this counter
              myStopFunction();
            }
            // console.log(document.querySelector('#video' + video_id).style.display)
          }

          function myStopFunction() {
            clearInterval(myInterval);

          }
        }, 2000);

      }

    </script>

@endpush
