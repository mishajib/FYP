@extends("layouts.backend.app")

@section("title", "Tags")

@section("content")

@section("content-header", "Tags")
@section("from-breadcrumb", "Tags")
@section("breadcrumb-url", route('admin.tags.index'))
@section("to-breadcrumb", "Dashboard")


<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <a class="btn btn-primary" href="{{ route('admin.tags.create') }}">
                Add new tag
            </a>
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse( $tags as $key => $tag )
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->slug }}</td>
                    <td>{{ $tag->created_at->diffForHumans() }}</td>
                    <td>{{ $tag->updated_at->diffForHumans() }}</td>
                    <td>
                        <a class="btn btn-dark btn-sm" href="{{ route('admin.tags.show', $tag->slug) }}">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a class="btn btn-info btn-sm" href="{{ route('admin.tags.edit', $tag->slug) }}">
                            <i class="far fa-edit"></i>
                        </a>
                        <button onclick="deleteItem({{ $tag->id }})" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                            <form id="delete-form-{{ $tag->id }}"
                                  action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </button>
                    </td>
                </tr>
            @empty
                <p class="text-danger">No data found!!!</p>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@stop
