@extends('frontend.auth.master')

@section('title')
	Account Varify
@endsection

@section('content')
    <section class="account-varify-section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <form action="" method="" class="account-varify-form">
                        <h4 class="title">Account Verification</h4>
                        <div class="form-group">
                            <label for="cardType" class="form-control-label">Select Verify Card</label>
                            <select class="form-control" id="cardType">
                                <option value="National ID Card"> ID Card</option>
                                <option value="Passport">Passport</option>
                                <option value="Driving Licence">Driving Licence</option>
                                <option value="Birth Certificate">Birth Certificate</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Full Name*</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input class="form-control" placeholder="Your Card Orginal Full Name" id="cardName" type="text" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Card Number*</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-id-card" aria-hidden="true"></i></span>
                                </div>
                                <input class="form-control" placeholder="Your Card Number" id="cardNumber" type="text" required="">
                            </div>
                        </div>
                        <p class="font-weight-500 text-blue">*Card Front Image</p>
                        <div>
                            <input type="file" style="display: none" name="cardImage" id="cardImage" accept="image/x-png,image/jpg,image/jpeg" onchange="cardimage(this)" lang="en">
                            <label class="custom-file-label-drop" for="cardImage"><i class="fas fa-camera"></i> Select Card Front Side Image</label>
                        </div>
                        <img id="cardPreview" class="imgPreview"  src="" width="350px">
                        <p class="font-weight-500 text-blue">*Your Real Image with your Card</p>
                        <div>
                            <input type="file" style="display: none" name="userImage" id="userImage" accept="image/x-png,image/jpg,image/jpeg" onchange="userimage(this)" lang="en">
                            <label class="custom-file-label-drop" for="userImage"><i class="fas fa-camera"></i> Select Your Real Image</label>
                        </div>
                        <img id="userPreview" class="imgPreview"  src="" width="250px">
                        <div class="account-varify-btn-outer">
                            <button type="submit" class="account-varify-btn-inner">Submit</button>
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