@extends("layouts.backend.app")

@section("title", "Show Post" . " (" . $post->title . ")")

@section("content-header", "Show Post")
@section("from-breadcrumb", "Show Post")
@section("breadcrumb-url", route('admin.post.index'))
@section("to-breadcrumb", "Dashboard")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-danger"
               href="{{ route('admin.post.index') }}">Back</a>

            @if($post->is_approved == false)
                <button type="button" class="btn btn-success float-right"
                        onclick="approvePost({{ $post->id }})">
                    <i class="fa fa-check"></i>
                    <span>Pending</span>
                </button>
                <form action="{{ route('admin.post.approved', $post->id) }}"
                      id="approval-form"
                      style="display: none;" method="POST">
                    @csrf
                    @method('PUT')
                </form>
            @else
                <button type="button"
                        class="btn btn-success float-right waves-effect"
                        disabled>
                    <i class="fa fa-check"></i>
                    <span>Approved</span>
                </button>
            @endif
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-8">
            <div class="card card-info">
                <div class="card-header">
                    <h1>{{ $post->title }}</h1>
                    <small>Posted by
                        <strong>{{ $post->user->name }}</strong>
                        on {{ $post->created_at->toFormattedDateString() }}
                    </small>
                </div>
                <div class="card-body">
                    {!! $post->body !!}
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-maroon">
                <div class="card-header">
                    <h1>Categories</h1>
                </div>
                <div class="card-body">
                    @forelse($post->categories as $category)
                        <span
                            class="badge badge-success">{{ $category->name }}</span>
                    @empty
                        <span
                            class="text-danger">{{ __("No category found!!!") }}</span>
                    @endforelse
                </div>
            </div>

            <div class="card card-indigo">
                <div class="card-header">
                    <h1>Tags</h1>
                </div>
                <div class="card-body">
                    @forelse($post->tags as $tag)
                        <span
                            class="badge badge-primary">{{ $tag->name }}</span>
                    @empty
                        <span
                            class="text-danger">{{ __("No tag found!!!") }}</span>
                    @endforelse
                </div>
            </div>

            <div class="card card-green">
                <div class="card-header">
                    <h1>Featured Image</h1>
                </div>
                <div class="card-body">
                    <img class="img-responsive img-thumbnail"
                         src="{{ asset('storage/post/'.$post->image) }}"
                         alt="{{ $post->title }}">
                </div>
            </div>
        </div>
    </div>
@stop
