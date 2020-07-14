@extends("layouts.backend.app")
@section("title", "Show User")
@section("content-header", "Show user")
@section("from-breadcrumb", "Users")
@section("breadcrumb-url", route('admin.user.index'))
@section("to-breadcrumb", "Dashboard")

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                Total Posts
                            </div>
                            <div class="card-body">
                                {{ count($user->posts) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mx-auto">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                 src="{{ asset('storage/profile/'.$user->image) }}"
                                 alt="{{ $user->username }}">
                        </div>

                        <h3 class="profile-username text-center">{{ $user->name }}</h3>

                        @if(!empty($user->title))
                            <p class="text-muted text-center">{{ $user->title }}</p>
                        @else
                            <p class="text-muted text-center"><span class="text-danger">Not found!!!</span></p>
                        @endif

                        <ul class="list-group list-group-unbordered mb-3 text-center">
                            <li class="list-group-item">
                                <b>Username:</b> <span class="ml-3">{{ $user->username }}</span>
                            </li>

                            <li class="list-group-item">
                                <b>Email:</b> <span class="ml-3">{{ $user->email }}</span>
                            </li>

                            <li class="list-group-item">
                                <b>Phone Number:</b> <span class="ml-3">{{ $user->phone_number }}</span>
                            </li>

                            <li class="list-group-item">
                                <b>IP Address:</b> <span class="ml-3">{{ $user->client_ip }}</span>
                            </li>

                            <li class="list-group-item">
                                <b>Machine Name:</b> <span class="ml-3">{{ $user->machine_name }}</span>
                            </li>

                            <li class="list-group-item">
                                <b>Joined Date:</b> <span class="ml-3">{{ $user->created_at->diffForHumans() }}</span>
                            </li>


                            <li class="list-group-item">
                                <b>Roles:</b> <span class="ml-3">
                                    @forelse( $user->getRoleNames() as $role )
                                        <label class="badge badge-success">{{ $role }}</label>
                                    @empty
                                        <p class="text-danger">No data found!!!</p>
                                    @endforelse
                                </span>
                            </li>

                        </ul>

                        <p class="text-center">
                            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary"><b>Back</b></a>
                            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary"><b>Edit</b></a>
                        </p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if(!empty($user->about))
                            <p class="text-muted">{{ $user->about }}</p>
                        @else
                            <p class="text-muted"><span class="text-danger">Not found!!!</span></p>
                        @endif

                        <hr>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@stop
