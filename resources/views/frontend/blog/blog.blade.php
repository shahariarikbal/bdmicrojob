@extends('frontend.master')

@push('forum-css')
    <style>
        .blog-section {
            padding: 60px 0px;
        }

        .blog-item-image {
            overflow: hidden;
        }

        .blog-item-outer img {
            width: 100%;
            height: 450px;
            object-fit: cover;
            border-radius: 15px;
            transition: all 0.6s ease;
        }

        .blog-item-image:hover img {
            -webkit-transform: scale3d(1.05, 1.05, 1.05) translateZ(0);
            transform: scale3d(1.05, 1.05, 1.05) translateZ(0);
        }


        .blog-meta-list {
            padding-left: 0;
            margin-top: 20px;
            display: flex;
            align-items: center;
        }

        .blog-meta-list li {
            color: #9f9d9f;
            font-weight: 500;
            font-size: 18px;
        }

        .blog-meta-list-item {
            position: relative;
            margin-right: 10px;
            padding-right: 10px;
        }

        .blog-meta-list-item:after {
            content: '';
            height: 20px;
            width: 2px;
            border-radius: 2px;
            background-color: #7E41C2;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 0;
        }

        .blog-item-title {
            color: #000;
            margin-bottom: 15px;
            font-size: 30px;
            font-weight: 500;
            display: inline-block;
            transition: all .3s ease;
        }

        .blog-item-text {
            font-size: 16px;
            color: #000;
            line-height: 26px;
        }

        .blog-item-outer {
            margin-bottom: 40px;
        }

        .blog-see-more-link {
            display: inline-block;
            color: #000;
            font-size: 17px;
            font-weight: 500;
            position: relative;
            padding-bottom: 5px;
        }

        .blog-see-more-link i {
            font-size: 14px;
            margin-left: 6px;
        }

        .blog-see-more-link:after {
            content: '';
            position: absolute;
            width: 0px;
            height: 1px;
            background: #7E41C2;
            bottom: 0;
            left: 0;
            transition: all .3s ease;
        }

        .blog-item-outer:hover .blog-item-title {
            color: #7E41C2;
        }

        .blog-see-more-link:hover::after {
            width: 100%;
        }

        .blog-see-more-link:hover {
            color: #7E41C2;
        }

        .recent-blogs-wrapper .category-title {
            color: #000;
            margin-bottom: 20px;
            font-size: 25px;
            font-weight: 500;
        }

        .recent-blog-outer {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .recent-blog-image img {
            width: 80px;
            height: 70px;
            border-radius: 10px;
        }

        .recent-blog-image {
            margin-right: 10px;
            display: inline-block;
        }

        .recent-blog-title {
            color: #000;
            font-size: 18px;
            font-weight: 500;
            display: inline-block;
            margin-bottom: 5px;
        }

        .recent-blog-title:hover {
            color: #7E41C2;
        }

        .recent-blog-post-date {
            color: #9f9d9f;
            font-size: 15px;
            margin-bottom: 0;
            font-weight: 500;
        }
    </style>
@endpush

@section('contain')
<section class="banner-section">
    <div class="container">
        <div class="banner-content-wrapper">
            <h1 class="banner-title">Blog</h1>
            <ul class="banner-item">
                <li>
                    <a href="{{ url('/') }}">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:void(0)">
                        Blog
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>
<section class="blog-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="blog-items-wrapper">
                    <div class="blog-item-outer">
                        <div class="blog-item-image">
                            <a href="{{ url('/blog/details') }}">
                                <img src="{{ asset('frontend') }}/assets/images/blog.webp" alt="Blog Image">
                            </a>
                        </div>
                        <ul class="blog-meta-list">
                            <li class="blog-meta-list-item">
                                Admin
                            </li>
                            <li>
                                2023-Apr-08
                            </li>
                        </ul>
                        <a href="#" class="blog-item-title">                            
                            Artificial will take all human job next year                            
                        </a>
                        <p class="blog-item-text">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis veniam consequuntur voluptates dolores atque laudantium maiores nobis.
                        </p>
                        <a href="{{ url('/blog/details') }}" target="_blank" class="blog-see-more-link">
                            Read More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="recent-blogs-wrapper">
                    <h2 class="category-title">
                        Recent Post
                    </h2>
                    <div class="recent-blog-outer">
                        <a href="{{ url('/blog/details') }}" class="recent-blog-image">
                            <img src="{{ asset('frontend') }}/assets/images/blog.webp" alt="Blog Image">
                        </a>
                        <div class="recent-blog-content">
                            <a href="{{ url('/blog/details') }}" target="_blank" class="recent-blog-title">
                                Artificial will take 
                            </a>
                            <p class="recent-blog-post-date">
                                2023-Apr-08
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
