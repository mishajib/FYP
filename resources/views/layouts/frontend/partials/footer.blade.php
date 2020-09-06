<footer id="footer">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-5">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <a href="{{ route('frontend.home') }}" class="logo"><img
                                    src="{{ asset('assets/frontend/img/logo.png') }}"
                                    alt=""></a>
                    </div>
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
                            <h3 class="footer-title">Catagories</h3>
                            <ul class="footer-links">
                                @forelse($categories->where('is_approved', 1)->take(5) as $category)
                                    <li>
                                        <a href="{{ route('frontend.category.posts', $category->slug) }}">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @empty
                                    <span class="text-danger">
                                    {{ __("No data found!!!") }}
                                </span>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="footer-widget">
                    <h3 class="footer-title">Join our Newsletter</h3>
                    <div class="footer-newsletter">
                        <form action="{{ route('frontend.subscribe') }}"
                              method="POST">
                            @csrf
                            <input class="input" type="email" name="email"
                                   placeholder="Enter your email">
                            <button class="newsletter-btn"><i
                                        class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</footer>
