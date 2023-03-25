@extends('frontend.auth.master')

@section('title')
	My Post
@endsection

@section('content')
    <section class="my-task-section">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="mb-0" style="font-size: 20px;color: #7E41C2">My Post</h3>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page-scripts')
    <script type="text/javascript">

    </script>
@endpush
