@extends("layouts.backend.app")

@section("title", "Posts")

@section("content-header", "Posts")
@section("from-breadcrumb", "Posts")
@section("breadcrumb-url", route('user.post.index'))
@section("to-breadcrumb", "Dashboard")

@section("content")
    <div class="card">
        @can('create post')
            <div class="card-header">
                <h3 class="card-title">
                    <a class="btn btn-primary"
                       href="{{ route('user.post.create') }}">
                        Add new post
                    </a>
                </h3>
            </div>
    @endcan
    <!-- /.card-header -->
        <div class="card-body">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Is Approved</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $posts as $key => $post )
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <img class="img-responsive img-size-64"
                                 src="{{ asset('storage/post/'.$post->image) }}"
                                 alt="{{ $post->title }}">
                        </td>
                        <td>{{ Str::limit($post->title, '15') }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>
                            @if($post->status == true)
                                <span
                                    class="badge badge-success">Published</span>
                            @else
                                <span class="badge badge-danger">Pending</span>
                            @endif
                        </td>
                        <td>
                            @if($post->is_approved == true)
                                <span
                                    class="badge badge-success">Approved</span>
                            @else
                                <span class="badge badge-danger">Pending</span>
                            @endif
                        </td>
                        <td>{{ $post->created_at->diffForHumans() }}</td>
                        <td>{{ $post->updated_at->diffForHumans() }}</td>
                        <td>
                            @can('access post')
                                <a class="btn btn-dark btn-sm"
                                   href="{{ route('user.post.show', $post->slug) }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                            @endcan

                            @can('edit post')
                                @if(!$post->user->hasRole(['super', 'admin']) && Auth::id() == $post->user->id)
                                    <a class="btn btn-info btn-sm"
                                       href="{{ route('user.post.edit', $post->slug) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                @endif
                            @endcan

                            @can('delete post')
                                @if(!$post->user->hasRole(['super', 'admin']) && Auth::id() == $post->user->id)
                                    <button
                                        onclick="deleteItem({{ $post->id }})"
                                        class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                        <form id="delete-form-{{ $post->id }}"
                                              action="{{ route('user.post.destroy', $post->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </button>
                                @endif
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">
                            <span class="text-danger h3">No data found!</span>
                        </td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Is Approved</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@stop
