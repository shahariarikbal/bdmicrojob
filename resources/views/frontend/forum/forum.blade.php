@extends('frontend.master')

@push('forum-css')
    <style>
        .forum-section {
            padding: 40px 0;
        }
        .post-create-outer {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 10px;
        }
        .post-create-outer label {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
            text-transform: capitalize;
        }
        .post-create-outer textarea:focus {
            border-color: #7e41c2;
            box-shadow: none;
        }
        .post-create-outer .post-btn-outer {
            text-align: right;
            margin-top: 20px;
        }
        .post-create-outer .post-btn-inner {
            height: auto;
            padding: 10px 28px;
            line-height: initial;
            border: 1px solid #7e41c2;
            text-transform: uppercase;
            background: #7e41c2;
            color: #fff;
            transition: all .3s ease;
        }
        .post-create-outer .post-btn-inner:hover {
            background: transparent;
            color: #000;
        }
        .single-post-top {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .single-post-wrap {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 10px;
        }
        .single-post-top-left {
            display: flex;
            align-items: center;
        }
        .single-post-top-left .author-image {
            margin-right: 10px;
            position: relative;
        }
        .single-post-top-left .author-image img {
            width: 60px;
            height: 60px;
            border-radius: 7px;
        }
        .single-post-top-left .author-image:before {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background: #3db91c;
            border-radius: 50%;
            top: -10px;
            left: -10px;
            z-index: 9;
        }
        .single-post-top-left .author-info .author-name {
            font-size: 20px;
            font-weight: 500;
            color: #000;
            margin-bottom: 5px;
        }
        .single-post-top-left .author-info .author-status {
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 0;
            color: #666464;
        }
        .single-post-top-right.cus-dropdown {
            position: relative;
        }
        .single-post-top-right.cus-dropdown i {
            font-size: 20px;
        }
        .cus-dropdown-list {
            position: absolute;
            right: 0;
            top: 20px;
            width: 170px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            margin-bottom: 0;
            padding-left: 0;
            border-radius: 5px 0px 5px 5px;
            transition: all .5s ease;
            visibility: hidden;
            opacity: 0;
            transform: scaleY(0);
        }
        .cus-dropdown-list-item {
            border-bottom: 1px solid #f4f4f4;
        }
        .cus-dropdown-list-item-link {
            color: #000;
            display: block;
            font-size: 14px;
            padding: 10px 20px;
            text-transform: capitalize;
            transition: all 0.15s linear;
            font-weight: 500;
        }
        .cus-dropdown-list-item-link i {
            font-size: 14px!important;
            margin-right: 5px;
        }
        .single-post-top-right.cus-dropdown:hover .cus-dropdown-list {
            visibility: visible;
            opacity: 1;
            transform: scale(1);
        }
        .single-post-center {
            margin-bottom: 30px;
        }
        .single-post-center .comment-text {
            font-size: 16px;
            font-weight: 400;
            line-height: 26px;
            color: #000;
        }
        .like-comment-count-outer {
            display: flex;
            align-items: center;
            justify-content: right;
            margin-bottom: 15px;
        }
        .like-comment-count-item {
            margin-right: 15px;
            font-size: 16px;
            font-weight: 600;
            color: #000;
        }
        .like-comment-count-item:last-child {
            margin-right: 0;
        }
        .like-comment-count-item .count {
            margin-right: 2px;
            color: #000;
        }
        .like-comment-outer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
            margin-bottom: 30px;
        }
        .like-comment-item {
            font-size: 17px;
            font-weight: 500;
            color: #000;
            border: none;
            height: auto;
            padding: 0;
            font-family: inherit;
            text-transform: capitalize;
        }
        .like-comment-item i {
            color: #7e41c2;
            margin-right: 4px;
        }
        .comment-form.form-group {
            margin-bottom: 25px;
        }
        .comment-form.form-group input:focus {
            border-color: #7e41c2;
            box-shadow: none;
        }
        .comment-btn-inner {
            background: #7e41c2;
            color: #fff;
            border: 1px solid #7e41c2;
            transition: all .3s ease;
        }
        .comment-btn-inner:hover {
            background: transparent;
            color: #000;
        }
        .comment-btn-inner i {
            font-size: 18px;
            font-weight: 500;
        }
        .parent-comment {
            display: flex;
            margin-bottom: 30px;
        }
        .like-comment-item:hover {
            background: transparent;
            border: none;
            color: #000;
        }
        .avatar-item img {
            width: 60px;
            height: 60px;
            border-radius: 8px;
        }
        .children-comment {
            display: flex;
            padding-left: 50px;
            margin-bottom: 20px;
        }
        .avatar-item {
            margin-right: 15px;
        }
        .info-item.active {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            padding: 10px 20px;
            border-radius: 10px;
        }
        .title-area h6 {
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 5px;
            color: #000;
        }
        .title-area .mdtxt {
            font-size: 14px;
            font-weight: 400;
            color: #717171;
        }
        .like-share {
            padding-left: 0;
        }
        .like-share li {
            margin-right: 15px;
        }
        .like-share li button {
            border: none;
            height: auto;
            text-transform: capitalize;
            font-family: inherit;
            padding: 0;
            font-weight: 600;
            color: #000;
        }
        .like-share li button:hover {
            background: transparent;
            color: #000;
        }
    </style>
