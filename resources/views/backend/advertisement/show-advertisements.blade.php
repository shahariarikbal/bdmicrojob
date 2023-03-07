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
                		<h2>Advertisement list</h2>
            		</div>
            		{{--  <div class="col-md-6 text-right">
                		<a href="" class="btn btn-primary">Add</a>
            		</div>  --}}
            	</div>

            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <h1>Advertisements....</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
