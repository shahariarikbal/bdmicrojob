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
                                        <a href="#" class="btn btn-sm btn-warning">{{ $post->title }}</a>
                                    </td>
                                    <td>
                                        <h6 class="task-date-text">
                                            {{ $post->worker_number }}
                                        </h6>
                                    </td>
                                    <td>
                                        <h6 class="task-date-text">
                                            {{ $post->worker_number * $post->worker_earn }}
                                        </h6>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning">Edit</a>
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