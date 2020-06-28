@extends("layouts.backend.app")

@section("title", "Show Permission")

@section("content")

@section("content-header", "Show permission")
@section("from-breadcrumb", "Show permission")
@section("breadcrumb-url", route('admin.permissions.index'))
@section("to-breadcrumb", "Dashboard")

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <h1>Users</h1>
                        <a class="btn btn-primary" href="{{ route('admin.permissions.index') }}">
                            Back
                        </a>
                    </h3>
                </div>
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
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse( $permission->users as $key => $user )
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td>{{ $user->updated_at->diffForHumans() }}</td>
                                <td>
                                    {{ implode(', ',$user->roles()->get()->pluck('name')->toArray()) }}
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm"
                                       href="{{ route('admin.user.edit', $user->slug) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <button onclick="deleteItem({{ $user->id }})" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                        <form id="delete-form-{{ $user->id }}"
                                              action="{{ route('admin.permission.remove.user',['user' => $user->id, 'permission' => $permission->id]) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </button>
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
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <h1>Roles</h1>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse( $permission->roles as $key => $role )
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->created_at->diffForHumans() }}</td>
                                <td>{{ $role->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm"
                                       href="{{ route('admin.roles.edit', $role->slug) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <button onclick="deleteItem({{ $role->id }})" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                        <form id="delete-form-{{ $role->id }}"
                                              action="{{ route('admin.permission.remove.role', ['role' => $role->id, 'permission' => $permission->id]) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </button>
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
                            <th>Action</th>
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
