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
                                <th scope="col" class="sort">SL</th>
                                <th scope="col" class="sort">Catrgory Name</th>
                                <th scope="col" class="sort">Title</th>
                                <th scope="col" class="sort">Total Worker</th>
                                <th scope="col" class="sort">Per job Earn</th>
                                <th scope="col" class="sort">Status</th>
                                <th scope="col" class="sort">Action</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($posts as $post)
                                <tr class="my-task-valued">
                                    <td>
                                        <h6 class="task-name-text">
                                            {{ $loop->index+1 }}
                                        </h6>
                                    </td>
                                    <td>
                                        <h6 class="task-earned-text">
                                            {{ $post->category->name ?? 'No name found' }}
                                        </h6>
                                    </td>
                                    <td>
                                        {{ $post->title }}
                                    </td>
                                    <td>
                                        <h6 class="task-date-text">
                                            {{ $post->worker_number }}
                                        </h6>
                                    </td>
                                    <td>
                                        <h6 class="task-date-text">
                                            {{ $post->category->worker_earning }}
                                        </h6>
                                    </td>
                                    <td>
                                        <h6 class="task-date-text">
                                            @if ($post->is_approved==1)
                                                Approved
                                            @elseif ($post->is_approved==2)
                                                Rejected
                                            @else
                                                Pending
                                            @endif
                                        </h6>
                                    </td>
                                    <td>
                                        <a href="{{ url('/post/add-worker/'.$post->id) }}" class="btn btn-sm btn-warning">Add Worker</a>
                                        <a href="{{ url('/post/pause/'.$post->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Pause</a>
                                        {{--  <a href="{{ url('/post/edit/'.$post->id) }}" class="btn btn-sm btn-warning">Edit</a>  --}}
                                        {{--  <a href="{{ url('/post/delete/'.$post->id) }}" onclick="return confirm('Are you sure delete this post ?')" class="btn btn-sm btn-danger">Delete</a>  --}}
                                    </td>
                                </tr>
                            @endforeach
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
