@extends('backend.master')

@section('title')
    Withdraw list
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
                		<h2>Withdraw list</h2>
            		</div>
            	</div>

            </div>
            <div class="card-body">
                <form method="GET" action="" class="form-inline mb-3" style="width: 60%">
                    @csrf
                    <div class="input-group mb-3" style="width: 100%">
                        <span class="input-group-text bg-gradient-blues" style="background-color: black; color: white">From</span>
                        <input type="date" class="form-control" name="from" placeholder="From date" aria-label="Username" style="padding: 18px;">
                        <span class="input-group-text bg-gradient-burning" style="background-color: black; color: white">To</span>
                        <input type="date" class="form-control" name="to" placeholder="To date" aria-label="Server" style="padding: 18px;">
                        <button type="submit" class="btn btn-sm btn-info" style="margin-left: 5px;"><i class="fa fa-search"></i> Search</button>
                        <a href="" class="btn btn-sm btn-danger" style="margin-left: 5px;"><i class="fa fa-search"></i> Clear</a>
                    </div>
                </form>
                <div class="col-md-12">
                    <table class="table table-striped table-responsive">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">User Email</th>
                            <th scope="col">User Phone</th>
                            <th scope="col">Total Earning</th>
                            <th scope="col">Withdraw Amount</th>
                            <th scope="col">Payment Gateway</th>
                            <th scope="col">Payment Gateway Number</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($withdraws as $withdraw)
                            <tr>
                                <th>{{ $loop->index+1 }}</th>
                                <td>{{ $withdraw->user_name }}</td>
                                <td>{{ $withdraw->user_email }}</td>
                                <td>{{ $withdraw->user_phone }}</td>
                                <td>{{ $withdraw->user->total_income }}tk</td>
                                <td>{{ $withdraw->withdraw_amount }}tk</td>
                                <td>{{ $withdraw->payment_gateway }}</td>
                                <td>{{ $withdraw->payment_gateway_number }}</td>
                                <td>
                                    @if($withdraw->is_approved == 1)
                                    <a href="#" class="btn btn-sm btn-success">Approved</a>
                                    @else
                                    <a href="#" class="btn btn-sm btn-warning">Pending</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('admin/withdraw/approve/'.$withdraw->id) }}" onclick="return confirm('Are you sure??')" class="btn btn-sm btn-danger">Approve</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                      {{ $withdraws->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
