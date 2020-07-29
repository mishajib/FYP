@extends("layouts.backend.app")

@section("title", "Edit Tag")

@section("content-header", "Edit tag")
@section("from-breadcrumb", "Edit tag")
@section("breadcrumb-url", route('user.tags.index'))
@section("to-breadcrumb", "Dashboard")

@section("content")
    <div class="card">
        <!-- form start -->
        <form role="form"
              action="{{ route('user.tags.update', $tag->id) }}"
              method="POST">
            @csrf
            @method("PUT")
            <div class="card-body">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control"
                           id="name" name="name" required
                           placeholder="Enter name"
                           value="{{ old('name') ?? $tag->name }}">
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a class="btn btn-dark"
                   href="{{ route('user.tags.index') }}">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </form>
    </div>
@stop
