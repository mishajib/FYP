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
                    <div class="section-title">
                        <h1 class="text-center">All Posts</h1>
                    </div>
                </div>
                <!-- post -->
                <div class="post-scroll">
                    @forelse($posts as $post)
                        <div class="col-md-6">
                            <div class="post post-thumb">
                                <a class="post-img" href="{{ route('frontend.post.details', $post->slug) }}">
                                    <img src="{{ asset('storage/post/'.$post->image) }}" alt="">
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
                    @empty
                        <h1>
                                <span class="text-danger">
                                    {{ __("No data found!!!") }}
                                </span>
                        </h1>
                    @endforelse
                    {{ $posts->links() }}
                </div>
                <!-- /post -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

@stop
