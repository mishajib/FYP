@extends("layouts.backend.app")

@section("title", "Show tag")

@section("content-header", "Show tag")
@section("from-breadcrumb", "Show tag")
@section("breadcrumb-url", route('user.tags.index'))
@section("to-breadcrumb", "Dashboard")

@section("content")
    <div class="card">
        <div class="card-header bg-info">
            <h1 class="text-center">{{ Str::upper($tag->name) }}</h1>
        </div>
        <div class="card-body">
            <h1 class="text-center">ALL POST</h1>
            <table id="datatable" class="table">
                <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Created Time</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $tag->posts as $key => $post )
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <img class="img-responsive img-size-64"
                                 src="{{ asset('storage/post/'.$post->image) }}"
                                 alt="{{ $post->title }}">
                        </td>
                        <td>
                            <a href="{{ route('frontend.post.details', $post->slug) }}">
                                {{ Str::limit($post->title, '15') }}
                            </a>
                        </td>
                        <td>{{ $post->created_at->diffForHumans() }}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="4">
                            <span class="text-danger h3">No data found!</span>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
