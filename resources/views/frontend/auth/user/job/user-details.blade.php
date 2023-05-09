@extends('frontend.auth.master')

@section('title')
	User Details
@endsection

@push('page-css')
    <style>
        /*===== User profile css =====*/
        .user-details-outer {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        .user-details-outer .img img {
            width: 100%;
            max-width: 140px;
            border-radius: 50%;
        }
        .user-details-outer .img {
            margin-right: 25px;
        }
        .user-details-outer .name h2 {
            font-size: 22px;
            font-weight: 600;
            color: #000;
        }
        .user-details-outer .name h4 {
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 500;
            color: #333;
        }
        .user-details-outer .name {
            margin-bottom: 0;
        }
        .user-details-outer .name h4 a {
            color: #3a34c8;
        }
        .user-details-infos {
            text-align: center;
            margin-top: 10px;
        }
        .user-details-infos .stats {
            display: flex;
            align-items: center;
            justify-content: center;
            padding-left: 0;
            margin-bottom: 0;
        }
        .user-details-infos .stats li {
            margin-right: 40px;
            list-style: none;
        }
        .user-details-infos .stats li:last-child {
            margin-right: 0;
        }
        .user-details-infos .stats li h3 {
            font-size: 25px;
            font-weight: 600;
            color: #fff;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #6908ac 0%, #1755de 100%);
            line-height: 50px;
            border-radius: 50%;
            margin: auto;
        }
        .user-details-infos .stats li h4 {
            font-size: 14px;
            font-weight: 500;
            color: #333;
            margin-top: 10px;
        }
        .user-details-wrap {
            padding: 2rem 2rem;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, .5);
            box-shadow: 0 0 30px rgba(0, 0, 0, .15);
            position: relative;
            transform-style: preserve-3d;
            overflow: hidden;
            margin-bottom: 20px;
        }
        .user-details-wrap::before,
        .user-details-wrap::after {
            content: '';
            position: absolute;
            z-index: -1;
        }
        .user-details-wrap::before {
            width: 100%;
            height: 100%;
            border: 1px solid #FFF;
            border-radius: 10px;
            top: -.7rem;
            left: -.7rem;
        }
        .user-details-wrap::after {
            height: 15rem;
            width: 15rem;
            background-color: #4172f5aa;
            top: -8rem;
            right: -8rem;
            box-shadow: 2rem 6rem 0 -3rem #FFF;
            border-radius: 50%;
        }
        /*===== User profile css =====*/
        /*===== Custom Progress bar css =====*/
        .custom-progress-bar-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .custom-progress-bar-outer {
            margin-right: 30px;
        }
        .user-performance-chart-wrap {
            padding: 1rem 2rem;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, .5);
            box-shadow: 0 0 30px rgba(0, 0, 0, .15);
            position: relative;
            transform-style: preserve-3d;
            overflow: hidden;
            margin-bottom: 20px;
        }
        .custom-progress-bar-outer:last-child {
            margin-right: 0;
        }
        .custom-progress-bar-outer .progress.vertical {
            height: 200px;
            width: 80px;
            position: relative;
        }
        .custom-progress-bar-outer .progress.vertical .progress-bar {
            position: absolute;
            bottom: 0;
            width: 100%;
            left: 0;
        }
        .custom-progress-bar-outer .label {
            font-size: 14px;
            font-weight: 600;
            text-align: center;
            color: #000;
            margin-top: 5px;
            margin-bottom: 0;
        }
        .performance-chart-title {
            text-align: center;
            font-size: 25px;
            font-weight: 600;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #5b16b5;
            color: #000;
        }
        /*===== Custom Progress bar css =====*/
        @media screen and (max-width : 576px){
            .user-details-outer {
                display: inline-block;
                text-align: center;
            }
            .user-details-outer .img {
                margin-right: 0;
                margin-bottom: 20px;
            }
            .user-details-infos .stats {
                display: inline-block;
            }
            .user-details-infos .stats li {
                margin-right: 0;
                margin-bottom: 15px;
            }
            .user-details-outer .name h2 {
                font-size: 18px;
            }
            .user-details-outer .name h4 {
                font-size: 14px;
                font-weight: 400;
            }
            .performance-chart-title {
                font-size: 18px;
            }
        }
    </style>
@endpush

@section('content')
    <section class="job-report-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 m-auto">
                    <div class="job-report-wrapper">
                        <h4 class="job-report-title">
                            User Details
                        </h4>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="user-details-wrap card">
                                    <div class="user-details-outer">
                                        <div class="img">
                                           <img src="{{ asset('/user/'.$user->avatar) }}" alt="user">
                                        </div>
                                        <div class="name">
                                           <h2>Name : {{ $user->name }}</h2>
                                           <h4>
                                               Email : <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                           </h4>
                                       </div>
                                    </div>
                                   <div class="user-details-infos">
                                       <ul class="stats">
                                           <li>
                                               <h3>{{ $userPostCount }}</h3>
                                               <h4>Total Job</h4>
                                           </li>
                                           <li>
                                               <h3>{{ $userApprovedPostCount }}</h3>
                                               <h4>Accepted Job</h4>
                                           </li>
                                           <li>
                                               <h3>{{ $userRejectPostCount }}</h3>
                                               <h4>Rejected Job</h4>
                                           </li>
                                           <li>
                                               <h3>{{ $user->job_post_report }}</h3>
                                               <h4>Job Report</h4>
                                           </li>
                                       </ul>
{{--                                       <div class="links">--}}
{{--                                           <button class="follow">Follow</button>--}}
{{--                                           <button class="view">View profile</button>--}}
{{--                                       </div>--}}
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-6 col-md-12">
                               <div class="user-performance-chart-wrap">
                                   <h2 class="performance-chart-title">Performance chart</h2>
                                   <div class="custom-progress-bar-wrap">
                                       <div class="custom-progress-bar-outer">
                                           <div class="progress vertical">
                                               <div role="progressbar" style="height: {{ $userApprovedPostCount }}%;background: #42ba96;" class="progress-bar progress-bar-success"></div>
                                           </div>
                                           <p class="label">Approved</p>
                                       </div>
                                       <div class="custom-progress-bar-outer">
                                           <div class="progress vertical">
                                               <div role="progressbar" style="height: {{ $userRejectPostCount }}%;background: red;" class="progress-bar progress-bar-success"></div>
                                           </div>
                                           <p class="label">Rejected</p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page-scripts')
    <script type="text/javascript">

    </script>
@endpush
