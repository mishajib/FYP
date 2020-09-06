@extends("layouts.frontend.app")

@section("title", "Home")

@section("content")
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="row cats" style="margin-bottom: 50px;">
                        <h2 class="text-center" style="margin-bottom: 30px;">All Categories</h2>
                        @foreach($all_cats as $cat)
                            <a href="{{ route('frontend.category.posts', $cat->slug) }}">
                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="card text-center" style="box-shadow: 0 0 10px black; padding: 10px; padding-top: 20px;">
                                        <h3 class="card-title">
                                            {{ $cat->name }}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                <h2 class="h2 text-center" style="margin-top: 50px; margin-bottom: 20px;">Featured Post</h2>
                <!-- post -->
                @forelse($posts->take(2) as $post)
                    <div class="col-md-6">
                        <div class="post post-thumb">
                            <a class="post-img"
                               href="{{ route('frontend.post.details', $post->slug) }}">
                                <img
                                        src="{{ asset('storage/post/'.$post->image) }}"
                                        alt="{{ $post->title }}">
                            </a>
                            <div class="post-body">
                                <div class="post-meta">
                                    @forelse($post->categories->chunk(4) as $chunk)
                                        @foreach($chunk as $ckey => $category)
                                            <a class="post-category cat-{{ ++$ckey }}"
                                               href="{{ route('frontend.category.posts', $category->slug) }}">
                                                {{ $category->name }}
                                            </a>
                                        @endforeach
                                        <br><br>

                                    @empty
                                        <a href="javascript:void(0)"
                                           class="post-category">
                                            <span class="text-danger">
                                                {{ __("No category found!!!") }}
                                            </span>
                                        </a>
                                    @endforelse
                                    <span class="post-date">
                                        {{ $post->created_at->format('F d, Y') }}
                                    </span>
                                </div>
                                <h3 class="post-title">
                                    <a href="{{ route('frontend.post.details', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                    <p style="color: #fff; margin-top: 10px;
                                    font-size: 12px;"
                                       class="text-justify">
                                        {{
                                            Str::words(strip_tags($post->body), 15)
                                        }}
                                    </p>
                                </h3>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2><span
                                class="text-danger">{{ __('No post found!!!') }}</span>
                    </h2>
            @endforelse
            <!-- /post -->
            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Recent Posts</h2>
                    </div>
                </div>

                <!-- post -->
                @forelse($posts->take(6)->chunk(3) as $chunk)
                    @foreach($chunk as $post)
                        <div class="col-md-4">
                            <div class="post">
                                <a class="post-img"
                                   href="{{ route('frontend.post.details', $post->slug) }}">
                                    <img
                                            src="{{ asset('storage/post/'.$post->image) }}"
                                            alt="{{ $post->title }}">
                                </a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        @forelse($post->categories->chunk(3) as $chunk)
                                            @foreach($chunk as $ckey => $category)
                                                <a class="post-category cat-{{ ++$ckey }}"
                                                   href="{{ route('frontend.category.posts', $category->slug) }}">
                                                    {{ $category->name }}
                                                </a>
                                            @endforeach
                                            <br><br>

                                        @empty
                                            <a href="javascript:void(0)"
                                               class="post-category">
                                            <span class="text-danger">
                                                {{ __("No category found!!!") }}
                                            </span>
                                            </a>
                                        @endforelse
                                        <span class="post-date">
                                            {{ $post->created_at->format('F d, Y') }}
                                        </span>
                                    </div>
                                    <h3 class="post-title">
                                        <a href="{{ route('frontend.post.details', $post->slug) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="clearfix visible-md visible-lg"></div>
                @empty
                    <h1>
                        <span class="text-danger">
                            {{ __("No recent post found!!!") }}
                        </span>
                    </h1>
            @endforelse
            <!-- /post -->

            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                    @forelse($posts->take(7) as $key => $post)
                        @if(++$key == 1)
                            <!-- post -->
                                <div class="col-md-12">
                                    <div class="post post-thumb">
                                        <a class="post-img"
                                           href="{{ route('frontend.post.details', $post->slug) }}">
                                            <img
                                                    src="{{ asset('storage/post/'.$post->image) }}"
                                                    alt="{{ $post->title }}">
                                        </a>
                                        <div class="post-body">
                                            <div class="post-meta">
                                                @forelse($post->categories as $ckey => $category)
                                                    <a class="post-category cat-{{ ++$ckey }}"
                                                       href="{{ route('frontend.category.posts', $category->slug) }}">
                                                        {{ $category->name }}
                                                    </a>
                                                @empty
                                                    <a href="javascript:void(0)"
                                                       class="post-category">
                                            <span class="text-danger">
                                                {{ __("No category found!!!") }}
                                            </span>
                                                    </a>
                                                @endforelse
                                                <span class="post-date">
                                            {{ $post->created_at->format('F d, Y') }}
                                        </span>
                                            </div>
                                            <h3 class="post-title">
                                                <a href="{{ route('frontend.post.details', $post->slug) }}">
                                                    {{ $post->title }}
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- /post -->
                        @else
                            <!-- post -->
                                <div class="col-md-6">
                                    <div class="post">
                                        <a class="post-img"
                                           href="{{ route('frontend.post.details', $post->slug) }}">
                                            <img
                                                    src="{{ asset('storage/post/'.$post->image) }}"
                                                    alt="{{ $post->title }}">
                                        </a>
                                        <div class="post-body">
                                            <div class="post-meta">
                                                @forelse($post->categories->chunk(3) as $chunk)
                                                    @foreach($chunk as $ckey => $category)
                                                        <a class="post-category cat-{{ ++$ckey }}"
                                                           href="{{ route('frontend.category.posts', $category->slug) }}">
                                                            {{ $category->name }}
                                                        </a>
                                                    @endforeach
                                                    <br><br>

                                                @empty
                                                    <a href="javascript:void(0)"
                                                       class="post-category">
                                            <span class="text-danger">
                                                {{ __("No category found!!!") }}
                                            </span>
                                                    </a>
                                                @endforelse
                                                <span class="post-date">
                                            {{ $post->created_at->format('F d, Y') }}
                                        </span>
                                            </div>
                                            <h3 class="post-title">
                                                <a href="{{ route('frontend.post.details', $post->slug) }}">
                                                    {{ Str::limit($post->title, '35') }}
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- /post -->
                            @endif
                        @empty
                            <h2>
                                <span class="text-danger">
                                    {{ __('No posts found!!!') }}
                                </span>
                            </h2>
                        @endforelse
                        <div class="col-md-12">
                            <div class="section-row">
                                <p class="text-center">
                                    <a href="{{ route('frontend.posts') }}"
                                       class="primary-button">
                                        Load More
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- post widget -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2>Most Read</h2>
                        </div>
                        @forelse($mostReadPost->take(4) as $post)
                            <div class="post post-widget">
                                <a class="post-img"
                                   href="{{ route('frontend.post.details', $post->slug) }}">
                                    <img
                                            src="{{ asset('storage/post/'.$post->image) }}"
                                            alt="{{ $post->title }}">
                                </a>
                                <div class="post-body">
                                    <h3 class="post-title">
                                        <a href="{{ route('frontend.post.details', $post->slug) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        @empty
                            <h3>
                                <span class="text-danger">
                                    {{ __('No post found!!!') }}
                                </span>
                            </h3>
                        @endforelse
                    </div>
                    <!-- /post widget -->

                    <!-- post widget -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2>Featured Posts</h2>
                        </div>
                        @forelse($posts->take(2) as $post)
                            <div class="post post-thumb">
                                <a class="post-img" href="#">
                                    <img
                                            src="{{ asset('storage/post/'.$post->image) }}"
                                            alt="{{ $post->title }}">
                                </a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        @forelse($post->categories->chunk(3) as $chunk)
                                            @foreach($chunk as $ckey => $category)
                                                <a class="post-category cat-{{ ++$ckey }}"
                                                   href="{{ route('frontend.category.posts', $category->slug) }}">
                                                    {{ $category->name }}
                                                </a>
                                            @endforeach
                                            <br><br>

                                        @empty
                                            <a href="javascript:void(0)"
                                               class="post-category">
                                            <span class="text-danger">
                                                {{ __("No category found!!!") }}
                                            </span>
                                            </a>
                                        @endforelse
                                        <span class="post-date">
                                            {{ $post->created_at->format('F d, Y') }}
                                        </span>
                                    </div>
                                    <h3 class="post-title">
                                        <a href="{{ route('frontend.post.details', $post->slug) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        @empty
                            <h3>
                                <span class="text-danger">
                                    {{ __('No post found!!!') }}
                                </span>
                            </h3>
                        @endforelse

                    </div>
                    <!-- /post widget -->

                    <!-- ad -->
                    <div class="aside-widget text-center">
                        <a href="#" style="display: inline-block;margin: auto;">
                            <img class="img-responsive"
                                 src="{{ asset('assets/frontend/img/ad-1.jpg') }}"
                                 alt="">
                        </a>
                    </div>
                    <!-- /ad -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    <div class="section section-grey">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>Featured Posts</h2>
                    </div>
                </div>

                <!-- post -->
                @forelse($posts->take(3) as $post)
                    <div class="col-md-4">
                        <div class="post">
                            <a class="post-img"
                               href="{{ route('frontend.post.details', $post->slug) }}">
                                <img
                                        src="{{ asset('storage/post/'.$post->image) }}"
                                        alt="{{ $post->title }}">
                            </a>
                            <div class="post-body">
                                <div class="post-meta">
                                    @forelse($post->categories->chunk(3) as $chunk)
                                        @foreach($chunk as $ckey => $category)
                                            <a class="post-category cat-{{ ++$ckey }}"
                                               href="{{ route('frontend.category.posts', $category->slug) }}">
                                                {{ $category->name }}
                                            </a>
                                        @endforeach
                                        <br><br>

                                    @empty
                                        <a href="javascript:void(0)"
                                           class="post-category">
                                            <span class="text-danger">
                                                {{ __("No category found!!!") }}
                                            </span>
                                        </a>
                                    @endforelse
                                    <span class="post-date">
                                            {{ $post->created_at->format('F d, Y') }}
                                        </span>
                                </div>
                                <h3 class="post-title">
                                    <a href="{{ route('frontend.post.details', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3>
                        <span class="text-danger">
                            {{ __("No post found!!!") }}
                        </span>
                    </h3>
            @endforelse
            <!-- /post -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h2>Most Read</h2>
                            </div>
                        </div>
                        <!-- post -->
                        <div class="post-scroll">
                            @forelse($mostReadPost->take(4) as $post)
                                <div class="col-md-12">
                                    <div class="post post-row">
                                        <a class="post-img"
                                           href="{{ route('frontend.post.details', $post->slug) }}">
                                            <img
                                                    src="{{ asset('storage/post/'.$post->image) }}"
                                                    alt="{{ $post->title }}">
                                        </a>
                                        <div class="post-body">
                                            <div class="post-meta">
                                                @forelse($post->categories->chunk(3) as $chunk)
                                                    @foreach($chunk as $ckey => $category)
                                                        <a class="post-category cat-{{ ++$ckey }}"
                                                           href="{{ route('frontend.category.posts', $category->slug) }}">
                                                            {{ $category->name }}
                                                        </a>
                                                    @endforeach
                                                    <br><br>

                                                @empty
                                                    <a href="javascript:void(0)"
                                                       class="post-category">
                                            <span class="text-danger">
                                                {{ __("No category found!!!") }}
                                            </span>
                                                    </a>
                                                @endforelse
                                                <span class="post-date">
                                            {{ $post->created_at->format('F d, Y') }}
                                        </span>
                                            </div>
                                            <h3 class="post-title">
                                                <a href="{{ route('frontend.post.details', $post->slug) }}">
                                                    {{ $post->title }}
                                                </a>
                                            </h3>
                                            <p>
                                                {{ Str::limit(strip_tags($post->body), '148', '...') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h3>
                                <span class="text-danger">
                                    {{ __("No data found!!!") }}
                                </span>
                                </h3>
                            @endforelse
                        <!-- /post -->
                            {{ $mostReadPost->links() }}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- ad -->
                    <div class="aside-widget text-center">
                        <a href="{{ route('frontend.home') }}"
                           style="display: inline-block;margin: auto;">
                            <img class="img-responsive"
                                 src="{{ asset('assets/frontend/img/ad-1.jpg') }}"
                                 alt="">
                        </a>
                    </div>
                    <!-- /ad -->

                    <!-- catagories -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2>Catagories</h2>
                        </div>
                        <div class="category-widget">
                            <ul class="category-scroll">
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
                                {{ $categories->links() }}
                            </ul>
                        </div>
                    </div>
                    <!-- /catagories -->

                    <!-- tags -->
                    <div class="aside-widget">
                        <div class="tags-widget">
                            <ul>
                                @forelse($tags as $tag)
                                    <li>
                                        <a href="#">
                                            {{ $tag->name }}
                                        </a>
                                    </li>
                                @empty
                                    <span class="text-danger">
                                        {{ __("No tag found!!!") }}
                                    </span>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <!-- /tags -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@stop
