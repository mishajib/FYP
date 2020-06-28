<div class="section-row">
    <ul class="nav-aside-menu">
        <li><a href="{{ route('frontend.home') }}">Home</a></li>
        <li><a href="#">About Us</a></li>
        @if(Route::has('login'))
            @auth
                @if(Auth::user()->hasAnyRole(['super', 'admin']))
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                @else
                    <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                @endif
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
                @if(Route::has('register'))
                    <li><a href="{{ route('register') }}">Join Us</a></li>
                @endif
            @endauth
        @endif
        <li><a href="#">Contacts</a></li>
    </ul>
</div>
