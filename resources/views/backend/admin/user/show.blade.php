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
                                        <b>Joined Date:</b> <span
                                            class="ml-3">{{ $user->created_at->diffForHumans() }}</span>
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
                                    <a href="{{ route('admin.user.edit', $user->id) }}"
                                       class="btn btn-primary"><b>Edit</b></a>
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

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h1>ALL POST</h1>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Status</th>
                                        <th>Is Approved</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse( $user->posts as $key => $post )
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>
                                                <img class="img-responsive img-size-64"
                                                     src="{{ asset('storage/post/'.$post->image) }}"
                                                     alt="{{ $post->title }}">
                                            </td>
                                            <td>{{ Str::limit($post->title, '15') }}</td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>
                                                @if($post->status == true)
                                                    <span class="badge badge-success">Published</span>
                                                @else
                                                    <span class="badge badge-danger">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($post->is_approved == true)
                                                    <span class="badge badge-success">Approved</span>
                                                @else
                                                    <span class="badge badge-danger">Pending</span>
                                                @endif
                                            </td>
                                            <td>{{ $post->created_at->diffForHumans() }}</td>
                                            <td>{{ $post->updated_at->diffForHumans() }}</td>
                                            <td>
                                                @can('unpublish post')
                                                    @if($post->is_approved == true)
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                                onclick="pendingItem({{ $post->id }})">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                        <form action="{{ route('admin.post.pending', $post->id) }}"
                                                              id="pending-form-{{ $post->id }}"
                                                              style="display: none;" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                        </form>
                                                    @endif
                                                @endcan

                                                @can('access post')
                                                    <a class="btn btn-dark btn-sm"
                                                       href="{{ route('admin.post.show', $post->slug) }}">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                @endcan

                                                @can('edit post')
                                                    <a class="btn btn-info btn-sm"
                                                       href="{{ route('admin.post.edit', $post->slug) }}">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                @endcan

                                                @can('delete post')
                                                    <button onclick="deleteItem({{ $post->id }})"
                                                            class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                        <form id="delete-form-{{ $post->id }}"
                                                              action="{{ route('admin.post.destroy', $post->id) }}"
                                                              method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </button>
                                                @endcan
                                            </td>
                                        </tr>
                                    @empty
                                        <p class="text-danger">No data found!!!</p>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop
