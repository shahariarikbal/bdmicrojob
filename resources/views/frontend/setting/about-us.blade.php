@extends('frontend.master')

@section('contain')
<section class="banner-section">
    <div class="container">
        <div class="banner-content-wrapper">
            <h1 class="banner-title">About Us</h1>
            <ul class="banner-item">
                <li>
                    <a href="{{ url('/') }}">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:void(0)">
                        About
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>
<section class="terms-condition-section">
    <div class="container">
        <div class="terms-condition-content-wrapper">
            <h4 class="content-title">
                <i class="far fa-hand-point-right"></i>
                Billing Terms &amp; Conditions
            </h4>
            <p class="content-text">
                Secure Sockets Layer (128 Bit SSL Security) verifiedload.com uses Secure Sockets Layer
                (SSL) technology to supply you with the safest, most secure purchasing experience
                possible. SSL technology enables encryption (scrambling) of sensitive information, including
                passwords and MasterCard numbers, during your online transactions. All of the forms on
                our site are secured with SSL technology so your personal information stays safe and out of
                malicious hands.
            </p>
            <h4 class="content-title">
                <i class="far fa-hand-point-right"></i>
                PCI Compliant
            </h4>
            <p class="content-text">
                The Payment Card Industry Data Security Standard (PCI DSS) is an information security
                standard for organizations that handle MasterCard and open-end credit information. Defined
                by the Payment Card Industry Security Standards Council, the quality was created to
                extend controls around MasterCard data to scale back MasterCard fraud via its exposure.
            </p>
            <h4 class="content-title">
                <i class="far fa-hand-point-right"></i>
                PAYMENT TERMS AND CONDITIONS
            </h4>
            <strong> We accept the following credit and debit cards: </strong>
            <ul>
                <li style="list-style-type: disc;" class="pb-2">
                    Visa
                </li>
                <li style="list-style-type: disc;" class="pb-2">
                    MasterCard
                </li>
                <li style="list-style-type: disc;" class="pb-2">
                    American Express
                </li>
                <li style="list-style-type: disc;" class="pb-2">
                    Apple Pay
                </li>
                <li style="list-style-type: disc;" class="pb-2">
                    Dinners Club
                </li>
                <li style="list-style-type: disc;" class="pb-2">
                    Discover
                </li>
                <li style="list-style-type: disc;" class="pb-2">
                    Elo
                </li>
                <li style="list-style-type: disc;" class="pb-2">
                    Google Pay
                </li>
                <li style="list-style-type: disc;" class="pb-2">
                    JCB
                </li>
                <li style="list-style-type: disc;" class="pb-2">
                    Paypal
                </li>
                <li style="list-style-type: disc;" class="pb-2">
                    Shop pay
                </li>
                <li style="list-style-type: disc;" class="pb-2">
                    Vemio
                </li>
            </ul>
            <p class="content-text">
                Once you select package then fill up registration form, you will be transferred to
                our secure payment gateway, where you will be able to, Visa, MasterCard,
                American Express, Apple Pay, Dinners Club, Discover, Elo, Google Pay, JCB,
                Paypal, Shop pay, Vemio.
            </p>
            <h4 class="content-title">
                All prices and figures are listed in U.S. dollars.
            </h4>
            <h4 class="content-title">
                We don't collect and store any payment information provided by customers. All the transactions are processed at secure gateway.
            </h4>
        </div>
    </div>
</section>
@endsection
