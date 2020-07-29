@extends("layouts.backend.app")

@section("title", "Profile")

@section("content-header", "Profile")
@section("from-breadcrumb", "Profile")
@section("breadcrumb-url")
    {{ route('user.profile.index') }}
@endsection
@section("to-breadcrumb", "Dashboard")

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                 src="{{ asset('storage/profile/'.Auth::user()->image) }}"
                                 alt="{{ Auth::user()->username }}">
                        </div>

                        <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                        @if(!empty(Auth::user()->title))
                            <p class="text-muted text-center">{{ Auth::user()->title }}</p>
                        @else
                            <p class="text-muted text-center"><span class="text-danger">Not found!!!</span></p>
                        @endif

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Followers</b> <a class="float-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Following</b> <a class="float-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Friends</b> <a class="float-right">13,287</a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
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
                        @if(!empty(Auth::user()->about))
                            <p class="text-muted text-justify">{{ Auth::user()->about }}</p>
                        @else
                            <p class="text-muted"><span class="text-danger">Not found!!!</span></p>
                        @endif

                        <hr>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#info" data-toggle="tab">Info</a></li>
                            <li class="nav-item"><a class="nav-link" href="#avatar" data-toggle="tab">Avatar</a></li>
                            <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Password</a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="info">

                                <form class="form-horizontal" action="{{ route('user.profile.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" class="form-control" id="name"
                                                   placeholder="Name" value="{{ old('name') ?? Auth::user()->name }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="username" disabled class="form-control"
                                                   id="username" placeholder="Username"
                                                   value="{{ old('username') ?? Auth::user()->username }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" class="form-control" id="email"
                                                   placeholder="Email"
                                                   value="{{ old('email') ?? Auth::user()->email }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" class="form-control" id="title"
                                                   placeholder="Title"
                                                   value="{{ old('title') ?? Auth::user()->title }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="about" class="col-sm-2 col-form-label">About</label>
                                        <div class="col-sm-10">
                                            <textarea name="about" class="form-control" id="about"
                                                      placeholder="About">{{ old('about') ?? Auth::user()->about }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>

                                </form>
                            </div>

                            <div class="tab-pane" id="avatar">
                                <form action="{{ route('user.profile.image.update') }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method("PUT")
                                    <input type="file" name="image" data-max-height="5000" class="dropify"
                                           data-max-file-size="3mb"
                                           data-default-file="{{ asset('storage/profile/'.Auth::user()->image) ?? old("image") }}"/>
                                    <div class="form-group mt-5">
                                        <button type="submit" class="btn btn-success mr-2">Update</button>
                                        <a href="{{ route('admin.profile.index') }}" class="btn btn-outline-danger">Cancel</a>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="password">
                                <form class="form-horizontal" action="{{ route('user.password.update') }}"
                                      method="POST">
                                    @csrf
                                    @method("PUT")
                                    <div class="form-group row">
                                        <label for="old_password" class="col-sm-2 col-form-label">Current
                                            Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="old_password" class="form-control"
                                                   id="old_password" placeholder="Current Password">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label">New Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password" class="form-control" id="password"
                                                   placeholder="New Password">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="cpassword" class="col-sm-2 col-form-label">Confirm Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password_confirmation" class="form-control"
                                                   id="cpassword" placeholder="Confirm Password">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

@stop
