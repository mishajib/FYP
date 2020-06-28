<div class="section-row">
    <h3>Recent Posts</h3>
    @forelse($recentPosts->take(4) as $post)
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
                {{ __("No post found!!!") }}
            </span>
        </h3>
    @endforelse
</div>
