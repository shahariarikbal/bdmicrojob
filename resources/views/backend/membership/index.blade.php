@extends('backend.master')

@section('title')
    Membership list
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
                		<h2>Membership list</h2>            			
            		</div>
            		<div class="col-md-6 text-right">
                		<a href="{{ url('admin/membership/create') }}" class="btn btn-primary">Add</a>
            		</div>
            	</div>

            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">name</th>
                            <th scope="col">facilities</th>
                            <th scope="col">per month charge</th>
                            <th scope="col">per membership cost</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Models\Membership::orderBy('id', 'desc')->get() as $membership)
                            <tr>
                                <th>{{ $loop->index+1 }}</th>
                                <td>{{ $membership->name }}</td>
                                <td>
                                    <ul>
                                        @foreach (json_decode($membership->facilities) as $facility)
                                            <li>{{ $facility }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{ $membership->per_month_charge }}</td>
                                <td>{{ $membership->per_video_cost }}</td>
                                <td>
    {{--                                 @if($membership->status == 1)
                                        <a href="#" class="btn btn-sm btn-success">Active</a>
                                    @else
                                        <a href="#" class="btn btn-sm btn-warning">Inactive</a>
                                    @endif --}}

                                    <a href="{{ url('admin/membership/edit' , $membership->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    <form action="{{ url('admin/membership/delete', $membership->id) }}" method="post" class="d-inline" onsubmit="return confirm('Are you sure?')" id="delete{{ $membership->id }}">

                                    	@csrf


                                    	<button type="submit" class="btn btn-sm btn-danger">Delete</button>

                                	</form>
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
