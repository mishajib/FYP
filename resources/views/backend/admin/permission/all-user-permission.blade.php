@extends("layouts.backend.app")

@section("title", "All User And Permission")

@section("content")

@section("content-header", "All user and permission")
@section("from-breadcrumb", "All user and permission")
@section("breadcrumb-url", route('admin.permission.all.user-permission'))
@section("to-breadcrumb", "Dashboard")

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a class="btn btn-primary"
                           href="{{ route('admin.permission.give.user-permision') }}">
                            Add new user permission
                        </a>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Permission Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse( $users as $key => $user )
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @forelse($user->permissions->chunk(5) as $chunk)
                                        <br>
                                        @foreach($chunk as $permission)
                                            <span class="badge badge-success">
                                                {{ $permission->name }}
                                            </span>
                                        @endforeach
                                    @empty
                                        <span class="text-danger">No permission found!!!</span>
                                    @endforelse
                                </td>
                                <td>
                                    <a class="btn btn-dark btn-sm"
                                       href="{{ route('admin.permission.show.user-permission', $user->slug) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a class="btn btn-info btn-sm"
                                       href="{{ route('admin.permission.edit.user-permission', $user->slug) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <button onclick="deleteItem({{ $user->id }})" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                        <form id="delete-form-{{ $user->id }}"
                                              action="{{ route('admin.permission.delete.user-permission', $user->id) }}"
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
                            <th>Role Name</th>
                            <th>Permission Name</th>
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
