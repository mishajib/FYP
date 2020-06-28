@extends("layouts.backend.app")

@section("title", "Roles")

@section("content")

@section("content-header", "Roles")
@section("from-breadcrumb", "Roles")
@section("breadcrumb-url", route('admin.roles.index'))
@section("to-breadcrumb", "Dashboard")

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a class="btn btn-primary" href="{{ route('admin.roles.create') }}">
                            Add new role
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
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse( $roles as $key => $role )
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->created_at->diffForHumans() }}</td>
                                <td>{{ $role->updated_at->diffForHumans() }}</td>
                                <td>
                                    @forelse($role->users->chunk(5) as $chunk)
                                        <br>
                                        @foreach($chunk as $user)
                                            <span class="badge badge-success">
                                                {{ $user->name }}
                                            </span>
                                        @endforeach
                                    @empty
                                        <span class="text-danger">No user found!!!</span>
                                    @endforelse
                                </td>
                                <td>
                                    <a class="btn btn-dark btn-sm" href="{{ route('admin.roles.show', $role->slug) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.roles.edit', $role->slug) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <button onclick="deleteItem({{ $role->id }})" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                        <form id="delete-form-{{ $role->id }}"
                                              action="{{ route('admin.roles.destroy', $role->id) }}" method="POST">
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
                            <th>User</th>
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
