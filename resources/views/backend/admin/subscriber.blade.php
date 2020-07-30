@extends("layouts.backend.app")

@section("title", "All Subscriber")

@section("content-header", "All Subscriber")
@section("from-breadcrumb", "All Subscriber")
@section("breadcrumb-url", route('admin.subscriber.all'))
@section("to-breadcrumb", "Dashboard")

@section("content")
    <div class="card">
        <div class="card-body">
            <table id="datatable" class="table table-bordered
                        table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Subscription Time</th>
                    @can('delete subscriber')
                        <th>Action</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @forelse( $subscribers as $key => $subscriber )
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $subscriber->email }}</td>
                        <td>{{ $subscriber->created_at->diffForHumans() }}</td>
                        <td>
                            @can('delete subscriber')
                                <button
                                    onclick="deleteItem({{ $subscriber->id }})"
                                    class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                    <form id="delete-form-{{ $subscriber->id }}"
                                          action="{{ route('admin.subscriber.destroy', $subscriber->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </button>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="4">
                            <span
                                class="text-danger h3">{{ __("No data found!") }}</span>
                        </td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Subscription Time</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@stop
