@extends("layouts.backend.app")

@section("title", "Show User Permissions")

@section("content")

@section("content-header", "Show User permissions")
@section("from-breadcrumb", "Show user permissions")
@section("breadcrumb-url", route('admin.permission.all.user-permission'))
@section("to-breadcrumb", "Dashboard")

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a class="btn btn-primary" href="{{ route('admin.permission.all.user-permission') }}">
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
                            <th>Permission Name</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse( $user->permissions as $key => $permission )
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    @forelse($permission->users->chunk(5) as $chunk)
                                        <br>
                                        @foreach($chunk as $user)
                                            <span class="badge badge-success">
                                                {{ $user->name }}
                                            </span>
                                        @endforeach
                                    @empty
                                        <span class="text-danger">No role found!!!</span>
                                    @endforelse
                                </td>
                                <td>{{ $permission->created_at->diffForHumans() }}</td>
                                <td>{{ $permission->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm"
                                       href="{{ route('admin.permissions.edit', $permission->id) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <button onclick="deleteItem({{ $user->id }})" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                        <form id="delete-form-{{ $user->id }}"
                                              action="{{ route('admin.permission.delete.user-permission.from.show-page', ['user' => $user->id, 'permission' => $permission->id]) }}"
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
        </div>
    </div>
</div>

@stop
