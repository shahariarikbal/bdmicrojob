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
                <div class="col-md-10 m-auto">
                    <form method="GET" action="{{ url('/admin/deposit/request') }}" class="gobal-serch-form form-group mb-3">
                        @csrf
                        <div class="row" style="width: 100%">
                            <div class="col-md-5 mb-2">
                                <div class="d-flex align-items-center">
                                    <span class="input-group-text bg-gradient-blues" style="background-color: black; color: white">From</span>
                                    <input type="date" class="form-control" name="from" placeholder="From date" aria-label="Username" style="padding: 18px;">
                                </div>
                            </div>
                            <div class="col-md-5 mb-2">
                                <div class="d-flex align-items-center">
                                    <span class="input-group-text bg-gradient-burning" style="background-color: black; color: white">To</span>
                                    <input type="date" class="form-control" name="to" placeholder="To date" aria-label="Server" style="padding: 18px;">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="d-flex align-items-center">
                                    <button type="submit" class="input-group-text text-white btn btn-primary" style="margin-right: 5px">Search</button>
                                    <a href="{{ url('/admin/deposit/request') }}" class="input-group-text text-white btn btn-danger">Clear</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive-scroll">
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
                                        @if($deposit->is_approved == '1')
                                        <a href="#" class="btn btn-sm btn-success">Approved</a>
                                        @elseif ($deposit->is_approved == '2')
                                        <a href="#" class="btn btn-sm btn-danger">Rejected</a>
                                        @else
                                        <a href="#" class="btn btn-sm btn-warning">Pending</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($deposit->is_approved == '0')
                                        <a href="{{ url('admin/deposit/approve/'.$deposit->id) }}" onclick="return confirm('Are you sure??')" class="btn btn-sm btn-danger">Approve</a>
                                        <a href="{{ url('admin/deposit/reject/'.$deposit->id) }}" onclick="return confirm('Are you sure??')" class="btn btn-sm btn-primary">Reject</a>
                                        @elseif ($deposit->is_approved == '1')
                                        <a href="#" class="btn btn-sm btn-success">Approved</a>
                                        @elseif ($deposit->is_approved == '2')
                                        <a href="#" class="btn btn-sm btn-danger">Rejected</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $deposits->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
