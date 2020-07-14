@extends("layouts.backend.app")

@section("title", "Posts")

@section("content")

@section("content-header", "Posts")
@section("from-breadcrumb", "Posts")
@section("breadcrumb-url", route('admin.post.index'))
@section("to-breadcrumb", "Dashboard")


<div class="card">
    @can('create post')
        <div class="card-header">
            <h3 class="card-title">
                <a class="btn btn-primary" href="{{ route('admin.post.create') }}">
                    Add new post
                </a>
            </h3>
        </div>
@endcan
<!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
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
                        <img class="img-responsive img-size-64" src="{{ asset('storage/post/'.$post->image) }}"
                             alt="{{ $post->title }}">
                    </td>
                    <td>{{ Str::limit($post->title, '15') }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>
                        @if($post->status == true)
                            <span class="badge badge-success">Published</span>
                        @else
                            <span class="badge badge-danger">Pending</span>
                        @endif
                    </td>
                    <td>
                        @if($post->is_approved == true)
                            <span class="badge badge-success">Approved</span>
                        @else
                            <span class="badge badge-danger">Pending</span>
                        @endif
                    </td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                    <td>
                        @can('unpublish post')
                            @if($post->is_approved == true)
                                <button type="button" class="btn btn-danger btn-sm"
                                        onclick="pendingItem({{ $post->id }})">
                                    <i class="fa fa-check"></i>
                                </button>
                                <form action="{{ route('admin.post.pending', $post->id) }}"
                                      id="pending-form-{{ $post->id }}"
                                      style="display: none;" method="POST">
                                    @csrf
                                    @method('PUT')
                                </form>
                            @endif
                        @endcan

                        @can('access post')
                            <a class="btn btn-dark btn-sm" href="{{ route('admin.post.show', $post->slug) }}">
                                <i class="fas fa-eye"></i>
                            </a>
                        @endcan

                        @can('edit post')
                            <a class="btn btn-info btn-sm" href="{{ route('admin.post.edit', $post->slug) }}">
                                <i class="far fa-edit"></i>
                            </a>
                        @endcan

                        @can('delete post')
                            <button onclick="deleteItem({{ $post->id }})" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                                <form id="delete-form-{{ $post->id }}"
                                      action="{{ route('admin.post.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </button>
                        @endcan
                    </td>
                </tr>
            @empty
                <p class="text-danger">No data found!!!</p>
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
