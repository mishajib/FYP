@extends("layouts.backend.app")

@section("title", "Permissions")

@section("content-header", "Permissions")
@section("from-breadcrumb", "Permissions")
@section("breadcrumb-url", route('admin.permissions.index'))
@section("to-breadcrumb", "Dashboard")

@section("content")
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a class="btn btn-primary"
                   href="{{ route('admin.permissions.create') }}">
                    Add new permission
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
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>User</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $permissions as $key => $permission )
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->created_at->diffForHumans() }}</td>
                        <td>{{ $permission->updated_at->diffForHumans() }}</td>
                        <td>
                            @forelse($permission->users->chunk(5) as $chunk)
                                <br>
                                @foreach($chunk as $user)
                                    <span
                                        class="badge badge-success">
                                                {{ $user->name }}
                                            </span>
                                @endforeach
                            @empty
                                <span
                                    class="text-danger">No user found!!!</span>
                            @endforelse
                        </td>
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
                        <td>
                            <a class="btn btn-dark btn-sm"
                               href="{{ route('admin.permissions.show', $permission->slug) }}">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a class="btn btn-info btn-sm"
                               href="{{ route('admin.permissions.edit', $permission->slug) }}">
                                <i class="far fa-edit"></i>
                            </a>
                            <button
                                onclick="deleteItem({{ $permission->id }})"
                                class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                                <form
                                    id="delete-form-{{ $permission->id }}"
                                    action="{{ route('admin.permissions.destroy', $permission->id) }}"
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
                            <span class="text-danger h3">No data found!</span>
                        </td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>User</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@stop
