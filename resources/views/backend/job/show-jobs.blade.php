@extends('backend.master')

@section('title')
    Job list
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
                <div class="row">
                    <div class="col-md-6">
                        <h2>Job list</h2>
                    </div>
                </div>
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
                            @foreach ($job_posts as $job_post)
                            <tr class="my-task-valued">
                                <td>
                                    <h6 class="task-name-text">
                                        {{ $loop->index+1 }}
                                    </h6>
                                </td>
                                <td>
                                    <h6 class="task-earned-text">
                                        {{ $job_post->category->name ?? 'No name found' }}
                                    </h6>
                                </td>
                                <td>
                                    {{ $job_post->title }}
                                </td>
                                <td>
                                    <h6 class="task-date-text">
                                        {{ $job_post->worker_number }}
                                    </h6>
                                </td>
                                <td>
                                    <h6 class="task-date-text">
                                        {{ $job_post->category->worker_earning }}tk
                                    </h6>
                                </td>
                                <td>
                                    <h6 class="task-date-text">
                                        @if ($job_post->is_approved==1)
                                            Approved
                                        @elseif ($job_post->is_approved==2)
                                            Rejected
                                        @else
                                            Pending
                                        @endif
                                    </h6>
                                </td>
                                <td>
                                    <a href="{{ url('/admin/job/details/'.$job_post->id) }}" class="btn btn-sm btn-info">Details</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                      {{ $job_posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
