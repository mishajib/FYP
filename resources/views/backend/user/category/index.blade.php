@extends("layouts.backend.app")

@section("title", "Categories")

@section("content-header", "Categories")
@section("from-breadcrumb", "Categories")
@section("breadcrumb-url", route('user.categories.index'))
@section("to-breadcrumb", "Dashboard")

@section("content")
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a class="btn btn-primary"
                   href="{{ route('user.categories.create') }}">
                    Add new category
                </a>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Parent</th>
                    <th>Name</th>
                    <th>Approved</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $categories as $key => $category )
                    <tr>
                        <td>{{ ++$key }}</td>
                        @if($category->parent)
                            <td>{{ $category->parent->name }}</td>
                        @else
                            <td><span class="text-danger">Not found!!!</span>
                            </td>
                        @endif
                        <td>{{ $category->name }}</td>
                        <td>
                            @if($category->is_approved == true)
                                <span
                                    class="badge badge-success">Approved</span>
                            @else
                                <span class="badge badge-danger">Pending</span>
                            @endif
                        </td>
                        <td>
                            @if($category->status == true)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Deactive</span>
                            @endif
                        </td>
                        <td>{{ $category->created_at->diffForHumans() }}</td>
                        <td>{{ $category->updated_at->diffForHumans() }}</td>
                        <td>
                            <a class="btn btn-dark btn-sm"
                               href="{{ route('user.categories.show', $category->slug) }}">
                                <i class="fas fa-eye"></i>
                            </a>
                            @if($category->is_default == false)
                                <a class="btn btn-info btn-sm"
                                   href="{{ route('user.categories.edit', $category->slug) }}">
                                    <i class="far fa-edit"></i>
                                </a>
                            @endif
                            @can('delete category')
                                @if($category->is_default == false)
                                    <button
                                        onclick="deleteItem({{ $category->id }})"
                                        class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                        <form
                                            id="delete-form-{{ $category->id }}"
                                            action="{{ route('user.categories.destroy', $category->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </button>
                                @endif
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="8">
                            <span class="text-danger h3">No data found!</span>
                        </td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Parent</th>
                    <th>Name</th>
                    <th>Approved</th>
                    <th>Status</th>
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
