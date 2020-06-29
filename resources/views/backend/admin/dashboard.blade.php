@extends("layouts.backend.app")

@section("title", "Dashboard")

@section("content")
@section("content-header", "Dashboard")
@section("from-breadcrumb", "Super Admin")
@section("breadcrumb-url", route('admin.dashboard'))
@section("to-breadcrumb", "Dashboard")
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $posts }}</h3>

                    <p>Total Posts</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('admin.post.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $pending_posts }}</h3>

                    <p>Pending Posts</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('admin.post.pending.page') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $registered_users }}</h3>

                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('admin.user.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $all_views }}</h3>

                    <p>All Post Views</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ route('admin.post.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-fuchsia">
                <div class="inner">
                    <h3>{{ $category_count }}</h3>

                    <p>Categories</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('admin.post.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>

            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>{{ $tag_count }}</h3>

                    <p>Tags</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('admin.post.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>

            <!-- small box -->
            <div class="small-box bg-gradient-indigo">
                <div class="inner">
                    <h3>{{ $category_count }}</h3>

                    <p>Categories</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('admin.post.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>

            <!-- small box -->
            <div class="small-box bg-gradient-orange">
                <div class="inner">
                    <h3>{{ rand(0, 100) }}</h3>

                    <p>Subscribers</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('admin.post.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-9 col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Most Popular Posts
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Views</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse( $popular_posts as $key => $post )
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ Str::limit($post->title, 20) }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->view_count }}</td>
                                <td>
                                    @if($post->status == true)
                                        <span class="badge badge-success">
                                                {{ __("Published") }}
                                            </span>
                                    @else
                                        <span class="badge badge-danger">
                                                {{ __("Pending") }}
                                            </span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-dark btn-sm"
                                       href="{{ route('frontend.post.details', $post->slug) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <p class="text-danger">No posts found!!!</p>
                        @endforelse
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Rank</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Views</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Top 10 Active User
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Rank List</th>
                            <th>Name</th>
                            <th>Posts</th>
                            <th>Comments</th>
                            <th>Favourite</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse( $active_users as $key => $user )
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->posts_count }}</td>
                                <td>{{ rand(0, 100) }}</td>
                                <td>
                                    {{ rand(0, 100) }}
                                </td>
                            </tr>
                        @empty
                            <p class="text-danger">No user found!!!</p>
                        @endforelse
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Rank List</th>
                            <th>Name</th>
                            <th>Posts</th>
                            <th>Comments</th>
                            <th>Favourite</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div><!-- /.container-fluid -->
@stop
