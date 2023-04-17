@extends('frontend.auth.master')

@section('title')
	Post Job
@endsection

@section('content')
<section class="post-job-section">
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="post-job-form-wrapper" style="position: relative;" id="postJob">
                    <div id="admission-loading" style="display: none" >
                        <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
                    </div>
                    @if ($form_step=='one')
                    <ul id="progressbar">
                        <li class="step active" id="personal"><strong>Select Category</strong></li>
                        <li class="step" id="professional"><strong>Budget & Setting</strong></li>
                        <li class="step" id="address"><strong>Job Information</strong></li>
                    </ul>
                    @elseif ($form_step=='two')
                    <ul id="progressbar">
                        <li class="step active" id="personal"><strong>Select Category</strong></li>
                        <li class="step active" id="professional"><strong>Budget & Setting</strong></li>
                        <li class="step" id="address"><strong>Job Information</strong></li>
                    </ul>
                    @endif
                    @if ($form_step=='one')
                    <form action="{{ url('/post/job/category/details') }}" method="get">
                        @csrf
                        <div class="row">
                            <div class="col-7">
                                <h2 class="fs-title">Job Post Form</h2>
                            </div>
                            <div class="col-5">
                                <h2 class="steps"></h2>
                            </div>
                        </div>
                        <hr>
                        <label for="title" class="mb-2">Select Category</label><span style="color: red; font-size: 16px;"> *</span><br>
                        <div class="category-items-wrap">
                            @foreach($categories as $category)
                                <div class="category-item-outer">
                                    <input type="radio" id="{{ 'cat'. $category->id }}" name="cat_id" value="{{ $category->id }}" onclick="categoryPrice(this)" class="category-item-radio">
                                    <label for="{{ 'car'. $category->name }}" class="category-item-label">{{ ucfirst($category->name) }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="job-post-sub-btn-outer">
                            <button type="submit" class="btn btn-primary">Next</button>
                        </div>
                    </form>
                    @elseif ($form_step=='two')
                    <form action="">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="left-content">
                                    <label for="worker_earn">Each worker Earn (tk)</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="text" name="worker_earn" id="worker_earn" value="{{ $cat_details->worker_earning }}" readonly class="form-control">
                                    <label for="worker_earn">Admin Commission (%)</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="text" name="price" id="price" value="{{ $cat_details->price }}" readonly class="form-control">
                                    <label for="worker_number">Worker Need</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="number" name="worker_number" onkeyup="totalWorkerEarn()" id="worker_number" min="1" placeholder="Minimum 1" class="form-control">
                                    <label for="total_cost">Total Cost in Tk</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="number" readonly name="total_cost" id="total_cost" placeholder="min 0.1" step="0.001" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="job-post-sub-btn-outer">
                            <button type="submit" class="btn btn-primary">Next</button>
                        </div>
                    </form>
                    @endif
                    {{--  <form action="{{ url('/post/store') }}" method="post" class="form-group" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-7">
                                <h2 class="fs-title">Job Post Form</h2>
                            </div>
                            <div class="col-5">
                                <h2 class="steps"></h2>
                            </div>
                        </div>
                        <hr>
                        <label for="title" class="mb-2">Select Category</label><span style="color: red; font-size: 16px;"> *</span><br>
                        <div class="category-items-wrap">
                            <!-- <div class="row">
                                @foreach($categories as $category)
                                <div class="col-md-2 p-0">
                                    <div class="category-item-outer">
                                        <input type="radio" id="{{ 'cat'. $category->id }}" name="cat_id" value="{{ $category->id }}" onclick="categoryPrice(this)" class="category-item-radio">
                                        <label for="{{ 'car'. $category->name }}" class="category-item-label">{{ ucfirst($category->name) }}</label>
                                    </div>
                                </div>
                                @endforeach
                            </div> -->
                            @foreach($categories as $category)
                                <div class="category-item-outer">
                                    <input type="radio" id="{{ 'cat'. $category->id }}" name="cat_id" value="{{ $category->id }}" onclick="categoryPrice(this)" class="category-item-radio">
                                    <label for="{{ 'car'. $category->name }}" class="category-item-label">{{ ucfirst($category->name) }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                 <label for="title">Write an accurate job Title</label><span style="color: red; font-size: 16px;"> *</span><br>
                                 <input type="text" name="title" placeholder="Write an accurate job Title" class="form-control">
                            </div>
                            <div class="col-md-12">
                                 <div class="task-outer">
                                    <label for="task">What specific tasks need to be Completed</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <textarea name="specific_task[]" id="tasks" rows="5" cols="50" class="form-control"></textarea>
                                    <a href="#" id="add-todo-item" class="btn btn-primary mb-3">Add Element</a>
                                 </div>
                                 <div class="more-task" id="moreTask"></div>
                            </div>
                            <div class="col-md-12">
                                 <div class="task-outer">
                                    <label for="required_task">Required proof the job was Completed</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <textarea name="required_task" id="required_task" rows="5" cols="50" class="form-control"></textarea>
                                 </div>
                            </div>
                            <div class="col-md-12">
                                 <div class="task-outer">
                                    <label for="task">Thumbnail Image</label><span style="color: red; font-size: 16px;"> *</span>
                                    <input type="file" name="avatar" class="form-control">
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="left-content">
                                    <label for="worker_number">Worker Need</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="number" name="worker_number" id="worker_number" min="1" placeholder="Minimum 1" class="form-control">
                                    <label for="worker_earn">Each worker Earn</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="number" name="worker_earn" id="worker_earn" onblur="totalWorkerEarn()" placeholder="min 0.1" min="0.1" step="0.001" class="form-control">
                                    <label for="total_cost">Total Cost</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="number" readonly name="total_cost" id="total_cost" placeholder="min 0.1" step="0.001" class="form-control">
                                    <label for="required_screenshot">Require Screenshots</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="number" name="required_screenshot" placeholder="0" min="1" max="2" class="form-control">
                                    <label for="estimated_date">Estimated Day</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="number" name="estimated_date" placeholder="7 day" min="1" max="7" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="job-post-sub-btn-outer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>  --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('page-scripts')
    <script type="text/javascript">
        //Add Task Js
        function addElement() {
            $("#moreTask").append("<div class='mb-3'><label>[ Max 150 character ]</label><textarea name='specific_task[]' rows='5' cols='50' class='form-control mb-2'></textarea><button type='button' id='remove' class='btn btn-sm btn-danger removeItemElement'>Remove</button></div>");
        }
        function deleteELement(e, item) {
            e.preventDefault();
            $(item).parent().fadeOut('200', function() {
                $(item).parent().remove();
            });
        }
        $(function() {
            $("#add-todo-item").on('click', function(e){
                e.preventDefault();
                addElement()
            });

            //EVENT DELEGATION
            $("#moreTask").on('click', '.removeItemElement', function(e){
                var item = this;
                deleteELement(e, item)
            })
        });

        function totalWorkerEarn(){
            let totalWorker = document.getElementById('worker_number').value;
            let totalEarnCost = document.getElementById('worker_earn').value;
            let commission = document.getElementById('price').value;
            let job_cost = parseInt(totalWorker) * parseFloat(totalEarnCost);
            let job_commission = (parseFloat(commission)*job_cost)/100;
            document.getElementById('total_cost').value = job_cost+job_commission;
        }
    </script>
@endpush
