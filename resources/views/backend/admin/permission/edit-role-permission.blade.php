@extends("layouts.backend.app")

@section("title", "Edit Role Permission")

@section("content")
@section("content-header", "Edit Role Permission")
@section("from-breadcrumb", "Edit role permission")
@section("breadcrumb-url", route('admin.permission.all.role-permission'))
@section("to-breadcrumb", "Dashboard")

<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit role permission</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('admin.permission.update.role-permission', $frole->id) }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="card-body">

                        <div class="form-group">
                            <label>Select Role</label>
                            <select data-placeholder="Select Role" name="role" class="form-control select2bs4" id="select" style="width: 100%;">
                                <option value=""></option>
                                @forelse($roles as $role)
                                    <option {{ ($role->id == $frole->id) ? 'selected':'' }} value="{{ $role->id }}">{{ $role->name }}</option>
                                @empty
                                    <option disabled selected="selected">
                                        <span class="text-danger">No user found!!!<</span>
                                    </option>
                                @endforelse
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Select Permission</label>
                            <select name="permissions[]" multiple="multiple" data-placeholder="Select Permissions" class="form-control select2bs4" id="select2" style="width: 100%;">
                                <option value=""></option>
                                @forelse($permissions as $permission)
                                    <option
                                        @foreach($frole->permissions as $upermission)
                                            {{ ($upermission->id == $permission->id) ? 'selected':'' }}
                                        @endforeach
                                        value="{{ $permission->id }}">{{ $permission->name }}</option>
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
                        <a class="btn btn-dark" href="{{ route('admin.permission.all.role-permission') }}">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
