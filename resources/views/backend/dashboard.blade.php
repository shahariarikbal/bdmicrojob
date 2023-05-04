@extends('backend.master')

@section('title')
    Dashboard
@endsection

@push('page-css')
    {{-- expr --}}
@endpush


@section('content')

{{-- container-fluid pb-0 here --}}
<div class="container-fluid pb-0">
{{--    <div class="top-mobile-search">--}}
{{--       <div class="row">--}}
{{--          <div class="col-md-12">--}}
{{--             <form class="mobile-search">--}}
{{--                <div class="input-group">--}}
{{--                   <input type="text" placeholder="Search for..." class="form-control">--}}
{{--                   <div class="input-group-append">--}}
{{--                      <button type="button" class="btn btn-dark"><i class="fas fa-search"></i></button>--}}
{{--                   </div>--}}
{{--                </div>--}}
{{--             </form>--}}
{{--          </div>--}}
{{--       </div>--}}
{{--    </div>--}}
    <div class="video-block section-padding">
       <div class="row">
          <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
            <div class="card radius-10" style="background: linear-gradient(131.26deg,#5E44C9 26.64%,#2448D6 214.9%)">
                <div class="card-body text-center">
                    <p class="mb-1 text-white" style="font-size: 17px;font-weight: 600;">Approved Jobs</p>
                    <h3 class="text-white">
                        {{ $approved_job_count }}
                    </h3>
                </div>
            </div>
             <!-- <div class="custom-card-one">
                <div class="row">
                   <div class="col-md-4">
                    <img src="{{ asset('backend/') }}/img/Vector.png" style="height: 50px; margin-top: 25px; margin-left: 15px;"/>
                   </div>
                   <div class="col-md-8">
                    <p class="earn-box-one">Approved Jobs</p>
                    <p class="earn-box-one">{{ $approved_job_count }}</p>
                   </div>
               </div>
             </div> -->
          </div>
          <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
            <div class="card radius-10" style="background: linear-gradient(131.26deg,#5E44C9 26.64%,#2448D6 214.9%)">
                <div class="card-body text-center">
                    <p class="mb-1 text-white" style="font-size: 17px;font-weight: 600;">Pending Jobs</p>
                    <h3 class="text-white">
                        {{ $pending_job_count }}
                    </h3>
                </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
            <div class="card radius-10" style="background: linear-gradient(131.26deg,#5E44C9 26.64%,#2448D6 214.9%)">
                <div class="card-body text-center">
                    <p class="mb-1 text-white" style="font-size: 17px;font-weight: 600;">Total users</p>
                    <h3 class="text-white">
                        {{ $user_count }}
                    </h3>
                </div>
            </div>
          </div>
       </div>
    </div>

    <div class="card">
        <div class="card-header">
            <span style="font-size: 18px; font-weight: bold">Visitor's List</span>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <tr>
                    <th>SL</th>
                    <th>Visit Date</th>
                    <th>IP</th>
                    <th>Browser</th>
                    <th>Action</th>
                </tr>
                @foreach($visitors as $visitor)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ date('d-M-Y', strtotime($visitor->created_at)) }}</td>
                        <td>
                            <a href="{{ url('/admin/visitor/view/'.$visitor->id) }}">{{ $visitor->ip }}</a>
                        </td>
                        <td>{{ $visitor->browser }}</td>
                        <td>
                            <a href="{{ url('/admin/visitor/view/'.$visitor->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i>
                            </a>
{{--                            <a href="{{ url('/admin/visitor/delete/'.$visitor->id) }}">--}}
{{--                                <i class="fas fa-trash-alt"></i>--}}
{{--                            </a>--}}
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $visitors->links() }}
        </div>
    </div>
 </div>

@endsection

@push('page-scripts')
    {{-- expr --}}
@endpush
