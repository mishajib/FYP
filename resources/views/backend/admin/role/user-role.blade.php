@extends("layouts.backend.app")

@section("title", "Give User Role")

@section("content")
@section("content-header", "Give User Role")
@section("from-breadcrumb", "Give user role")
@section("breadcrumb-url", route('admin.roles.index'))
@section("to-breadcrumb", "Dashboard")

<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Give user role</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('admin.role.store.give.user-role') }}" method="POST">
                    @csrf

                    <div class="card-body">

                        <div class="form-group">
                            <label>Select User</label>
                            <select name="user" data-placeholder="Select User" class="form-control select2bs4" id="select" style="width: 100%;">
                                <option value=""></option>
                                @forelse($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
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
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
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
