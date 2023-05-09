@extends('frontend.auth.master')

@section('title')
	User Details
@endsection

@push('page-css')
    <style>
        .demo-preview {
            padding-top: 100px;
            padding-bottom: 10px;
            margin: auto;
            width: 50%;
            text-align: center;
        }
        .progress {
            background-color: #f5f5f5;
            border-radius: 3px;
            box-shadow: none;
        }
        .progress.progress-xs {
            height: 5px;
            margin-top: 5px;
        }
        .progress.progress-sm {
            height: 10px;
            margin-top: 5px;
        }
        .progress.progress-lg {
            height: 25px;
        }
        .progress.vertical {
            position: relative;
            width: 80px;
            height: 230px;
            display: inline-block;
            margin-right: 10px;
        }
        .progress.vertical > .progress-bar {
            width: 100% !important;
            position: absolute;
            bottom: 0;
        }
        .progress.vertical.progress-xs {
            width: 5px;
            margin-top: 5px;
        }
        .progress.vertical.progress-sm {
            width: 10px;
            margin-top: 5px;
        }
        .progress.vertical.progress-lg {
            width: 80px;
        }
        .progress-bar {
            background-color: #2196f3;
            box-shadow: none;
            width: 80px;
        }
        .progress-bar.text-left {
            text-align: left;
        }
        .progress-bar.text-left span {
            margin-left: 10px;
        }
        .progress-bar.text-right {
            text-align: right;
        }
        .progress-bar.text-right span {
            margin-right: 10px;
        }
        @-webkit-keyframes progress-bar-stripes {
            from {
                background-position: 40px 0;
            }
            to {
                background-position: 0 0;
            }
        }
        @keyframes progress-bar-stripes {
            from {
                background-position: 40px 0;
            }
            to {
                background-position: 0 0;
            }
        }
        .progress.active .progress-bar, .progress-bar.active {
            -webkit-animation: progress-bar-stripes 2s linear infinite;
            -o-animation: progress-bar-stripes 2s linear infinite;
            animation: progress-bar-stripes 2s linear infinite;
        }
        .progress-striped .progress-bar, .progress-bar-striped {
            background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
            background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
            background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
            background-size: 40px 40px;
        }
        .progress-bar-secondary {
            background-color: #323a45;
        }
        .progress-bar-default {
            background-color: #b0bec5;
        }
        .progress-bar-success {
            background-color: #64dd17;
        }
        .progress-bar-info {
            background-color: #29b6f6;
        }
        .progress-bar-warning {
            background-color: #ffd600;
        }
        .progress-bar-danger {
            background-color: #ef1c1c;
        }

        .performance-chart{
            font-size: 25px;
            text-align: center;
            text-transform: capitalize;
            color: green;
            font-weight: 600;
            border-bottom: 2px solid;
        }

        /*.container{*/
        /*    width: 20em;*/
        /*    background-color: rgb(255, 255, 255);*/
        /*    overflow: hidden;*/
        /*    border-radius: 1em;*/
        /*    text-align: center;*/
        /*    font-family: 'Open Sans Condensed', sans-serif;*/
        /*    font-size: 1em;*/
        /*}*/

        /*.user-image{*/
        /*    padding: 3em 0;*/
        /*    background-image: linear-gradient(70deg,#61A1DD,#0083FD);*/
        /*}*/

        /*.user-image img{*/
        /*    width: 7em;*/
        /*    height: 7em;*/
        /*    border-radius: 50%;*/
        /*    box-shadow:  0 0.6em 1.8em ;*/
        /*    object-fit: cover;*/
        /*}*/

        /*.content{*/
        /*    color: #565656;*/
        /*    padding: 2.2em;*/
        /*}*/

        /*.name{*/
        /*    font-size: 1.5em;*/
        /*    text-transform: uppercase;*/
        /*}*/

        /*.username{*/
        /*    font-size: 1em;*/
        /*    color: #9e9e9e;*/
        /*}*/

        /*.links{*/
        /*    display: flex;*/
        /*    justify-content: center;*/
        /*    margin: 1.5em 0;*/
        /*}*/

        /*a{*/
        /*    text-decoration: none;*/
        /*    color: #565656;*/
        /*    transition: all 0.3s;*/
        /*    font-size: 2em;*/
        /*    margin-right: 1.2em;*/
        /*}*/

        /*a:last-child{*/
        /*    margin: 0;*/
        /*}*/

        /*.insta:hover{*/
        /*    color:rgb(255, 70, 101);*/
        /*    transform: scale(2,2);*/
        /*}*/

        /*.git:hover{*/
        /*    color:rgb(0, 0, 0);*/
        /*    transform: scale(2,2);*/
        /*}*/

        /*.linkedin:hover{*/
        /*    color:rgba(4, 0, 253, 0.842);*/
        /*    transform: scale(2,2);*/
        /*}*/

        /*.facebook:hover{*/
        /*    color:rgb(4, 0, 255);*/
        /*    transform: scale(2,2);*/
        /*}*/

        /*.details{*/
        /*    margin-bottom: 1.8em;*/
        /*}*/


        /*!* CSS for messagin link *!*/

        /*.effect {*/
        /*    text-align: center;*/
        /*    display: inline-block;*/
        /*    position: relative;*/
        /*    text-decoration: none;*/
        /*    color: rgb(48, 41, 41);*/
        /*    text-transform: capitalize;*/
        /*    width: 100%;*/
        /*    background-image: linear-gradient(60deg,#0083FD,#61A1DD);*/
        /*    font-size: 1.2em;*/
        /*    padding: 1em 3em;*/
        /*    border-radius: 5em;*/
        /*    overflow: hidden;*/
        /*}*/

        /*.effect.effect-4:before {*/
        /*    content: "\f2b6";*/
        /*    font-family: FontAwesome;*/
        /*    display: flex;*/
        /*    align-items: center;*/
        /*    justify-content: center;*/
        /*    position: absolute;*/
        /*    top: 0;*/
        /*    left: 0;*/
        /*    width: 100%;*/
        /*    height: 100%;*/
        /*    text-align: center;*/
        /*    font-size: 1.8em;*/
        /*    transform: scale(0, 1);*/
        /*}*/
        /*.effect.effect-4:hover {*/
        /*    text-indent: -9999px;*/
        /*}*/

        /*.effect.effect-4:hover:before {*/
        /*    transform: scale(1, 1);*/
        /*    text-indent: 0;*/
        /*}*/

        /*===== User profile css =====*/
        img {
            max-width: 100%;
            display: block;
        }
        ul {
            list-style: none;
        }

        /* Utilities */
        .card::after,
        .card img {
            border-radius: 50%;
        }
        .card,
        .stats {
            display: flex;
        }

        .card {
            padding: 2.5rem 2rem;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, .5);
            box-shadow: 0 0 30px rgba(0, 0, 0, .15);
            margin: 1rem;
            position: relative;
            transform-style: preserve-3d;
            overflow: hidden;
        }
        .card::before,
        .card::after {
            content: '';
            position: absolute;
            z-index: -1;
        }
        .card::before {
            width: 100%;
            height: 100%;
            border: 1px solid #FFF;
            border-radius: 10px;
            top: -.7rem;
            left: -.7rem;
        }
        .card::after {
            height: 15rem;
            width: 15rem;
            background-color: #4172f5aa;
            top: -8rem;
            right: -8rem;
            box-shadow: 2rem 6rem 0 -3rem #FFF
        }

        .card img {
            width: 8rem;
            min-width: 80px;
            box-shadow: 0 0 0 5px #FFF;
        }

        .infos {
            margin-left: 1.5rem;
        }

        .name {
            margin-bottom: 1rem;
        }
        .name h2 {
            font-size: 1.3rem;
        }
        .name h4 {
            font-size: .8rem;
            color: #333
        }

        .text {
            font-size: .9rem;
            margin-bottom: 1rem;
        }

        .stats {
            margin-bottom: 1rem;
        }
        .stats li {
            min-width: 5rem;
        }
        .stats li h3 {
            font-size: .99rem;
        }
        .stats li h4 {
            font-size: .75rem;
        }

        .links button {
            font-family: 'Poppins', sans-serif;
            min-width: 120px;
            padding: .5rem;
            border: 1px solid #222;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: all .25s linear;
        }
        .links .follow,
        .links .view:hover {
            background-color: #222;
            color: #FFF;
        }
        .links .view,
        .links .follow:hover{
            background-color: transparent;
            color: #222;
        }

        @media screen and (max-width: 450px) {
            .card {
                display: block;
            }
            .infos {
                margin-left: 0;
                margin-top: 1.5rem;
            }
            .links button {
                min-width: 100px;
            }
        }
        /*===== User profile css =====*/
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
                           <div class="col-md-7">
{{--                               <div class="container" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">--}}
{{--                                   <div class="user-image mt-2">--}}
{{--                                       <img src="https://imageio.forbes.com/specials-images/imageserve/627bd323672c41ea74c88a13/0x0.jpg?format=jpg&crop=1834,1833,x583,y167,safe&height=416&width=416&fit=bounds" alt="this image contains user-image">--}}
{{--                                   </div>--}}

{{--                                   <div class="content">--}}
{{--                                       <h3 class="name">{{ $user->name }}</h3>--}}
{{--                                       <p class="username" style="font-weight: 600; font-size: 15px;">{{ $user->email }}</p>--}}

{{--                                       <p class="details" style="font-weight: 600; font-size: 15px;">--}}
{{--                                           Job Post Report <span class="badge badge-danger" style="font-size: 20px">{{ $user->job_post_report }}</span>--}}
{{--                                       </p>--}}
{{--                                       <p class="details" style="font-weight: 600; font-size: 15px;">--}}
{{--                                           Total Job Post <span class="badge badge-danger" style="font-size: 20px">{{ $user->job_post_report }}</span>--}}
{{--                                       </p>--}}
{{--                                       <p class="details" style="font-weight: 600; font-size: 15px;">--}}
{{--                                           Total Accepted <span class="badge badge-danger" style="font-size: 20px">100</span>--}}
{{--                                       </p>--}}
{{--                                       <p class="details" style="font-weight: 600; font-size: 15px;">--}}
{{--                                           Total Rejected <span class="badge badge-danger" style="font-size: 20px">30</span>--}}
{{--                                       </p>--}}
{{--                                   </div>--}}
{{--                               </div>--}}

                               <div class="card">
                                   <div class="img">
                                       <img src="https://images.unsplash.com/photo-1610216705422-caa3fcb6d158?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDB8fGZhY2V8ZW58MHwyfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60">
                                   </div>
                                   <div class="infos">
                                       <div class="name">
                                           <h2>Bradley Steve</h2>
                                           <h4>@bradsteve</h4>
                                       </div>
                                       <ul class="stats">
                                           <li>
                                               <h3>15K</h3>
                                               <h4>Total Post</h4>
                                           </li>
                                           <li>
                                               <h3>82</h3>
                                               <h4>Accepted Post</h4>
                                           </li>
                                           <li>
                                               <h3>1.3M</h3>
                                               <h4>Rejected Post</h4>
                                           </li>
                                       </ul>
{{--                                       <div class="links">--}}
{{--                                           <button class="follow">Follow</button>--}}
{{--                                           <button class="view">View profile</button>--}}
{{--                                       </div>--}}
                                   </div>
                               </div>
                           </div>
                           <div class="col-md-5" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; border-radius: 5px">
                               <h2 class="performance-chart">Performance chart</h2>
                               <div class="demo-preview">
                                   <div class="progress vertical">
                                       <div role="progressbar" style="height: 95%;" title="95%" class="progress-bar progress-bar-success"><span class="sr-only"></span></div>
                                   </div>
                                   <div class="progress vertical">
                                       <div role="progressbar" style="height: 50%;" title="50%" class="progress-bar progress-bar-danger"><span class="sr-only"></span>
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
