@extends("layouts.backend.app")

@section("title", "Admins")

@section("content-header", "Admins")
@section("from-breadcrumb", "Admins")
@section("breadcrumb-url", route('admin.user.admin.index'))
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
                        <td>
                            {{ count($user->getRoleNames()) }}
                        </td>
                        <td>
                            <a class="btn btn-dark btn-sm"
                               href="{{ route('admin.user.show', $user->id) }}">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a class="btn btn-info btn-sm"
                               href="{{ route('admin.user.edit', $user->id) }}">
                                <i class="far fa-edit"></i>
                            </a>
                            <button onclick="deleteItem({{ $user->id }})"
                                    class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                                <form id="delete-form-{{ $user->id }}"
                                      action="{{ route('admin.user.destroy', $user->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="5">
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
