<footer id="footer">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-5">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <a href="{{ route('home') }}" class="logo"><img src="{{ asset('assets/frontend/img/logo.png') }}" alt=""></a>
                    </div>
                    <ul class="footer-nav">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Advertisement</a></li>
                    </ul>
                    <div class="footer-copyright">
								<span>&copy;
            {{ config('app.name') }} @ {{ now()->year }}. All rights reserved</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-widget">
                            <h3 class="footer-title">About Us</h3>
                            <ul class="footer-links">
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('home') }}">Join Us</a></li>
                                <li><a href="{{ route('contact') }}">Contacts</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-widget">
                            <h3 class="footer-title">Catagories</h3>
                            <ul class="footer-links">
                                <li><a href="{{ route('category') }}">Web Design</a></li>
                                <li><a href="{{ route('category') }}">JavaScript</a></li>
                                <li><a href="{{ route('category') }}">Css</a></li>
                                <li><a href="{{ route('category') }}">Jquery</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="footer-widget">
                    <h3 class="footer-title">Join our Newsletter</h3>
                    <div class="footer-newsletter">
                        <form>
                            <input class="input" type="email" name="newsletter" placeholder="Enter your email">
                            <button class="newsletter-btn"><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                    <ul class="footer-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</footer>
