@extends("layouts.frontend.app")

@section("title", $tag->name)

@section("page-header")
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <ul class="page-header-breadcrumb">
                        <li><a href="{{ route('frontend.home') }}">Home</a></li>
                        <li>{{ $tag->name }}</li>
                    </ul>
                    <h1>{{ $tag->name }}</h1>
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
                    @forelse( $posts->take(3) as $key => $post )
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

                        <!-- post -->
                        <div class="post-scroll">
                            @forelse($posts as $post)
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
                                        <a href="{{  route('frontend.tag.posts', $tag->slug) }}">
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
