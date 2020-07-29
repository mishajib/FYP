@extends("layouts.backend.app")

@section("title", "Give User Permission")

@section("content-header", "Give User Permission")
@section("from-breadcrumb", "Give user permission")
@section("breadcrumb-url", route('admin.permission.all.user-permission'))
@section("to-breadcrumb", "Dashboard")

@section("content")
    <div class="card">
        <!-- form start -->
        <form role="form"
              action="{{ route('admin.permission.store.give.user-permission') }}"
              method="POST">
            @csrf

            <div class="card-body">

                <div class="form-group">
                    <label>Select User</label>
                    <select name="user"
                            data-placeholder="Select User"
                            class="form-control select2bs4"
                            id="select" style="width: 100%;">
                        <option value=""></option>
                        @forelse($users as $user)
                            <option
                                value="{{ $user->id }}">{{ $user->name }}</option>
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
                    <select name="permissions[]"
                            data-placeholder="Select Permission"
                            multiple="multiple"
                            class="form-control select2bs4"
                            id="select2" style="width: 100%;">
                        <option value=""></option>
                        @forelse($permissions as $permission)
                            <option
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
