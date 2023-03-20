@extends('frontend.auth.master')

@section('title')
	My Task
@endsection

@section('content')
    <section class="my-task-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="card">
                        <div class="card-header border-0">
                            <marquee style="color: green; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid blue;" behavior="scroll">
                                Hello Sir, Each task can take a maximum of 48 hours to complete rating, Please wait ! For the information of all, it is informed that in the case of job report, all should report using appropriate and fluent words. If payment is
                                not received within 48 hours of completion of work then report should be made. If someone uses any kind of obscene words before the specified time or in case of report, his user ID will be banned. Thank you.
                            </marquee>
                            <br />
                            <br />
                            <h3 class="mb-0" style="font-size: 20px;color: #7E41C2">My Task</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive active">
                            <table class="table align-items-center table-striped table-hover table-flush my-task-table">
                                <thead class="thead-light my-task-th">
                                    <tr class="my-task-th-outer">
                                        <th scope="col" class="sort">Task Name</th>
                                        <th scope="col" class="sort">Status</th>
                                        <th scope="col" class="sort">Earned</th>
                                        <th scope="col" class="sort">Action</th>
                                        <th scope="col" class="sort">Date</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    <tr class="my-task-valued">
                                        <td>
                                            <h6 class="task-name-text">
                                                Google video
                                            </h6>
                                        </td>
                                        <td>
                                            <h6 class="task-status-text">
                                                Pending
                                            </h6>
                                        </td>
                                        <td>
                                            <h6 class="task-earned-text">
                                                10 BDT
                                            </h6>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                        </td>
                                        <td>
                                            <h6 class="task-date-text">
                                                10-20-2023
                                            </h6>
                                        </td>
                                    </tr>
                                    <tr class="my-task-valued">
                                        <td>
                                            <h6 class="task-name-text">
                                                Google video
                                            </h6>
                                        </td>
                                        <td>
                                            <h6 class="task-status-text">
                                                Pending
                                            </h6>
                                        </td>
                                        <td>
                                            <h6 class="task-earned-text">
                                                10 BDT
                                            </h6>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                        </td>
                                        <td>
                                            <h6 class="task-date-text">
                                                10-20-2023
                                            </h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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