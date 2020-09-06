@extends("layouts.backend.app")

@section("title", "Users Trash")

@section("content-header", "Trash user")
@section("from-breadcrumb", "Users")
@section("breadcrumb-url", route('admin.user.index'))
@section("to-breadcrumb", "Dashboard")

@section("content")
    <div class="card">
        <div class="card-body">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Deleted By</th>
                    <th>Roles</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $users as $key => $user )
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->deleted_by }}</td>
                        <td>
                            {{ count($user->getRoleNames()) }}
                        </td>
                        <td>
                            <button class="btn btn-dark btn-sm"
                                    onclick="restoreFunction({{ $user->id }});">
                                <i class="fas fa-trash-restore"></i>
                                <form id="restore-form-{{ $user->id }}"
                                      action="{{ route('admin.user-trash.restore', $user->id) }}"
                                      method="POST">
                                    @csrf
                                    @method("PUT")
                                </form>
                            </button>
                            <button onclick="deleteItem({{ $user->id }})"
                                    class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                                <form id="delete-form-{{ $user->id }}"
                                      action="{{ route('admin.user-trash.destroy', $user->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="7">
                            <span class="text-danger h3">No data found!</span>
                        </td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Deleted By</th>
                    <th>Roles</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@stop
