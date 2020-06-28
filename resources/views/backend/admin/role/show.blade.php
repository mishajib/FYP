@extends("layouts.backend.app")

@section("title", "Show Role")

@section("content")

@section("content-header", "Show role")
@section("from-breadcrumb", "Roles")
@section("breadcrumb-url", route('admin.roles.index'))
@section("to-breadcrumb", "Dashboard")


<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Role</th>
            </tr>
            </thead>
            <tbody>
            @forelse( $role->users as $key => $user )
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                    <td>
                        {{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}
                    </td>
                </tr>
            @empty
                <p class="text-danger">No data found!!!</p>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>User</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@stop
