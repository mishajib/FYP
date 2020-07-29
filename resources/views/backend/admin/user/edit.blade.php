@extends("layouts.backend.app")

@section("title", "Edit user")

@section("content-header", "Edit user")
@section("from-breadcrumb", "Users")
@section("breadcrumb-url", route('admin.user.index'))
@section("to-breadcrumb", "Dashboard")

@section("content")
    <div class="card card-primary">
        <!-- form start -->
        <form role="form"
              action="{{ route('admin.user.update', $user->id) }}"
              method="POST">
            @csrf
            @method("PUT")
            <div class="card-body">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control"
                           id="name" name="name" required
                           placeholder="Enter name"
                           value="{{ old('name') ?? $user->name }}">
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control"
                           id="username" name="username" required
                           placeholder="Enter username"
                           value="{{ old('username') ?? $user->username }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control"
                           id="email" name="email" required
                           placeholder="Enter email"
                           value="{{ old('email') ?? $user->email }}">
                </div>

                <div class="form-group">
                    <label for="mobile">Phone Number</label>
                    <input type="text" class="form-control"
                           id="mobile" name="mobile" required
                           placeholder="Enter phone number"
                           value="{{ old('mobile') ?? $user->phone_number }}">
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a class="btn btn-dark"
                   href="{{ route('admin.user.index') }}">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </form>
    </div>
@stop
