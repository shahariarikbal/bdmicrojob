@extends('backend.master')

@section('title')
    Home Page
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
                		<h2>Home Page</h2>
            		</div>
            	</div>

            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <form action="{{ url('/admin/homepage/update') }}" method="post" class="contact-form form-group" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="slider_title">
                                    Slider Title
                                </label>
                                <input required type="text" name="slider_title" value="{{ $homepage->slider_title }}" class="form-control" placeholder="Enter slider title">
                            </div>
                            <div class="col-md-12">
                                <label for="slider_image">
                                    Slider Image
                                </label>
                                <input type="file" name="slider_image" class="form-control" placeholder="Upload slider_image">
                                <img src="{{ asset('/homepage/'.$homepage->slider_image) }}" height="400" width="990px" alt="">
                            </div>
                            <div class="col-md-12">
                                <label for="first_image_title">
                                    Frist Image Title
                                </label>
                                <input required type="text" name="first_image_title" value="{{ $homepage->first_image_title }}" class="form-control" placeholder="Enter first image title">
                            </div>
                            <div class="col-md-12">
                                <label for="first_image_description">
                                    First Image Description
                                </label>
                                <textarea required name="first_image_description" rows="10" class="form-control" placeholder="Enter First Image Description">{{ $homepage->first_image_description }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="first_image">
                                    First Image
                                </label>
                                <input type="file" name="first_image" class="form-control" placeholder="Upload first_image">
                                <img src="{{ asset('/homepage/'.$homepage->first_image) }}" height="400" width="300px" alt="">
                            </div>
                            <div class="col-md-12">
                                <label for="second_image_title">
                                    Second Image Title
                                </label>
                                <input required type="text" name="second_image_title" value="{{ $homepage->second_image_title }}" class="form-control" placeholder="Enter second image title">
                            </div>
                            <div class="col-md-12">
                                <label for="second_image_description">
                                    Second Image Description
                                </label>
                                <textarea required name="second_image_description" rows="10" class="form-control" placeholder="Enter Second Image Description">{{ $homepage->second_image_description }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="second_image">
                                    Second Image
                                </label>
                                <input type="file" name="second_image" class="form-control" placeholder="Upload second_image">
                                <img src="{{ asset('/homepage/'.$homepage->second_image) }}" height="400" width="300px" alt="">
                            </div>
                            <div class="col-md-12">
                                <label for="how_works_title">
                                   How it Works Title
                                </label>
                                <input required type="text" name="how_works_title" value="{{ $homepage->how_works_title }}" class="form-control" placeholder="Enter how it works title">
                            </div>
                            <div class="col-md-12">
                                <label for="how_works_description">
                                    How it Works Description
                                </label>
                                <textarea required name="how_works_description" rows="10" class="form-control" placeholder="Enter how it works">{{ $homepage->how_works_description }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="footer_image">
                                    Footer Image
                                </label>
                                <input type="file" name="footer_image" class="form-control" placeholder="Upload footer_image">
                                <img src="{{ asset('/homepage/'.$homepage->footer_image) }}" height="400" width="990px" alt="">
                            </div>
                            <div class="col-md-12">
                                <label for="footer_title">
                                   Footer Title
                                </label>
                                <input required type="text" name="footer_title" value="{{ $homepage->footer_title }}" class="form-control" placeholder="Enter how it works title">
                            </div>
                            <div class="col-md-12">
                                <label for="footer_description">
                                    Footer Description
                                </label>
                                <textarea required name="footer_description" rows="10" class="form-control" placeholder="Footer Description">{{ $homepage->footer_description }}</textarea>
                            </div>
                        </div>
                        <div class="contact-submit-btn-outer">
                            <button class="contact-submit-btn-inner">
                                Update <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
