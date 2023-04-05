@extends('backend.master')

@section('title')
    About Us
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
                    <h2>About Us</h2>
                </div>
            </div>
        </div>
            <div class="card-body">
                <a href="{{ url('/admin/about-us') }}" class="btn btn-sm btn-primary mb-1">About Us List</a>
                <div class="col-md-12">
                    <form action="{{ url('/admin/update/about-us/'.$about_us->id) }}" method="post" class="contact-form form-group">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="title">
                                    Title
                                </label>
                                <input type="text" name="title" value="{{ $about_us->title }}" class="form-control" placeholder="Enter title">
                            </div>
                            <div class="col-md-12">
                                <label for="short_description">
                                    Short Description
                                </label>
                                <input type="text" name="short_description" value="{{ $about_us->short_description }}" class="form-control" placeholder="Enter short_description">
                            </div>
                            <div class="col-md-12">
                                <label for="long_description">
                                    Long Description
                                </label>
                                <textarea name="long_description" id="your_summernote" class="form-control" placeholder="Enter long_description"
                                    rows="12" cols="50">{!! $about_us->long_description !!}</textarea>
                            </div>
                        </div>
                        <div class="contact-submit-btn-outer">
                            <button class="btn btn-success mt-3">
                                Update <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection
