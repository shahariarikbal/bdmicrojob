@extends('backend.master')

@section('title')
    NID Details
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
                    <h2>NID Verification list</h2>
                </div>
            </div>

        </div>
        <div class="card-body">
            <h1>NID Request Details</h1>
        </div>
    </div>
</div>
@endsection
