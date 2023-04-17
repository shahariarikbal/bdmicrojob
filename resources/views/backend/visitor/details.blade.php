@extends('backend.master')

@section('title')
    Visitor Details
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
           <div class="col-md-2"></div>
           <div class="col-md-8">
               <div class="card">
                   <div class="card-header">
                       <span style="font-size: 22px; font-weight: bold">Visitor Details</span>
                       <a href="{{ url('/admin/dashboard') }}" class="btn btn-sm btn-success float-right" style="width: 80px;">
                           <i class="fa fa-arrow-alt-circle-left" style="font-size: 18px;"></i>
                       </a>
                   </div>
                   <div class="card-body">
                       <table class="table table-hover table-bordered">
                           <tr>
                               <th>Country Name:</th>
                               <th>{{ $visitor->countryName }}</th>
                           </tr>
                           <tr>
                               <th>Country Code:</th>
                               <th>{{ $visitor->countryCode }}</th>
                           </tr>
                           <tr>
                               <th>Region Code:</th>
                               <th>{{ $visitor->regionCode }}</th>
                           </tr>
                           <tr>
                               <th>Region Name:</th>
                               <th>{{ $visitor->regionName }}</th>
                           </tr>
                           <tr>
                               <th>City Name:</th>
                               <th>{{ $visitor->cityName }}</th>
                           </tr>
                           <tr>
                               <th>Zipcode:</th>
                               <th>{{ $visitor->zipCode }}</th>
                           </tr>
                           <tr>
                               <th>Latitude:</th>
                               <th>{{ $visitor->latitude }}</th>
                           </tr>
                           <tr>
                               <th>Longitude:</th>
                               <th>{{ $visitor->longitude }}</th>
                           </tr>
                       </table>
                   </div>
               </div>
           </div>
           <div class="col-md-2"></div>
       </div>
    </div>
 </div>

@endsection

@push('page-scripts')
    {{-- expr --}}
@endpush
