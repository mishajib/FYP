@extends("layouts.backend.app")

@section("title", "Roles")

@section("content")
@section("content-header", "Add new role")
@section("from-breadcrumb", "Roles")
@section("breadcrumb-url", route('admin.roles.index'))
@section("to-breadcrumb", "Dashboard")

<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add new role</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('admin.roles.store') }}" method="POST">
                    @csrf

                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required
                                   placeholder="Enter name" value="{{ old('name') }}">
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a class="btn btn-dark" href="{{ route('admin.roles.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
