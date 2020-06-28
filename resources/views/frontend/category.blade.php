@extends("layouts.frontend.app")

@section("title", $category->name)

@section("page-header")
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <ul class="page-header-breadcrumb">
                        <li><a href="{{ route('frontend.home') }}">Home</a></li>
                        <li>{{ $category->name }}</li>
                    </ul>
                    <h1>{{ $category->name }}</h1>
                </div>
            </div>
        </div>
    </div>
@stop

@section("content")
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                    @forelse($posts->take(3) as $key => $post)
                        @if(++$key == 1)
                            <!-- post -->
                                <div class="col-md-12">
                                    <div class="post post-thumb">
                                        <a class="post-img" href="{{ route('frontend.post.details', $post->slug) }}">
                                            <img src="{{ asset('storage/post/'.$post->image) }}"
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
                                                    <a href="javascript:void(0)" class="post-category">
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
                                        <a class="post-img" href="{{ route('frontend.post.details', $post->slug) }}">
                                            <img src="{{ asset('storage/post/'.$post->image) }}"
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
                                                    <a href="javascript:void(0)" class="post-category">
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
                            @endif
                        @empty
                            <h2>
                            <span class="text-danger">
                                {{ __("No post found!!!") }}
                            </span>
                            </h2>
                        @endforelse

                        <div class="clearfix visible-md visible-lg"></div>

                        <!-- ad -->
                        <div class="col-md-12">
                            <div class="section-row">
                                <a href="#">
                                    <img class="img-responsive center-block"
                                         src="{{ asset('assets/frontend/img/ad-2.jpg') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- ad -->

                        <!-- post -->
                        <div class="post-scroll">
                            @forelse($posts as $post)
                                <div class="col-md-12">
                                    <div class="post post-row">
                                        <a class="post-img" href="{{ route('frontend.post.details', $post->slug) }}">
                                            <img src="{{ asset('storage/post/'.$post->image) }}"
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
                                                    <a href="javascript:void(0)" class="post-category">
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
                                <h2>
                                <span class="text-danger">
                                    {{ __("No post found!!!") }}
                                </span>
                                </h2>
                            @endforelse
                        <!-- /post -->

                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- ad -->
                    <div class="aside-widget text-center">
                        <a href="#" style="display: inline-block;margin: auto;">
                            <img class="img-responsive" src="{{ asset('assets/frontend/img/ad-1.jpg') }}" alt="">
                        </a>
                    </div>
                    <!-- /ad -->

                    <!-- post widget -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2>Most Read</h2>
                        </div>

                        @forelse($mostReadPost->take(4) as $post)
                            <div class="post post-widget">
                                <a class="post-img" href="{{ route('frontend.post.details', $post->slug) }}">
                                    <img src="{{ asset('storage/post/'.$post->image) }}"
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

                    <!-- catagories -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2>Catagories</h2>
                        </div>
                        <div class="category-widget">
                            <ul class="category-scroll">
                                @forelse($categories->where('is_approved', 1)->where('status', 1) as $ckey => $category)
                                    <li>
                                        <a href="{{ route('frontend.category.posts', $category->slug) }}"
                                           class="cat-{{ ++$ckey }}">
                                            {{ $category->name }}<span>{{ count($category->posts) }}</span>
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
                                @forelse($post->tags as $tag)
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

                    <!-- archive -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2>Archive</h2>
                        </div>
                        <div class="archive-widget">
                            <ul>
                                <li><a href="#">Jan 2018</a></li>
                                <li><a href="#">Feb 2018</a></li>
                                <li><a href="#">Mar 2018</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /archive -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@stop
