@extends("layouts.backend.app")

@section("title", "Create Category")

@section("content")
@section("content-header", "Add new category")
@section("from-breadcrumb", "Create Category")
@section("breadcrumb-url", route('admin.categories.index'))
@section("to-breadcrumb", "Dashboard")

<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add new category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf

                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required
                                   placeholder="Enter name" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label>Parent Category</label>
                            <select name="category" data-placeholder="Select parent category" class="form-control select2bs4" id="select" style="width: 100%;">
                                <option value=""></option>
                                @forelse($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
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