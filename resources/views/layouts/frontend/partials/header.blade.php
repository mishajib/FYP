<header id="header">
    <!-- Nav -->
    <div id="nav">
        <!-- Main Nav -->
        <div id="nav-fixed">
            <div class="container">
                <!-- logo -->
                <div class="nav-logo">
                    <a href="{{ route('frontend.home') }}" class="logo"><img
                            src="{{ asset('assets/frontend/img/logo.png') }}"
                            alt=""></a>
                </div>
                <!-- /logo -->

                <!-- nav -->
            @include("layouts.frontend.partials.navbar")
            <!-- /nav -->

                <!-- search & aside toggle -->
                <div class="nav-btns">
                    <button class="aside-btn"><i class="fa fa-bars"></i>
                    </button>
                    <button class="search-btn"><i class="fa fa-search"></i>
                    </button>
                    <form action="{{ route('frontend.search') }}">
                        <div class="search-form">
                            <input class="search-input" type="text" name="query"
                                   placeholder="Enter Your Search ..."
                                   value="{{ isset($query) ? $query : '' }}">
                            <button type="button" class="search-close"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </form>
                </div>
                <!-- /search & aside toggle -->
            </div>
        </div>
        <!-- /Main Nav -->

        <!-- Aside Nav -->
        <div id="nav-aside">
            <!-- nav -->
        @include("layouts.frontend.partials.side-navbar")
        <!-- /nav -->

            <!-- widget posts -->
        @include("layouts.frontend.partials.sidenav-widgets")
        <!-- /widget posts -->

            <!-- categories -->
            <div class="section-row">
                <h2>Catagories</h2>
                <div class="category-widget">
                    <ul>
                        @forelse($categories->where('is_approved', 1) as $ckey => $category)
                            <li>
                                <a href="{{ route('frontend.category.posts', $category->slug) }}"
                                   class="cat-{{ ++$ckey }}">
                                    {{ $category->name }}
                                    <span>{{ count($category->posts) }}</span>
                                </a>
                            </li>
                        @empty
                            <span class="text-danger">
                                        {{ __("No category found!!!") }}
                            </span>
                        @endforelse
                    </ul>
                </div>
            </div>
            <!-- /categories -->

            <!-- aside nav close -->
            <button class="nav-aside-close"><i class="fa fa-times"></i></button>
            <!-- /aside nav close -->
        </div>
        <!-- Aside Nav -->
    </div>
    <!-- /Nav -->


    <!-- Page Header -->
@yield("page-header")
<!-- /Page Header -->
</header>
