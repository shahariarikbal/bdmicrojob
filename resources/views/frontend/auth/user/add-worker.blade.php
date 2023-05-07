@extends('frontend.auth.master')

@section('title')
	Add worker
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
                    <form action="{{ url('/post/job/job-information') }}" method="get">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="left-content">
                                    <label for="title">Work Title</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="text" name="title" id="title" value="" readonly class="form-control">
                                    <label for="category">Work Category</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="text" name="category" id="category" value="" readonly class="form-control">
                                    <label for="worker_earn">Each worker Earn (tk)</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="text" name="worker_earn" id="worker_earn" value="" readonly class="form-control">
                                    <label for="worker_earn">Total Worker</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="text" name="total_worker" id="total_worker" value="" readonly class="form-control">
                                    <label for="worker_number">Add Worker</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="number" required name="worker_number" onkeyup="totalWorkerEarn()" id="worker_number" min="1" placeholder="Minimum 1" class="form-control">
                                    <label for="total_cost">Total Cost in Tk</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="number" readonly name="total_cost" id="total_cost" placeholder="min 0.1" step="0.001" class="form-control">
                                    <label for="total_deposit">Total Deposit Money (tk)</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="text" name="total_deposit" id="total_deposit" value="{{ $total_deposit->total_deposit }}" readonly class="form-control">
                                    <p id="my-p-tag" style="color:red;font-size:20px;"></p>
                                </div>
                            </div>
                        </div>
                        <div class="job-post-sub-btn-outer" id="submit-button-container">
                            <button type="submit" id="sub_btn" class="btn btn-primary">Next</button>
                        </div>
                    </form>

                    {{--  <form action="{{ url('/post/store') }}" method="post" class="form-group" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="cat_id" id="cat_id" value="{{ $category_id }}" readonly class="form-control">
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
                                    <input type="hidden" name="worker_number" id="worker_number" value="{{ $worker_number }}" class="form-control">
                                    <input type="hidden" name="worker_earn" id="worker_earn" value="{{ $worker_earn }}" placeholder="min 0.1" min="0.1" step="0.001" class="form-control">
                                    <label for="required_screenshot">Require Screenshots</label><span style="color: red; font-size: 16px;"> *</span><br>
                                    <input type="number" name="required_screenshot" placeholder="0" min="1" max="2" class="form-control">
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
            let total_deposit = parseFloat(document.getElementById('total_deposit').value);
            document.getElementById('total_cost').value = job_cost+job_commission;

            /*if(job_cost<=total_deposit && totalWorker<=9 ){
                var submitButton = document.createElement('button');
                submitButton.type = 'submit';
                submitButton.innerText = 'Next';

                var container = document.getElementById('submit-button-container');
                container.appendChild(submitButton);
                container.style.display = "";

            }*/

            /*else if(job_cost>total_deposit){
                var p = document.getElementById("my-p-tag");
                p.textContent = "This is some new text for the p tag.";
                p.style.display = "";
                var div = document.getElementById("submit-button-container");
                div.style.display = "none";

            }*/

            if(job_cost<=total_deposit){
                var button = document.getElementById("sub_btn");
                button.disabled = false;
                var p = document.getElementById("my-p-tag");
                p.style.display = "none";
            }

            else if(job_cost>total_deposit){
                var button = document.getElementById("sub_btn");
                button.disabled = true;
                var p = document.getElementById("my-p-tag");
                p.textContent = "Insufficient Balance!!";
                p.style.display = "";
            }

        }
    </script>
@endpush
