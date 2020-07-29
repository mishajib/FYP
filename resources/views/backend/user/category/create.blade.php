@extends("layouts.backend.app")

@section("title", "Create Category")

@section("content-header", "Add new category")
@section("from-breadcrumb", "Create Category")
@section("breadcrumb-url", route('user.categories.index'))
@section("to-breadcrumb", "Dashboard")

@section("content")
    <div class="card">
        <!-- form start -->
        <form role="form"
              action="{{ route('user.categories.store') }}"
              method="POST">
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control"
                           id="name" name="name" required
                           placeholder="Enter name"
                           value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label>Parent Category</label>
                    <select name="category"
                            data-placeholder="Select parent category"
                            class="form-control select2bs4"
                            id="select" style="width: 100%;">
                        <option></option>
                        @forelse($categories as $category)
                            <option
                                value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                            <option disabled selected="selected">No
                                categories found!!!
                            </option>
                        @endforelse
                    </select>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a class="btn btn-dark"
                   href="{{ route('user.categories.index') }}">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </form>
    </div>
@stop
