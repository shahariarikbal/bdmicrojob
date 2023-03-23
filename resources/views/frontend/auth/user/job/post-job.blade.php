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
                        <li class="step" id="professional"><strong>Job Information</strong></li>
                        <li class="step" id="address"><strong>Budget & Setting</strong></li>
                    </ul>
                    <form action="" method="" class="form-group">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="fs-title">Select Category:</h2>
                            </div>
                            <div class="col-5">
                                <h2 class="steps">Step 1 - 3</h2>
                            </div>
                        </div>
                        <hr>
                        <div class="category-items-wrap">
                            @foreach($categories as $category)
                                <div class="category-item-outer">
                                    <input type="radio" id="{{ 'cat'. $category->id }}" name="category" value="{{ $category->id }}" onclick="categoryPrice(this)" class="category-item-radio">
                                    <label for="{{ 'car'. $category->name }}" class="category-item-label">{{ ucfirst($category->name) }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="job-post-sub-btn-outer">                              
                            <button type="submit" class="job-post-sub-btn-inner">Submit</button>
                        </div>
                    </form>
                    <form action="" method="" class="form-group" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="fs-title">Job Information:</h2>
                            </div>
                            <div class="col-5">
                                <h2 class="steps">Step 2 - 3</h2>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                 <label for="job_title">Write an accurate job Title</label><span style="color: red; font-size: 16px;"> *</span><br>
                                 <input type="text" name="job_title" placeholder="Write an accurate job Title" class="form-control">
                            </div>
                            <div class="col-md-12">
                                 <div class="task-outer">
                                    <label for="task">What specific tasks need to be Completed</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <textarea name="task" id="tasks" rows="5" cols="50" class="form-control"></textarea>
                                    <a href="#" id="add-todo-item" class="btn btn-primary mb-3">Add Element</a>
                                 </div>
                                 <div class="more-task" id="moreTask">

                                 </div>
                            </div>
                            <div class="col-md-12">
                                 <div class="task-outer">
                                    <label for="task">Required proof the job was Completed</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <textarea name="task" id="tasks" rows="5" cols="50" class="form-control"></textarea>
                                 </div>
                            </div>
                            <div class="col-md-12">
                                 <div class="task-outer">
                                    <label for="task">Thumbnail Image(optional)</label>
                                    <input type="file" name="avater" class="form-control">
                                 </div>
                            </div>
                        </div>
                        <div class="job-post-sub-btn-outer">                              
                            <button type="submit" class="job-post-sub-btn-inner">Submit</button>
                        </div>
                    </form>
                    <form action="" method="" class="form-group">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="fs-title">Budget & Setting:</h2>
                            </div>
                            <div class="col-5">
                                <h2 class="steps">Step 3 - 3</h2>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="left-content">
                                    <label for="work_num">Worker Need</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="number" name="work_num" min="1" placeholder="Minimum 1" class="form-control">
                                    <label for="work_num">Each worker Earn</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="number" name="work_num" placeholder="min 0.1" min="0.1" step="0.001" class="form-control">
                                    <label for="work_num">Require Screenshots</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="number" name="work_num" placeholder="0" min="1" max="2" class="form-control">
                                    <label for="work_num">Estimated Day</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="number" name="work_num" placeholder="7 day" min="1" max="7" class="form-control">
                                    <label for="work_num">Have you need:Extend Period (optional)</label>
                                    <select name="jobExtendPeriod" id="jobExtendPeriod" class="form-control">
                                        <option value="0">None</option>
                                        <option value="5">5m Cost $0.10</option>
                                        <option value="10">10m Cost $0.08</option>
                                        <option value="15">15m Cost $0.06</option>
                                        <option value="20">20m Cost $0.04</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="right-content">
                                    <h5 style="color:#000;font-size: 13px;font-weight: bold;text-align: center">Estimated Job Cost</h5>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text drk_white_theme" style="font-size:10px">$</span>
                                        </div>
                                        <input type="number"  class="form-control" id="estimatedJobCost" placeholder="0.00" readonly="" value="1" style="margin-bottom: 0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="job-post-sub-btn-outer">                              
                            <button type="submit" class="job-post-sub-btn-inner">Submit</button>
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
        function categoryPrice(data){
            console.log(data.value);
        }
        //Admission Form Js
        var currentTab = 0;
        showTab(currentTab);

        function showTab(n) {
          var x = document.getElementsByClassName("tab");
          x[n].style.display = "block";
          if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
          } else {
            document.getElementById("prevBtn").style.display = "inline";
          }
          if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
          } else {
            document.getElementById("nextBtn").innerHTML = "Next";
          }
          fixStepIndicator(n)
        }

        function nextPrev(n) {
          var x = document.getElementsByClassName("tab");
          if (n == 1 && !validateForm()) return false;
          x[currentTab].style.display = "none";
          currentTab = currentTab + n;
          if (currentTab >= x.length) {
            document.getElementById("admissionForm").submit();
            return false;
          }
          showTab(currentTab);
        }

        function validateForm() {
          var x, y, i, valid = true;
          x = document.getElementsByClassName("tab");
          y = x[currentTab].getElementsByTagName("input");
          for (i = 0; i < y.length; i++) {
            if (y[i].value == "") {
              y[i].className += " invalid";
              valid = false;
            }
          }
          if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
          }
          return valid;
        }

        function fixStepIndicator(n) {
          var i, x = document.getElementsByClassName("step");
          for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
          }
          x[n].className += " active";
        }

        //Add Task Js
        function addElement() {
            $("#moreTask").append("<div class='mb-3'><label>[ Max 150 character ]</label><textarea name='task' rows='5' cols='50' class='form-control mb-2'></textarea><button type='button' id='remove' class='btn btn-sm btn-danger removeItemElement'>Remove</button></div>");

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
