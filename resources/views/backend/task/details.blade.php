@extends('backend.master')

@section('title')
    Job list
@endsection

@push('page-css')
<style type="text/css">

</style>
@endpush

@section('content')
    <section class="my-task-section">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="nid-details-back-btn-outer">
                                <a href="{{ url('/admin/pending-task') }}" class="nid-details-back-btn-inner">Back</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="nid-details-right-btn-outer">
                                <a href="{{ url('/admin/pending-task/approve/'.$pending_task->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-primary">Approve</a>
                                {{--  <a href="{{ url('/submitted/job/reject/'.$pending_task->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Reject</a>  --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 m-auto">
                            <div class="sumitted-job-details-wrap">
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="sumitted-job-details-outer">
                                            <h5 class="sumitted-job-details-label">
                                                Job Title:
                                            </h5>
                                            <p class="sumitted-job-details-value">
                                                {{ $pending_task->post->title }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="sumitted-job-details-outer">
                                            <h5 class="sumitted-job-details-label">
                                                Worker Name:
                                            </h5>
                                            <p class="sumitted-job-details-value">
                                                {{ $pending_task->user->name }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="sumitted-job-details-outer">
                                            <h5 class="sumitted-job-details-label">
                                                Worker Email:
                                            </h5>
                                            <p class="sumitted-job-details-value">
                                                {{ $pending_task->user->email }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="sumitted-job-details-outer">
                                            <h5 class="sumitted-job-details-label">
                                                Status:
                                            </h5>
                                            <p class="sumitted-job-details-value">
                                                @if($pending_task->status=='1')
                                                <h4><span class="badge badge-primary">Approved</span></h4>
                                                @elseif ($pending_task->status=='2')
                                                <h4><span class="badge badge-danger">Rejected</span></h4>
                                                @else
                                                <h4><span class="badge badge-info">Pending</span></h4>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="sumitted-job-details-image-outer">
                                            <h5 class="sumitted-job-details-label">
                                                Work Screenshots
                                            </h5>
                                            @foreach ( json_decode($pending_task->images) as $image  )
                                            <img src="{{ asset('/post/'.$image) }}" class="sumitted-job-details-image" alt="Card Image" />
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
