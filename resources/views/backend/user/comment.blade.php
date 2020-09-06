@extends("layouts.backend.app")

@section("title", "All Comment")

@section("content-header", "All Comment")
@section("from-breadcrumb", "All Comment")
@section("breadcrumb-url", route('user.comment.index'))
@section("to-breadcrumb", "Dashboard")

@section("content")
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="datatable"
                   class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Post Title</th>
                    <th>Comment</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $comments as $key => $comment )
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td><a target="_blank"
                               href="{{ route('frontend.post.details',$comment->post->slug ??'') }}"
                               class="btn
                                    btn-link">{{
                                    @$comment->post->title
                                    }}</a></td>
                        <td>{{ $comment->comment }}</td>
                        <td>{{ $comment->created_at->diffForHumans() }}</td>
                        <td>
                            @if(Auth::user()->id == @$comment->user->id)
                                <button onclick="deleteItem({{ $comment->id }})"
                                        class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                    <form id="delete-form-{{ $comment->id }}"
                                          action="{{ route('admin.comment.destroy', $comment->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </button>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="6">
                                        <span
                                            class="text-danger h3">{{ __("No data found!") }}</span>
                        </td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Post Title</th>
                    <th>Comment</th>
                    <th>Time</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@stop
