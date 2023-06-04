@extends('frontend.auth.master')

@section('title')
	My Favourite Task
@endsection

@section('content')
    <section class="my-task-section">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header border-0">
                    <marquee style="color: green; padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid blue;" behavior="scroll">
                        {{ $marquee_text->marquee_text }}
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
                                <th scope="col" class="sort">SL</th>
                                <th scope="col" class="sort">Task Name</th>
                                {{--  <th scope="col" class="sort">Reward Amount</th>  --}}
                                <th scope="col" class="sort">Status</th>
                                <th scope="col" class="sort">Action</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($carts as $cart )
                            <tr class="my-task-valued">
                                <td>
                                    <h6 class="task-name-text">
                                        {{ $loop->index+1 }}
                                    </h6>
                                </td>
                                <td>
                                    <h6 class="task-name-text">
                                        {{ $cart->post->title }}
                                    </h6>
                                </td>
                                {{--  <td>
                                    <h6 class="task-earned-text">
                                        {{ $cart->category->worker_earning }} tk
                                    </h6>
                                </td>  --}}
                                <td>
                                    <h6 class="task-status-text">
                                        Favourite
                                    </h6>
                                </td>
                                <td>
                                    <a href="{{ url('/job/details/'.$cart->post_id) }}" class="btn btn-sm btn-warning">Complete</a>
                                    <a href="{{ url('/my/favourite/task/delete/'.$cart->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $carts->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page-scripts')
    <script type="text/javascript">

    </script>
@endpush
