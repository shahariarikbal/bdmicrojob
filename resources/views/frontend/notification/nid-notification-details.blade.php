@extends('frontend.auth.master')

@section('title')
	Accepted Task
@endsection

@section('content')
    <section class="my-task-section">
        <div class="container-fluid">
            <div class="card">
                @if($notification->message=='Account verification request is approved')
                <h1>Your Account is verified now!!</h1>
                @elseif ($notification->message=='Account verification request is rejected')
                <h1>Your Account Verification Request is Rejected because of Invalid Documents!!</h1>
                @endif
            </div>
        </div>
    </section>
@endsection

@push('page-scripts')
    <script type="text/javascript">

    </script>
@endpush
