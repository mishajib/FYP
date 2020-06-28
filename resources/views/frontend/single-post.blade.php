@extends("layouts.frontend.app")

@section("title", $post->title)

@section("page-header")
    <div id="post-header" class="page-header">
        <div class="background-img"
             style="background-image: url({{ asset('storage/post/'.$post->image) }});"></div>
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
                        <div class="post-shares sticky-shares">
                            <a href="{{ route('frontend.home') }}" class="share-facebook"><i class="fa fa-facebook"></i></a>
                            <a href="{{ route('frontend.home') }}" class="share-twitter"><i
                                    class="fa fa-twitter"></i></a>
                            <a href="{{ route('frontend.home') }}" class="share-google-plus"><i
                                    class="fa fa-google-plus"></i></a>
                            <a href="{{ route('frontend.home') }}" class="share-pinterest"><i
                                    class="fa fa-pinterest"></i></a>
                            <a href="{{ route('frontend.home') }}" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
                            <a href="{{ route('frontend.home') }}"><i class="fa fa-envelope"></i></a>
                        </div>
                    </div>

                    <!-- ad -->
                    <div class="section-row text-center">
                        <a href="{{ route('frontend.home') }}" style="display: inline-block;margin: auto;">
                            <img class="img-responsive" src="{{ asset('assets/frontend/img/ad-2.jpg') }}" alt="">
                        </a>
                    </div>
                    <!-- ad -->

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
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat.</p>
                                    <ul class="author-social">
                                        <li><a href="{{ route('frontend.home') }}"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li><a href="{{ route('frontend.home') }}"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li><a href="{{ route('frontend.home') }}"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li><a href="{{ route('frontend.home') }}"><i class="fa fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /author -->

                    <!-- comments -->
                    <div class="section-row">
                        <div class="section-title">
                            <h2>3 Comments</h2>
                        </div>

                        <div class="post-comments">
                            <!-- comment -->
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="{{ asset('assets/frontend/img/avatar.png') }}"
                                         alt="">
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <h4>John Doe</h4>
                                        <span class="time">March 27, 2018 at 8:00 am</span>
                                        <a href="{{ route('frontend.home') }}" class="reply">Reply</a>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat.</p>

                                    <!-- comment -->
                                    <div class="media">
                                        <div class="media-left">
                                            <img class="media-object"
                                                 src="{{ asset('assets/frontend/img/avatar.png') }}" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="media-heading">
                                                <h4>John Doe</h4>
                                                <span class="time">March 27, 2018 at 8:00 am</span>
                                                <a href="{{ route('frontend.home') }}" class="reply">Reply</a>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                commodo consequat.</p>
                                        </div>
                                    </div>
                                    <!-- /comment -->
                                </div>
                            </div>
                            <!-- /comment -->

                            <!-- comment -->
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="{{ asset('assets/frontend/img/avatar.png') }}"
                                         alt="">
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <h4>John Doe</h4>
                                        <span class="time">March 27, 2018 at 8:00 am</span>
                                        <a href="{{ route('frontend.home') }}" class="reply">Reply</a>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat.</p>
                                </div>
                            </div>
                            <!-- /comment -->
                        </div>
                    </div>
                    <!-- /comments -->

                    <!-- reply -->
                    <div class="section-row">
                        <div class="section-title">
                            <h2>Leave a reply</h2>
                            <p>your email address will not be published. required fields are marked *</p>
                        </div>
                        <form class="post-reply">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span>Name *</span>
                                        <input class="input" type="text" name="name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span>Email *</span>
                                        <input class="input" type="email" name="email">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span>Website</span>
                                        <input class="input" type="text" name="website">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="input" name="message" placeholder="Message"></textarea>
                                    </div>
                                    <button class="primary-button">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /reply -->
                </div>
                <!-- /Post content -->

                <!-- aside -->
                <div class="col-md-4">
                    <!-- ad -->
                    <div class="aside-widget text-center">
                        <a href="{{ route('frontend.home') }}" style="display: inline-block;margin: auto;">
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

                    <!-- post widget -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2>Featured Posts</h2>
                        </div>
                        @forelse($posts->take(2) as $post)
                            <div class="post post-thumb">
                                <a class="post-img" href="#">
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
                                        <a href="#" class="cat-{{ ++$ckey }}">
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
                                <li><a href="{{ route('frontend.home') }}">January 2018</a></li>
                                <li><a href="{{ route('frontend.home') }}">Febuary 2018</a></li>
                                <li><a href="{{ route('frontend.home') }}">March 2018</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /archive -->
                </div>
                <!-- /aside -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@stop
