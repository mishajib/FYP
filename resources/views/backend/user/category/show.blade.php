@extends("layouts.backend.app")

@section("title", "Show category")

@section("content-header", "Show category")
@section("from-breadcrumb", "Show category")
@section("breadcrumb-url", route('user.categories.index'))
@section("to-breadcrumb", "Dashboard")

@section("content")
    <div class="card">
        <!-- /.card-header -->
        <div class="card-header bg-primary">
            <h1 class="text-center">
                {{ Str::upper($category->name) }}
            </h1>
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
                @forelse( $category->posts as $key => $post )
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <img class="img-responsive img-size-64"
                                 src="{{ asset('storage/post/'.$post->image) }}"
                                 alt="{{ $post->title }}">
                        </td>
                        <td>
                            <a href="{{ route('frontend.post.details',
                        $post->slug) }}" class="btn
                        btn-link">
                                {{ Str::limit($post->title, '15') }}
                            </a>
                        </td>
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
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@stop
