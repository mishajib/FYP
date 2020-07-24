@extends("layouts.frontend.app")

@section("title", $post->title)

@section("page-header")
<div id="post-header" class="page-header">
    <div class="background-img" style="background-image: url({{ asset('storage/post/'.$post->image) }});"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
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
                <h1>{{ $post->title }}</h1>
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
            <!-- Post content -->
            <div class="col-md-8">
                <div class="section-row sticky-container">
                    <div class="main-post">
                        <h3>{{ $post->title }}</h3>
                        {!! html_entity_decode($post->body) !!}
                    </div>
                </div>

                <!-- author -->
                <div class="section-row">
                    <div class="post-author">
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="{{ asset('storage/profile/'.$post->user->image) }}"
                                    alt="{{ $post->user->username }}">
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <h3>{{ $post->user->name }}</h3>
                                </div>
                                <p>{{ $post->user->about }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /author -->

                <!-- comments -->
                <div class="section-row">
                    <div class="section-title">
                        <h2>{{ $post->comments()->count() }} Comments</h2>
                    </div>

                    <div class="post-comments">
                        @forelse ($post->comments as $comment)
                        <!-- comment -->
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="{{ asset('storage/profile/'.$comment->user->image) }}"
                                    alt="">
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <h4>{{ $comment->user->name }}</h4>
                                    <span class="time">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                <p>{{ $comment->comment }}</p>
                            </div>
                        </div>
                        <!-- /comment -->
                        @empty
                        <p>No comment yet. Be the first :)</p>
                        @endforelse

                    </div>
                </div>
                <!-- /comments -->

                <!-- reply -->
                <div class="section-row">
                    <div class="section-title">
                        <h2>Leave a reply</h2>
                    </div>
                    @guest
                    <p>
                        For post a new comment. You need to login first. <a href="{{ route('login') }}">Login</a>
                    </p>
                    @else
                    <form class="post-reply" action="{{ route('comment.store', $post->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="input" name="message" placeholder="Message"></textarea>
                                </div>
                                <button class="primary-button">Submit</button>
                            </div>
                        </div>
                    </form>
                    @endguest
                </div>
                <!-- /reply -->
            </div>
            <!-- /Post content -->

            <!-- aside -->
            <div class="col-md-4">

                <!-- post widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Most Read</h2>
                    </div>

                    @forelse($mostReadPost->take(4) as $post)
                    <div class="post post-widget">
                        <a class="post-img" href="{{ route('frontend.post.details', $post->slug) }}">
                            <img src="{{ asset('storage/post/'.$post->image) }}" alt="{{ $post->title }}">
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
                            <img src="{{ asset('storage/post/'.$post->image) }}" alt="{{ $post->title }}">
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
                                <a href="#">
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
                        <ul>
                            @forelse($post->categories as $ckey => $category)
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
            <!-- /aside -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
@stop