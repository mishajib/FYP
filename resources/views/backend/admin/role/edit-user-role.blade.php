@extends("layouts.backend.app")

@section("title", "Edit User Role")

@section("content")
@section("content-header", "Edit User Role")
@section("from-breadcrumb", "Edit user role")
@section("breadcrumb-url", route('admin.role.all.user-role'))
@section("to-breadcrumb", "Dashboard")

<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit user role</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('admin.role.update.user-role', $fuser->id) }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="card-body">

                        <div class="form-group">
                            <label>Select User</label>
                            <select name="user" data-placeholder="Select User" class="form-control select2bs4" id="select" style="width: 100%;">
                                <option value=""></option>
                                @forelse($users as $user)
                                    <option {{ ($user->id == $fuser->id) ? 'selected':'' }} value="{{ $user->id }}">{{ $user->name }}</option>
                                    {{ $user->roles }}
                                @empty
                                    <option disabled selected="selected">
                                        <span class="text-danger">No user found!!!<</span>
                                    </option>
                                @endforelse
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Select Role</label>
                            <select name="role" data-placeholder="Select Role" class="form-control select2bs4" id="select2" style="width: 100%;">
                                <option value=""></option>
                                @forelse($roles as $role)
                                    <option
                                        @foreach($fuser->roles as $urole)
                                            {{ ($urole->id == $role->id) ? 'selected':'' }}
                                        @endforeach
                                        value="{{ $role->id }}">{{ $role->name }}</option>
                                @empty
                                    <option disabled selected="selected">
                                        <span class="text-danger">No role found!!!</span>
                                    </option>
                                @endforelse
                            </select>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a class="btn btn-dark" href="{{ route('admin.role.all.user-role') }}">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
