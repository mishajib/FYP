@extends("layouts.backend.app")

@section("title", "Pending Categories")

@section("content-header", "Pending Categories")
@section("from-breadcrumb", "Pending categories")
@section("breadcrumb-url", route('admin.category.pending.page'))
@section("to-breadcrumb", "Dashboard")

@section("content")
    <div class="card">
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
                            @if($category->is_approved == false)
                                <button type="button"
                                        class="btn btn-sm btn-success waves-effect"
                                        onclick="approveItem({{ $category->id }})">
                                    <i class="fa fa-check"></i>
                                </button>
                                <form
                                    action="{{ route('admin.category.approved', $category->id) }}"
                                    id="approved-form-{{ $category->id }}"
                                    style="display: none;" method="POST">
                                    @csrf
                                    @method('PUT')
                                </form>
                            @endif
                            <a class="btn btn-dark btn-sm"
                               href="{{ route('admin.categories.show', $category->slug) }}">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a class="btn btn-info btn-sm"
                               href="{{ route('admin.categories.edit', $category->slug) }}">
                                <i class="far fa-edit"></i>
                            </a>
                            <button onclick="deleteItem({{ $category->id }})"
                                    class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                                <form id="delete-form-{{ $category->id }}"
                                      action="{{ route('admin.categories.destroy', $category->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </button>
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