@endpush

@section('contain')
<section class="banner-section">
    <div class="container">
        <div class="banner-content-wrapper">
            <h1 class="banner-title">Forum</h1>
            <ul class="banner-item">
                <li>
                    <a href="{{ url('/') }}">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:void(0)">
                        forum
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>
<section class="forum-section">
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="forum-info-wrapper">
                    <form action="" method="" class="post-create-outer">
                        <label for="post_create">
                            Create Post
                        </label>
                        <textarea name="post_create" class="form-control" cols="50" rows="4" placeholder="Write something ..."></textarea>
                        <div class="post-btn-outer">
                            <button type="submit" class="post-btn-inner">
                                Post
                            </button>
                        </div>
                    </form>
                    <div class="single-post-wrap">
                        <div class="single-post-top">
                            <div class="single-post-top-left">
                                <div class="author-image">
                                    <img src="{{ asset('/frontend') }}/assets/images/user.jpg">
                                </div>
                                <div class="author-info">
                                    <h5 class="author-name">
                                        Lori Cortez
                                    </h5>
                                    <p class="author-status">
                                        Active
                                    </p>
                                </div>
                            </div>
                            <div class="single-post-top-right cus-dropdown">
                                <i class="fas fa-ellipsis-h"></i>
                                <ul class="cus-dropdown-list">
                                    <li class="cus-dropdown-list-item"> 
                                        <a href="#" class="cus-dropdown-list-item-link">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-post-center">
                            <p class="comment-text"> 
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                        <div class="single-post-bottom">
                            <div class="like-comment-count-outer">
                                <div class="like-comment-count-item">
                                    <span class="count">10</span>
                                    Like
                                </div>
                                <div class="like-comment-count-item">
                                    <span class="count">2</span>
                                    Comments
                                </div>
                            </div>
                            <div class="like-comment-outer">
                                <button class="like-comment-item">
                                    <i class="far fa-thumbs-up"></i>
                                    Like
                                </button>
                                <button class="like-comment-item">
                                    <i class="far fa-comment-alt"></i>
                                    Comment
                                </button>
                            </div>
                            <form action="" method="" class="comment-form form-group">
                                <div class="d-flex gap-3">
                                    <input type="text" name="comment" class="form-control" placeholder="Write a comment..">
                                    <button type="button" class="comment-btn-inner">
                                        <i class="far fa-comment-alt"></i>
                                    </button>
                                </div>
                            </form>
                            <div class="comment-area">
                                <div class="single-comment-area">
                                    <div class="parent-comment">
                                        <div class="avatar-item">
                                            <img class="avatar-img" src="{{ asset('/frontend') }}/assets/images/user.jpg" alt="avatar" />
                                        </div>
                                        <div class="info-item active">
                                            <div class="top-area align-items-start justify-content-between">
                                                <div class="title-area">
                                                    <h6>
                                                        Lori Cortez
                                                    </h6>
                                                    <p class="mdtxt">
                                                        The only way to solve the problem is to code for the hardware directly
                                                    </p>
                                                </div>
                                            </div>
                                            <ul class="like-share d-flex">
                                                <li class="d-center">
                                                    <button class="mdtxt">Like</button>
                                                </li>
                                                <li class="d-center flex-column">
                                                    <button class="mdtxt reply-btn">Reply</button>
                                                </li>
                                            </ul>
                                            <form action="#" method="" class="reply-comment-form">
                                                <div class="d-flex gap-3">
                                                    <input placeholder="Write a comment.." class="form-control" type="text" />
                                                    <button class="reply-comment-btn">
                                                        <i class="far fa-comment-alt"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="children-comment">
                                        <div class="avatar-item">
                                            <img class="avatar-img" src="{{ asset('/frontend') }}/assets/images/user.jpg" alt="avatar" />
                                        </div>
                                        <div class="info-item active">
                                            <div class="top-area align-items-start justify-content-between">
                                                <div class="title-area">
                                                    <h6>
                                                        Lori Cortez
                                                    </h6>
                                                    <p class="mdtxt">
                                                        The only way to solve the problem is to code for the hardware directly
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
