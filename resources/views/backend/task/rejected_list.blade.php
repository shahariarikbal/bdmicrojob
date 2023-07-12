@extends('backend.master')

@section('title')
    Rejected Tasks
@endsection

@push('page-css')
    {{-- expr --}}
@endpush


@section('content')
    <div class="container-fluid pb-0">
        <div class="card">
            <div class="card-header">
            	<div class="row">
            		<div class="col-md-4">
                		<h2>Rejected Tasks</h2>
            		</div>
                    <div class="col-md-8">
                        <form action="{{ url('/admin/rejected-task') }}" method="get">
                            <div class="row">
                                <div class="col-md-7">
                                    <input type="text" name="job_title" class="form-control" placeholder="Job Title" style="height: 40px;margin-bottom: 10px;">
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <button type="submit" class="input-group-text text-white btn btn-primary" style="margin-right: 5px">Search</button>
                                        <a href="{{ url('/admin/rejected-task') }}" class="input-group-text text-white btn btn-danger">Clear</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
            	</div>

            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive-scroll">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Job Title</th>
                                <th scope="col">Worker Name</th>
                                <th scope="col">Worker Email</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($rejected_tasks as $rejected_task)
                                <tr>
                                    <th>{{ $loop->index+1 }}</th>
                                    <td>{{ $rejected_task->post->title }}</td>
                                    <td>{{ $rejected_task->user->name }}</td>
                                    <td>{{ $rejected_task->user->email }}</td>
                                    <td>
                                        <h6 class="task-name-text">
                                            @if ($rejected_task->status==1)
                                            <span class="badge badge-primary">Approved</span>
                                            @elseif ($rejected_task->status==0)
                                            <span class="badge badge-info">Pending</span>
                                            @else
                                            <span class="badge badge-danger">Rejected</span>
                                            @endif
                                        </h6>
                                    </td>
                                    <td>
                                        <img src="{{ asset('pending_task/'.$rejected_task->image) }}" alt="" height="50px">
                                    </td>
                                    <td>
                                        <a href="{{ url('/admin/details/pending_task/'.$rejected_task->id) }}" class="btn btn-sm btn-success">Details</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $rejected_tasks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
