@extends("layouts.backend.app")

@section("title", "Show tag")

@section("content")

@section("content-header", "Show tag")
@section("from-breadcrumb", "Show tag")
@section("breadcrumb-url", route('admin.tags.index'))
@section("to-breadcrumb", "Dashboard")


<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->created_at }}</td>
                    <td>{{ $tag->updated_at }}</td>
                </tr>
            </tbody>
            <tfoot>
            <tr>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@stop
