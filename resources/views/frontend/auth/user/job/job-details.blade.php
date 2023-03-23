@extends('frontend.auth.master')

@section('title')
	Job Details
@endsection

@section('content')
    <section class="job-details-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="job-details-top">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="done-job-outer">
                                    <div class="done-job-left">
                                        <h5 class="title">DONE</h5>
                                        <h3 class="number">214 of 300</h3>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
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
                                        YOU CAN EARN <strong>$0.0420</strong>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <div class="job-details-form-item">
                        <div class="job-details-form-top">
                            <div class="left">
                                <h4 class="title">
                                    Full video watch
                                </h4>
                            </div>
                            <div class="right">
                                <a href="#" class="hide-btn-inner">Hide</a>
                            </div>
                        </div>
                        <img src="{{ asset('/frontend/') }}/assets/images/home-bg.png" alt="image" class="top-image">
                        <h4 class="job-details-text-title">
                            <i class="fas fa-list"></i>
                             What is expected from workers?
                        </h4>
                        <div class="job-details-text-outer" style="background:#e3e3e3;padding: 10px;border-radius:5px;">
                            <p class="job-details-text">
                                1. প্রথমে ইউটিউবে যাবেন তার পর সাচ করবেনmelbet অথবা melbet account opening অথবা melbet account registration যে কোন একটা লিখে সাচ করবেন, একটু নিচে গেলেই ভিডিও পেয়ে যাবেন Full video dek.
                            </p>
                            <p class="job-details-text">
                                2. সার্চ করে ভিডিও দেকতে হবে ইউটিউবে অবশ্যই থাম্বেল অর্থাৎ ছবির লেখার সাথে মিলিয়ে ভিডিওটি দেখবেন 2. Warning ⚠️ একজন ব্যক্তি একবার কাজ করতে পারবে দ্বিতীয়বার অন্য কোন ডিভাইস দিয়েও কাজ করতে পারবে না।
                            </p>
                        </div>
                        <div class="report-btn-outer">
                            <a href="{{ url('/job/report') }}" class="report-btn-inner">Report</a>
                        </div>
                    </div>
                    <div class="job-details-form-item">
                        <h4 class="job-details-text-title">
                            REQUIRED PROOF THAT TASK WAS FINISHED?
                        </h4>
                        <p class="job-details-text">
                            1. আগে ভালো করে পড়ুন তারপর কাজ করবেন। কাজে ভুল হলে পেমেন্ট পাবেন না। search করে ভিডিও দেকতে হবে channel এ গিয়ে দেকলে report মারবো or payment পাবেন না 2. ইউটিউবে সার্চ দিবেন( how to create melbet account bangla )থাম্বনেইল এর সাথে মিলিয়ে চ্যানেল খুজে পাওয়ার পর আপনার স্কিনের ঘড়ির টাইম সহ একটা স্কিনসট দিবেন 3. পুরো ভিডিও দেখবেন।একটা লাইক দিবেন, লিংক থেকে একাউন্ট খুলে অফার পেয়েছেন সুবিধা পেয়েছেন। এমন কমেন্ট, লাইক, সাবস্ক্রাইভ 4. ফুল ভিডিও দেখার পর স্কিনের ঘড়ির টাইম সহ ১ টা screenshots টাইম সহ দিবেন। ২ টা screenshots দিতে হবে। 5. বলতে হবে ফুল ভিডিওতে আই কার্ড কতগুলি এবং কত মিনিটের সময় শো হয়েছে এবং জন্ম তারিখ,জেলা ও প্রোমো কোড কত মিনিটের সময় বসানোফুল হয়েছিলো.মোট কতটি খেলা দেখা 6. .দয়া করে সততার সাথে কাজটি করবেন। সবকিছু ঠিক দেওয়ার পর আপনার নাম ও জিমেইল বলবেন, আমি ইউটিউব স্টুডিও থেকে আপনার জিমেইল ও নাম মিলাবো
                        </p>
                    </div>
                    <form action="" method="" class="job-details-form form-group">
                        <div class="job-details-form-item">
                            <h4 class="job-details-text-title">
                                Submit required work Prove
                            </h4>
                            <textarea name="prove_details" rows="5" cols="50" class="form-control"></textarea>
                        </div>
                        <div class="job-details-form-item">
                            <h4 class="job-details-text-title">
                                UPLOAD SCREENSHOT PROVE 
                            </h4>
                            <input type="file" name="screenshot" class="form-control">
                        </div>
                        <div class="job-details-form-item">
                            <h4 class="job-details-text-title">
                                UPLOAD SCREENSHOT PROVE 
                            </h4>
                            <input type="file" name="screenshot" class="form-control">
                        </div>
                        <button type="submit" class="job-details-form-sub-btn">Submit</button>
                    </form>                    
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page-scripts')
    <script type="text/javascript">

    </script>
@endpush
