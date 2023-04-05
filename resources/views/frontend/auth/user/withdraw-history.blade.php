@extends('frontend.auth.master')

@section('title')
	Withdraw Request
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
                    <h3 class="mb-0" style="font-size: 20px;color: #7E41C2">Withdraw Request</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive active">
                    <table class="table align-items-center table-striped table-hover table-flush my-task-table">
                        <thead class="thead-light my-task-th">
                            <tr class="my-task-th-outer">
                                <th scope="col" class="sort">#</th>
                                <th scope="col" class="sort">Withdraw Amount</th>
                                <th scope="col" class="sort">Payment Gateway</th>
                                <th scope="col" class="sort">Payment Gateway Number</th>
                                <th scope="col" class="sort">Status</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($withdraws as $withdraw )
                            <tr class="my-task-valued">
                                <th>{{ $loop->index+1 }}</th>
                                <td>
                                    <h6 class="task-name-text">
                                        {{ $withdraw->withdraw_amount }} tk
                                    </h6>
                                </td>
                                <td>
                                    {{ $withdraw->payment_gateway }}
                                </td>
                                <td>
                                    <h6 class="task-earned-text">
                                        {{ $withdraw->payment_gateway_number }}
                                    </h6>
                                </td>
                                <td>
                                    @if ($withdraw->is_approved==1)
                                    <a href="#" class="btn btn-sm btn-success">Approved</a>
                                    @else
                                    <a href="#" class="btn btn-sm btn-warning">Pending</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $withdraws->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page-scripts')
    <script type="text/javascript">

    </script>
@endpush
