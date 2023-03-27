<footer class="footer-main-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="footer-social-icon">
                    <h3 class="footer-social-icon-title">
                        <span class="extra-color">Follow</span> <span>Us</span>
                    </h3>
                    <ul class="footer-social-icon-list">
                        <li class="footer-social-icon-list-item">
                            <a href="{{ $setting->facebook }}" class="footer-social-icon-item-link">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="footer-social-icon-list-item">
                            <a href="{{ $setting->twitter }}" class="footer-social-icon-item-link">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="footer-social-icon-list-item">
                            <a href="{{ $setting->instagram }}" class="footer-social-icon-item-link">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-section">
        {{-- <div class="footer-bottom-logo">
            <img src="{{ asset('/frontend/') }}/assets/logo/GLOBAL.png">
        </div> --}}
        <a href="{{ url('/') }}" class="header-main-logo">
            <img src="{{ asset('/logo/'.$setting->logo) }}" style="height: 70px;" />
{{--            BD<span>Microjobs</span>--}}
        </a>
        <div class="footer-condition-link">
            <ul class="privacy-terms-list">
                <li class="privacy-terms-list-item">
                    <a href="{{ url('/privacy/policy') }}" class="privacy-terms-list-item-link">
                        Privacy Policy
                    </a>
                </li>
                <li class="privacy-terms-list-item">
                    <a href="{{ url('/terms/conditions') }}" class="privacy-terms-list-item-link">
                        Terms & Conditions
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>
