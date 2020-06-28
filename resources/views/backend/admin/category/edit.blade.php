@extends("layouts.backend.app")

@section("title", "Edit Category")

@section("content")
@section("content-header", "Edit category")
@section("from-breadcrumb", "Edit category")
@section("breadcrumb-url", route('admin.categories.index'))
@section("to-breadcrumb", "Dashboard")

<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required
                                   placeholder="Enter name" value="{{ old('name') ?? $category->name }}">
                        </div>

                        <div class="form-group">
                            <label>Parent Category</label>
                            <select name="category" data-placeholder="Select parent category" class="form-control select2bs4" id="select" style="width: 100%;">
                                @forelse($categories as $parent)
                                    <option {{ $category->parent_id == $parent->id ? 'selected':'' }}
                                            value="{{ $parent->id }}">{{ $parent->name }}</option>
                                @empty
                                    <option disabled selected="selected">No categories found!!!</option>
                                @endforelse
                            </select>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a class="btn btn-dark" href="{{ route('admin.categories.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
