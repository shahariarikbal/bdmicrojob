@extends('frontend.auth.master')
@push('page-css')
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
        font-size: 14px !important;
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
</style>
@endpush

@section('title')
My Forum
@endsection

@section('content')
<section class="forum-section">
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="forum-info-wrapper">
                    @if (Auth::check())
                    <form action="{{ url('/my-forum/update/'.$forum->id) }}" method="post" class="post-create-outer" enctype="multipart/form-data">
                        @csrf
                        <label for="description">
                            Create Post
                        </label>
                        <textarea name="description" class="form-control mb-3" cols="50" rows="4"
                            placeholder="Write something ..." required>{{ $forum->description }}</textarea>
                        <label for="image">
                            Image
                        </label>
                        <input type="file" name="image" class="form-control" required>
                        @if ($forum->image != null)
                        {{--  <div class="avatar-item">  --}}
                            <img class="avatar-img"
                                src="{{ asset('/forum/'.$forum->image) }}" alt="avatar" height="200px" />
                        {{--  </div>  --}}
                        @endif
                        <div class="post-btn-outer">
                            <button type="submit" class="post-btn-inner">
                                Post
                            </button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('page-scripts')
<script type="text/javascript">

</script>
@endpush
