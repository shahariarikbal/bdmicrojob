@extends('backend.master')

@section('title')
    Pending Job list
@endsection

@push('page-css')
<style type="text/css">
    th{
        text-transform: capitalize;
    }
</style>
@endpush


@section('content')
    <div class="container-fluid pb-0">
        <div class="card">
            <div class="card-header">
                <h2>Pending Job list</h2>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col" class="sort">SL</th>
                            <th scope="col" class="sort">Catrgory Name</th>
                            <th scope="col" class="sort">Title</th>
                            <th scope="col" class="sort">Total Worker</th>
                            <th scope="col" class="sort">Per job Earn</th>
                            <th scope="col" class="sort">Status</th>
                            <th scope="col" class="sort">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($pending_job_posts as $pending_job_post)
                            <tr class="my-task-valued">
                                <td>
                                    <h6 class="task-name-text">
                                        {{ $loop->index+1 }}
                                    </h6>
                                </td>
                                <td>
                                    <h6 class="task-earned-text">
                                        {{ $pending_job_post->category->name ?? 'No name found' }}
                                    </h6>
                                </td>
                                <td>
                                    {{ $pending_job_post->title }}
                                </td>
                                <td>
                                    <h6 class="task-date-text">
                                        {{ $pending_job_post->worker_number }}
                                    </h6>
                                </td>
                                <td>
                                    <h6 class="task-date-text">
                                        {{ $pending_job_post->category->worker_earning }}tk
                                    </h6>
                                </td>
                                <td>
                                    <h6 class="task-date-text">
                                        @if ($pending_job_post->is_approved==1)
                                            Approved
                                        @elseif ($pending_job_post->is_approved==2)
                                            Rejected
                                        @else
                                            Pending
                                        @endif
                                    </h6>
                                </td>
                                <td>
                                    <a href="{{ url('/admin/job/details/'.$pending_job_post->id) }}" class="btn btn-sm btn-info">Details</a>
                                    <a href="{{ url('/admin/job/approve/'.$pending_job_post->id) }}" onclick="return confirm('Are you sure?')"  class="btn btn-sm btn-success">Approve</a>
                                    <a href="{{ url('/admin/job/reject/'.$pending_job_post->id) }}" onclick="return confirm('Are you sure?')"  class="btn btn-sm btn-danger">Reject</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                      {{ $pending_job_posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection