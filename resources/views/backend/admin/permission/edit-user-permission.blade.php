@extends("layouts.backend.app")

@section("title", "Edit User Permission")

@section("content-header", "Edit User Permission")
@section("from-breadcrumb", "Edit user permission")
@section("breadcrumb-url", route('admin.permission.all.user-permission'))
@section("to-breadcrumb", "Dashboard")

@section("content")
    <div class="card card-primary">
        <!-- form start -->
        <form role="form"
              action="{{ route('admin.permission.update.user-permission', $fuser->id) }}"
              method="POST">
            @csrf
            @method("PUT")
            <div class="card-body">

                <div class="form-group">
                    <label>Select User</label>
                    <select data-placeholder="Select User"
                            name="user"
                            class="form-control select2bs4"
                            id="select" style="width: 100%;">
                        <option value=""></option>
                        @forelse($users as $user)
                            <option
                                {{ ($user->id == $fuser->id) ? 'selected':'' }} value="{{ $user->id }}">{{ $user->name }}</option>
                        @empty
                            <option disabled selected="selected">
                                <span
                                    class="text-danger">No user found!!!<</span>
                            </option>
                        @endforelse
                    </select>
                </div>

                <div class="form-group">
                    <label>Select Permission</label>
                    <select name="permissions[]" multiple="multiple"
                            data-placeholder="Select Permissions"
                            class="form-control select2bs4"
                            id="select2" style="width: 100%;">
                        <option value=""></option>
                        @forelse($permissions as $permission)
                            <option
                                @foreach($fuser->permissions as $upermission)
                                {{ ($upermission->id == $permission->id) ? 'selected':'' }}
                                @endforeach
                                value="{{ $permission->id }}">{{ $permission->name }}</option>
                        @empty
                            <option disabled selected="selected">
                                <span
                                    class="text-danger">No role found!!!</span>
                            </option>
                        @endforelse
                    </select>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a class="btn btn-dark"
                   href="{{ route('admin.permission.all.user-permission') }}">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </form>
    </div>
@stop
