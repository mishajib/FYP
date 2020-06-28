@extends("layouts.backend.app")

@section("title", "All User Role")

@section("content")

@section("content-header", "All User Role")
@section("from-breadcrumb", "All user role")
@section("breadcrumb-url", route('admin.role.all.user-role'))
@section("to-breadcrumb", "Dashboard")


<div class="card">
    <div class="card-header">
        <h3 class="card-title"><a class="btn btn-primary" href="{{ route('admin.role.give.user-role') }}">Add new user role</a></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Role Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @forelse( $users as $key => $user )
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            @forelse($user->roles as $role)
                                <span class="badge badge-success">{{ $role->name }}</span>
                            @empty
                                <span class="text-danger">No role found!!!</span>
                            @endforelse
                        </td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('admin.role.edit.user-role', $user->slug) }}">
                                <i class="far fa-edit"></i>
                            </a>
                            <button onclick="deleteItem({{ $user->id }})" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                                <form id="delete-form-{{ $user->id }}"
                                      action="{{ route('admin.role.delete.user-role', $user->id) }}" method="POST">
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
                    <th>User Name</th>
                    <th>Role Name</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@stop
