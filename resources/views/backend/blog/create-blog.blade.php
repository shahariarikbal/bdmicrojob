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
                    <h2>Create Blog</h2>
                </div>
            </div>
        </div>
            <div class="card-body">
                <a href="{{ url('/admin/all-blog') }}" class="btn btn-sm btn-primary mb-1">Blog List</a>
                <div class="col-md-12">
                    <form action="{{ url('/admin/store/blog') }}" method="post" class="contact-form form-group" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="short_title">
                                    Short Title
                                </label>
                                <input type="text" name="short_title" value="" class="form-control" placeholder="Enter short title">
                            </div>
                            <div class="col-md-12">
                                <label for="long_title">
                                    Long Title
                                </label>
                                <input type="text" name="long_title" value="" class="form-control" placeholder="Enter long title">
                            </div>
                            <div class="col-md-12">
                                <label for="short_description">
                                    Short Description
                                </label>
                                <input type="text" name="short_description" value="" class="form-control" placeholder="Enter short_description">
                            </div>
                            <div class="col-md-12">
                                <label for="long_description">
                                    Long Description
                                </label>
                                <textarea name="long_description" id="your_summernote" class="form-control" placeholder="Enter long_description"
                                    rows="12" cols="50"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="image">
                                    Blog Image
                                </label>
                                <input type="file" name="image" value="" class="form-control" placeholder="Upload Blog Image">
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
