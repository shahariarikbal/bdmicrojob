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
          <div class="col-xl-4 col-sm-6 mb-4">
             <div class="custom-card-one">
                <div class="row">
                   <div class="col-md-4">
                    <img src="{{ asset('backend/') }}/img/Vector.png" style="height: 50px; margin-top: 25px; margin-left: 15px;"/>
                   </div>
                   <div class="col-md-8">
                    <p class="earn-box-one">Approved Jobs</p>
                    <p class="earn-box-one">{{ $approved_job_count }}</p>
                   </div>
               </div>
             </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-4">
            <div class="custom-card-one">
               <div class="row">
                  <div class="col-md-4">
                   <img src="{{ asset('backend/') }}/img/Vector.png" style="height: 50px; margin-top: 25px; margin-left: 15px;"/>
                  </div>
                  <div class="col-md-8">
                   <p class="earn-box-one">Pending Jobs</p>
                   <p class="earn-box-one">{{ $pending_job_count }}</p>
                  </div>
              </div>
            </div>
         </div>
          {{--  <div class="col-xl-3 col-sm-6 mb-3">
             <div class="custom-card-two">
                <div class="row">
                   <div class="col-md-4">
                      <div style="border: 2px solid #ffffff; height: 40px; margin-top: 25px; margin-left: 15px; border-radius: 8px; width: 50px;">
                         <img src="{{ asset('backend/') }}/img/Vector1.png" style="height: 20px; margin-top: 8px; margin-left: 15px;"/>
                      </div>
                   </div>
                   <div class="col-md-8">
                    <p class="earn-box-one">Total videos</p>
                   </div>
               </div>
             </div>
          </div>  --}}
          {{--  <div class="col-xl-3 col-sm-6 mb-3">
             <div class="custom-card-three">
                <div class="row">
                   <div class="col-md-4">
                    <img src="{{ asset('backend/') }}/img/Vector2.png" style="height: 50px; margin-top: 25px; margin-left: 15px;"/>
                   </div>
                   <div class="col-md-8">
                    <p class="earn-box-one">Share Links And Get Rewards !</p>
                   </div>
               </div>
             </div>
          </div>  --}}
          <div class="col-xl-4 col-sm-6 mb-4">
             <div class="custom-card-four">
                <div class="row">
                   <div class="col-md-4">
                    <img src="{{ asset('backend/') }}/img/Vector3.png" style="height: 50px; margin-top: 25px; margin-left: 15px;"/>
                   </div>
                   <div class="col-md-8">
                    <p class="earn-box-one">Total users</p>
                    <p class="earn-box-one">{{ $user_count }}</p>
                   </div>
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
