@extends("layouts.backend.app")

@section("title", "Show category")

@section("content")

@section("content-header", "Show category")
@section("from-breadcrumb", "Show category")
@section("breadcrumb-url", route('user.categories.index'))
@section("to-breadcrumb", "Dashboard")


<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <div class="card-header">
            <h1 class="card-title">
                {{ $category->name }}
            </h1>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@stop
