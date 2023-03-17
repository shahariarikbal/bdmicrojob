@extends('backend.master')

@section('title')
    Deposit list
@endsection

@push('page-css')
    {{-- expr --}}
@endpush


@section('content')
    <div class="container-fluid pb-0">
        <div class="card">
            <div class="card-header">
            	<div class="row">
            		<div class="col-md-6">
                		<h2>Deposit list</h2>
            		</div>
            	</div>

            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">User Email</th>
                            <th scope="col">User Phone</th>
                            <th scope="col">Deposit Amount</th>
                            <th scope="col">Payment System</th>
                            <th scope="col">Transaction ID</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($deposits as $deposit)
                            <tr>
                                <th>{{ $loop->index+1 }}</th>
                                <td>{{ $deposit->user_name }}</td>
                                <td>{{ $deposit->user_email }}</td>
                                <td>{{ $deposit->user_phone }}</td>
                                <td>{{ $deposit->deposit_amount }}tk</td>
                                <td>{{ $deposit->payment_gateway }}</td>
                                <td>{{ $deposit->transaction_id }}</td>
                                <td>
                                    @if($deposit->is_approved == 1)
                                    <a href="#" class="btn btn-sm btn-success">Approved</a>
                                    @else
                                    <a href="#" class="btn btn-sm btn-warning">Pending</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('admin/deposit/approve' , $deposit->id) }}" onclick="return confirm('Are you sure??')" class="btn btn-sm btn-danger">Approve</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
@endsection
