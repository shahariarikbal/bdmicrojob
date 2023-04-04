@extends('backend.master')

@section('title')
    FAQ
@endsection

@section('content')
    <div class="container-fluid pb-0">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h2>FAQ</h2>
                    </div>
                </div>
            </div>
            @if($page == 'create')
            <div class="card-body">
                <a href="{{ url('/admin/faqs') }}" class="btn btn-sm btn-primary mb-1">Faq List</a>
                <div class="col-md-12">
                    <form action="{{ url('/admin/faq/store') }}" method="post" class="contact-form form-group">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name">
                                    Question
                                </label>
                                <input type="text" name="question" class="form-control" placeholder="Enter Question">
                            </div>
                            <div class="col-md-12">
                                <label for="answer">
                                    Answer
                                </label>
                                <textarea name="answer" id="your_summernote" class="form-control" placeholder="Enter answer"
                                    rows="5"></textarea>
                            </div>
                        </div>
                        <div class="contact-submit-btn-outer">
                            <button class="btn btn-success mt-3">
                                Create <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @endif
            @if($page == 'index')
                <div class="card-body">
                    <div class="col-md-12">
                        <a href="{{ url('/admin/faq/create') }}" class="btn btn-sm btn-primary float-right mb-2">Add Faq</a>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Question</th>
                                <th scope="col">Answer</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $info)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $info->question }}</td>
                                        <td>{!! substr($info->answer,0,50) !!}</td>
                                        <td>
                                            <a href="{{ url('/admin/faq/edit/'.$info->id) }}" class="btn btn-sm btn-info">Edit</a>
                                            <a href="{{ url('/admin/faq/delete/'.$info->id) }}" onclick="return confirm('Are you sure delete this data ?')" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            @if($page == 'edit')
                <div class="card-body">
                    <a href="{{ url('/admin/faqs') }}" class="btn btn-sm btn-primary mb-1">Faq List</a>
                    <div class="col-md-12">
                        <form action="{{ url('/admin/faq/update/'.$faq->id) }}" method="post" class="contact-form form-group">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="question">
                                        Question
                                    </label>
                                    <input type="text" name="question" value="{{ $faq->question }}" class="form-control" placeholder="Enter Question">
                                </div>
                                <div class="col-md-12">
                                    <label for="answer">
                                        Answer
                                    </label>
                                    <textarea name="answer" id="your_summernote" class="form-control" placeholder="Enter answer"
                                    rows="5">{!! $faq->answer !!}</textarea>
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
            @endif
        </div>
    </div>
@endsection
