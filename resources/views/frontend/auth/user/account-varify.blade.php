@extends('frontend.auth.master')

@section('title')
Account Varify
@endsection

@section('content')
<section class="account-varify-section">
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <form action="{{ url('/account/varify/store') }}" method="post" class="account-varify-form" enctype="multipart/form-data">
                    @csrf
                    <h4 class="title">Account Verification</h4>
                    <div class="form-group">
                        <label for="cardType" class="form-control-label">Select Verify Card</label>
                        <select class="form-control" name="card_type" id="cardType">
                            <option value="nid"> ID Card</option>
                            {{-- <option value="Passport">Passport</option>
                            <option value="Driving Licence">Driving Licence</option> --}}
                            <option value="birth">Birth Certificate</option>
                        </select>
                        @if ($errors->has('card_type'))
                        <div class="text-danger">{{ $errors->first('card_type') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Full Name*</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input class="form-control" placeholder="Your Orginal Full Name" name="card_name"
                                id="cardName" type="text">
                        </div>
                        @if ($errors->has('card_name'))
                        <div class="text-danger">{{ $errors->first('card_name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Card Number*</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-id-card" aria-hidden="true"></i></span>
                            </div>
                            <input class="form-control" placeholder="Your Card Number" name="card_number"
                                id="cardNumber" type="text">
                        </div>
                        @if ($errors->has('card_number'))
                        <div class="text-danger">{{ $errors->first('card_number') }}</div>
                        @endif
                    </div>
                    <p class="font-weight-500 text-blue">*Card Front Image</p>
                    <div>
                        <input type="file" style="display: none" name="card_image" id="cardImage"
                            onchange="cardimage(this)" lang="en">
                        @if ($errors->has('card_image'))
                        <div class="text-danger">{{ $errors->first('card_image') }}</div>
                        @endif
                        <label class="custom-file-label-drop" for="cardImage"><i class="fas fa-camera"></i> Select Card
                            Front Side Image</label>
                    </div>
                    <img id="cardPreview" class="imgPreview" src="" width="350px">
                    <p class="font-weight-500 text-blue">*Your Real Image with your Card</p>
                    <div>
                        <input type="file" style="display: none" name="user_image" id="userImage"
                            onchange="userimage(this)" lang="en">
                        @if ($errors->has('user_image'))
                        <div class="text-danger">{{ $errors->first('user_image') }}</div>
                        @endif
                        <label class="custom-file-label-drop" for="userImage"><i class="fas fa-camera"></i> Select Your
                            Real Image</label>
                    </div>
                    <img id="userPreview" class="imgPreview" src="" width="250px">
                    <div class="account-varify-btn-outer">
                        @if ($nid_verified !=1)
                        <button type="submit" class="account-varify-btn-inner">Submit</button>
                        @else
                        <div><h1 class="text-danger">Already Verified!!</h1></div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('page-scripts')
<script type="text/javascript">
    //Change this to your no-image file
        let noimage =
        "https://ami-sni.com/wp-content/themes/consultix/images/no-image-found-360x250.png";

        function cardimage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                $("#cardPreview").attr("src", e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                $("#cardPreview").attr("src", noimage);
            }
        }

        function userimage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                $("#userPreview").attr("src", e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                $("#userPreview").attr("src", noimage);
            }
        }

</script>
@endpush
