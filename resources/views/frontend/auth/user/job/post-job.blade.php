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
                    <ul id="progressbar">
                        <li class="step active" id="personal"><strong>Select Category</strong></li>
                        <li class="step active" id="professional"><strong>Job Information</strong></li>
                        <li class="step active" id="address"><strong>Budget & Setting</strong></li>
                    </ul>
                    <form action="{{ url('/post/store') }}" method="post" class="form-group" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-7">
                                <h2 class="fs-title">Select Category:</h2>
                            </div>
                            <div class="col-5">
                                <h2 class="steps">Job Post Form</h2>
                            </div>
                        </div>
                        <hr>
                        <div class="category-items-wrap">
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
                                    <label for="task">Thumbnail Image(optional)</label>
                                    <input type="file" name="avatar" class="form-control">
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="left-content">
                                    <label for="worker_number">Worker Need</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="number" name="worker_number" min="1" placeholder="Minimum 1" class="form-control">
                                    <label for="worker_earn">Each worker Earn</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="number" name="worker_earn" placeholder="min 0.1" min="0.1" step="0.001" class="form-control">
                                    <label for="required_screenshot">Require Screenshots</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="number" name="required_screenshot" placeholder="0" min="1" max="2" class="form-control">
                                    <label for="estimated_date">Estimated Day</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="number" name="estimated_date" placeholder="7 day" min="1" max="7" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="job-post-sub-btn-outer">
                            <button type="submit" class="btn btn-primary mb-3 float-right">Submit</button>
                        </div>
                    </form>
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
    </script>
@endpush
