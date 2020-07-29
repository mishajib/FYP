@extends("layouts.backend.app")

@section("title", "Create Permission")

@section("content-header", "Add new permission")
@section("from-breadcrumb", "Create Permission")
@section("breadcrumb-url", route('admin.permissions.index'))
@section("to-breadcrumb", "Dashboard")

@section("content")
    <div class="card">
        <!-- form start -->
        <form role="form" action="{{ route('admin.permissions.store') }}"
              method="POST">
            @csrf

            <div class="card-body">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name"
                           name="name" required
                           placeholder="Enter name"
                           value="{{ old('name') }}">
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a class="btn btn-dark"
                   href="{{ route('admin.permissions.index') }}">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit
                </button>
            </div>
        </form>
    </div>
@stop
