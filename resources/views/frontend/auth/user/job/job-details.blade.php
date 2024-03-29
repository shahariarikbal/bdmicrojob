@extends('frontend.auth.master')

@section('title')
	Job Details
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
    <section class="job-details-section">
        <form action="{{ url('/cart/item/delete') }}" method="GET" id="cartItemDelete" class="d-none">
            @csrf
        </form>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="job-details-top">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="done-job-outer">
                                    <div class="done-job-left">
                                        <h5 class="title">DONE</h5>
                                        <h3 class="number">{{ $totalPostSubmit+$userAddToCart }} of {{ $postDetail->worker_number }}</h3>
                                        <progress value="{{ $totalPostSubmit+$userAddToCart }}" max="{{ $postDetail->worker_number }}"></progress>
                                        <!-- <div class="progress">
                                            @if ($totalPostSubmit >= 100)
                                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="{{ $totalPostSubmit }}" aria-valuemin="0" aria-valuemax="{{ $postDetail->worker_number }}"></div>
                                             @else
                                            <div class="progress-bar" role="progressbar" style="width: {{ $totalPostSubmit }}%" aria-valuenow="{{ $totalPostSubmit }}" aria-valuemin="0" aria-valuemax="{{ $postDetail->worker_number }}"></div>
                                            @endif
                                        </div> -->
                                    </div>
                                    <div class="done-job-right">
                                        <span class="icon-outer">
                                            <i class="fas fa-check-circle"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="earn-money-outer">
                                    <h3>
                                        YOU CAN EARN <strong>৳ {{ $postDetail->category->worker_earning }}</strong>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (!$isPostSubmit && ($totalPostSubmit<$postDetail->worker_number))
                        <div class="job-details-form-item">
                            <div class="job-details-form-top">
                                <div class="left">
                                    <h4 class="title">
                                        {{ $postDetail->title }}
                                    </h4>
                                </div>
                                <div class="right">
                                    @php
                                        $auth_user = Auth::user();
                                    @endphp
                                    <a href="{{ url('/dashboard') }}" class="hide-btn-inner">Hide</a>
                                    @if ($cart_count==0)
                                    <a href="{{ url('/add/to/cart/'.$auth_user->id. '/'.$postDetail->id) }}" class="hide-btn-inner" style="background-color: red">Add Favourite</a>
                                    @endif
                                    <a href="{{ url('/user/details/'.$postDetail->user_id) }}" class="hide-btn-inner" style="background-color: deeppink">User Details</a>
                                </div>
                            </div>
                            <img src="{{ asset('/thumbnail/'.$postDetail->avatar) }}" alt="image" class="top-image">
                            <h4 class="job-details-text-title">
                                <i class="fas fa-list"></i>
                                What is expected from workers?
                            </h4>
                            @foreach($postDetail->specificTasks as $task)
                                <div class="job-details-text-outer" style="background:#e3e3e3;padding: 10px;border-radius:5px; margin-top: 10px;">
                                    <p class="job-details-text">
                                        {{ $task->specific_task }}
                                    </p>
                                </div>
                            @endforeach
                            <div class="report-btn-outer">
                                <a href="{{ url('/job/report/'.$postDetail->id) }}" class="report-btn-inner">Report On Job</a>
                                @if ($is_reported<=0)
                                <a href="{{ url('/job-poster/report/'.$postDetail->id) }}" class="report-btn-inner">Report On Job Poster</a>
                                @endif
                            </div>
                        </div>
                        <div class="job-details-form-item">
                            <h4 class="job-details-text-title">
                                REQUIRED PROOF THAT TASK WAS FINISHED?
                            </h4>
                            <p class="job-details-text">
                                1. {{ $postDetail->required_task }}
                            </p>
                        </div>
                        <form action="{{ url('/post/submit/'.$postDetail->id) }}" method="post" class="job-details-form form-group" enctype="multipart/form-data">
                            @csrf
                            <div class="job-details-form-item">
                                <h4 class="job-details-text-title">
                                    Submit required work Prove
                                </h4>
                                <textarea name="work_prove" rows="5" cols="50" class="form-control"></textarea>
                            </div>
                            <div class="job-details-form-item">
                                <h4 class="job-details-text-title">
                                    UPLOAD SCREENSHOT PROVE
                                </h4>
                                @for ($i = 1; $i<=$postDetail->required_screenshot; $i++)
                                <label for="images[]">Screenshot {{ $i }}</label>
                                <input type="file" name="images[]" multiple class="form-control" required>
                                @endfor
                                {{--  <input type="file" name="images[]" multiple class="form-control">  --}}
                            </div>
                            <button type="submit" class="job-details-form-sub-btn">Submit</button>
                        </form>
                        @elseif ($totalPostSubmit>=$postDetail->worker_number)
                        <div class="alert alert-danger">Job limit is finished!</div>
                        @else
                        <div class="alert alert-success">You already done this job</div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page-scripts')
    <script type="text/javascript">
            {{--  setInterval(function(){
                document.getElementById('cartItemDelete').submit();
            }, 3600);  --}}
        // window.onload = function(){
        //     document.getElementById('cartItemDelete').submit();
        // }
    </script>
@endpush
