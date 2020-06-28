@extends("layouts.backend.app")

@section("title", "Show User")

@section("content")

@section("content-header", "Show user")
@section("from-breadcrumb", "Users")
@section("breadcrumb-url", route('admin.user.index'))
@section("to-breadcrumb", "Dashboard")


<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        @empty($user)
            <p class="text-danger">No data found!!!</p>
        @else
            <h1>Name: {{ $user->name }}</h1>
            <h3>Username: {{ $user->username }}</h3>
            <h3>Email: {{ $user->email }}</h3>
            <h3>Phone Number: {{ $user->phone_number }}</h3>
            <h3>Client IP: {{ $user->client_ip }}</h3>
            <h3>Machine Name: {{ $user->machine_name }}</h3>
            <h3>Created By: {{ $user->created_by }}</h3>
            <h3>Updated By: {{ $user->updated_by }}</h3>
            <h3>Created At: {{ $user->created_at->diffForHumans() }}</h3>
            <h3>Updated At: {{ $user->updated_at->diffForHumans() }}</h3>
            <h3>Roles:
                @forelse( $user->getRoleNames() as $role )
                    <label class="badge badge-success">{{ $role }}</label>
                @empty
                    <p class="text-danger">No data found!!!</p>
                @endforelse
            </h3>
            <p>About: {{ $user->about }}</p>
            <a href="{{ route('admin.user.index') }}" class="btn btn-dark">Back</a>
            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
        @endempty
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@stop
