<footer class="footer-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-sm-12">
                <ul class="footer-policies-list">
                	<li class="footer-policies-list-item">
                		<a href="{{ url('/about') }}" class="footer-policies-list-item-link">
                			About Us
                		</a>
                	</li>
                	<li class="footer-policies-list-item">
                		<a href="{{ url('/faq') }}" class="footer-policies-list-item-link">
                			FAQ
                		</a>
                	</li>
                	<li class="footer-policies-list-item">
                		<a href="{{ url('/contact') }}" class="footer-policies-list-item-link">
                			Contact Us
                		</a>
                	</li>
                	<li class="footer-policies-list-item">
                		<a href="{{ url('/privacy/policy') }}" class="footer-policies-list-item-link">
                			Privacy Policy
                		</a>
                	</li>
                	<li class="footer-policies-list-item">
                		<a href="{{ url('/terms/conditions') }}" class="footer-policies-list-item-link">
                			Terms & Conditions
                		</a>
                	</li>
                </ul>
            </div>
            <div class="col-lg-3 col-sm-12 text-right">
            	<ul class="footer-social-list">
            		<li class="footer-social-list-item">
            			<a href="{{ $setting->facebook }}" class="footer-social-list-item-link" target="_blank">
            				<i class="fab fa-facebook-f"></i>
            			</a>
            		</li>
            		<li class="footer-social-list-item">
            			<a href="{{ $setting->twitter }}" class="footer-social-list-item-link" target="_blank">
            				<i class="fab fa-twitter"></i>
            			</a>
            		</li>
            		<li class="footer-social-list-item">
            			<a href="{{ $setting->instagram }}" class="footer-social-list-item-link" target="_blank">
            				<i class="fab fa-instagram"></i>
            			</a>
            		</li>            		
            	</ul>
            </div>
        </div>
    </div>
</footer>