@extends('frontend.auth.master')

@section('title')
	Submitted Job
@endsection

@section('content')
    <section class="my-task-section">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="mb-0" style="font-size: 20px;color: #7E41C2">Submitted Job</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive active">
                    <table class="table align-items-center table-striped table-hover table-flush my-task-table">
                        <thead class="thead-light my-task-th">
                            <tr class="my-task-th-outer">
                                <th scope="col" class="sort">SL</th>
                                <th scope="col" class="sort">Job Title</th>
                                {{--  <th scope="col" class="sort">Per job Earn</th>  --}}
                                <th scope="col" class="sort">Worker Name</th>
                                <th scope="col" class="sort">Worker Email</th>
                                <th scope="col" class="sort">Status</th>
                                <th scope="col" class="sort">Action</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($submitted_jobs as $submitted_job )
                            <tr>
                                <td>
                                    <h6 class="task-name-text">
                                        {{ $loop->index+1 }}
                                    </h6>
                                </td>
                                <td>
                                    <h6 class="task-name-text">
                                        {{ $submitted_job->post->title }}
                                    </h6>
                                </td>
                                <td>
                                    <h6 class="task-name-text">
                                        {{ $submitted_job->user->name }}
                                    </h6>
                                </td>
                                <td>
                                    <h6 class="task-name-text">
                                        {{ $submitted_job->user->email }}
                                    </h6>
                                </td>
                                <td>
                                    <h6 class="task-name-text">
                                        @if ($submitted_job->status==1)
                                        <span class="badge badge-primary">Approved</span>
                                        @elseif ($submitted_job->status==0)
                                        <span class="badge badge-info">Pending</span>
                                        @else
                                        <span class="badge badge-danger">Rejected</span>
                                        @endif
                                    </h6>
                                </td>
                                <td>
                                    <a href="{{ url('/submitted/job/details/'.$submitted_job->id) }}" class="btn btn-sm btn-warning">Details</a>
                                    {{--  <a href="{{ url('/submitted/job/reject/'.$submitted_job->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Reject</a>
                                    <a href="{{ url('/submitted/job/approve/'.$submitted_job->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-warning">Approve</a>  --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $submitted_jobs->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page-scripts')
    <script type="text/javascript">

    </script>
@endpush
