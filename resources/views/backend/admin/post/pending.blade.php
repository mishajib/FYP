@extends("layouts.backend.app")

@section("title", "Pending Posts")

@section("content-header", "Pending posts")
@section("from-breadcrumb", "Pending posts")
@section("breadcrumb-url", route('admin.post.pending.page'))
@section("to-breadcrumb", "Dashboard")

@section("content")
    <div class="card">
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
                            @if($post->is_approved == false)
                                <button type="button"
                                        class="btn btn-success btn-sm"
                                        onclick="approveItem({{ $post->id }})">
                                    <i class="fa fa-check"></i>
                                </button>
                                <form
                                    action="{{ route('admin.post.approved', $post->id) }}"
                                    id="approved-form-{{ $post->id }}"
                                    style="display: none;" method="POST">
                                    @csrf
                                    @method('PUT')
                                </form>
                            @endif
                            <a class="btn btn-dark btn-sm"
                               href="{{ route('admin.post.show', $post->slug) }}">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a class="btn btn-info btn-sm"
                               href="{{ route('admin.post.edit', $post->slug) }}">
                                <i class="far fa-edit"></i>
                            </a>
                            <button onclick="deleteItem({{ $post->id }})"
                                    class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                                <form id="delete-form-{{ $post->id }}"
                                      action="{{ route('admin.post.destroy', $post->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="9">
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
