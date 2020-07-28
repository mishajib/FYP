@extends("layouts.backend.app")

@section("title", "Dashboard")

@section("content-header", "Dashboard")
@section("from-breadcrumb", Auth::user()->name)
@section("breadcrumb-url", route('user.dashboard'))
@section("to-breadcrumb", "Dashboard")

@section("content")
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
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
                    <a href="{{ route('admin.post.index') }}"
                       class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
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
                    <a href="{{ route('admin.post.index') }}"
                       class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
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
                    <a href="{{ route('admin.user.index') }}"
                       class="small-box-footer">More info <i
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
                    <a href="{{ route('admin.post.index') }}"
                       class="small-box-footer">More info <i
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
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>{{ $tag_count }}</h3>

                        <p>Tags</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('admin.post.index') }}"
                       class="small-box-footer">More info <i
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
                                <th>Views</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse( $popular_posts as $key => $post )
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ Str::limit($post->title, 20) }}</td>
                                    <td>{{ $post->view_count }}</td>
                                    <td>
                                        <a class="btn btn-dark btn-sm"
                                           href="{{ route('frontend.post.details', $post->slug) }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">
                                        <span class="text-danger">
                                            No posts found!!!
                                        </span>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Rank</th>
                                <th>Title</th>
                                <th>Views</th>
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
                            Recent Posts
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Title</th>
                                <th>Views</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse( $recentPosts as $key => $rPost )
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ Str::limit($rPost->title, 20) }}</td>
                                    <td>{{ $rPost->view_count }}</td>
                                    <td>
                                        <a class="btn btn-dark btn-sm"
                                           href="{{ route('frontend.post.details', $rPost->slug) }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">
                                        <span class="text-danger">
                                            No posts found!!!
                                        </span>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Rank</th>
                                <th>Title</th>
                                <th>Views</th>
                                <th>Action</th>
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
