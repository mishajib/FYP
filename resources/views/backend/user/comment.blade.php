@extends("layouts.backend.app")

@section("title", "All Comment")

@section("content-header", "All Comment")
@section("from-breadcrumb", "All Comment")
@section("breadcrumb-url", route('user.comment.index'))
@section("to-breadcrumb", "Dashboard")

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Post Title</th>
                                <th>Comment</th>
                                <th>Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse( $comments as $key => $comment )
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td><a target="_blank"
                                           href="{{ route('frontend.post.details', $comment->post->slug) }}"
                                           class="btn
                                    btn-link">{{
                                    $comment->post->title
                                    }}</a></td>
                                    <td>{{ $comment->comment }}</td>
                                    <td>{{ $comment->created_at->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">
                                        <span class="text-danger h3">{{ __("No data found!") }}</span>
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
            </div>
        </div>
    </div>
@stop
