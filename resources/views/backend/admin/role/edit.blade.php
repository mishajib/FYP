@extends("layouts.backend.app")

@section("title", "Edit Role")

@section("content-header", "Edit role")
@section("from-breadcrumb", "Roles")
@section("breadcrumb-url", route('admin.roles.index'))
@section("to-breadcrumb", "Dashboard")

@section("content")
    <div class="card">
        <!-- form start -->
        <form role="form"
              action="{{ route('admin.roles.update', $role->id) }}"
              method="POST">
            @csrf
            @method("PUT")
            <div class="card-body">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control"
                           id="name" name="name" required
                           placeholder="Enter name"
                           value="{{ old('name') ?? $role->name }}">
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a class="btn btn-dark"
                   href="{{ route('admin.roles.index') }}">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </form>
    </div>
@stop
