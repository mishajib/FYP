@extends("layouts.backend.app")

@section("title", "All Role Permissions")

@section("content-header", "All role permissions")
@section("from-breadcrumb", "All role permissions")
@section("breadcrumb-url", route('admin.permission.all.role-permission'))
@section("to-breadcrumb", "Dashboard")

@section("content")
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a class="btn btn-primary"
                   href="{{ route('admin.permission.all.role-permission') }}">
                    Back
                </a>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="datatable"
                   class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Permission Name</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $role->permissions as $key => $permission )
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>
                            @forelse($permission->roles->chunk(5) as $chunk)
                                <br>
                                @foreach($chunk as $role)
                                    <span
                                        class="badge badge-success">
                                                {{ $role->name }}
                                            </span>
                                @endforeach
                            @empty
                                <span
                                    class="text-danger">No role found!!!</span>
                            @endforelse
                        </td>
                        <td>{{ $permission->created_at->diffForHumans() }}</td>
                        <td>{{ $permission->updated_at->diffForHumans() }}</td>
                        <td>
                            <a class="btn btn-info btn-sm"
                               href="{{ route('admin.permissions.edit', $permission->id) }}">
                                <i class="far fa-edit"></i>
                            </a>
                            <button
                                onclick="deleteItem({{ $role->id }})"
                                class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                                <form
                                    id="delete-form-{{ $role->id }}"
                                    action="{{ route('admin.permission.delete.role-permission.from.show-page', ['role' => $role->id, 'permission' => $permission->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="6">
                            <span class="text-danger">No data found!</span>
                        </td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Permission Name</th>
                    <th>Role</th>
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
