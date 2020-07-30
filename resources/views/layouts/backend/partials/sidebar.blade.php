<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('storage/profile/' . Auth::user()->image) }}"
                 class="img-circle elevation-2"
                 alt="{{ Auth::user()->username }}">
        </div>
        <div class="info">
            <a href="{{ (Request::is('admin/*')) ? route('admin.dashboard'):route('user.dashboard') }}"
               class="d-block">{{ Auth::user()->name }}</a>
        </div>

    </div>

    <!-- Sidebar Menu -->
    @hasanyrole('super|admin')
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview"
            role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}"
                   class="nav-link {{ Request::is('admin/dashboard') ? 'active':'' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            @can('access category')
                <li
                    class="nav-item has-treeview {{ Request::is('admin/categories*') || Request::is('admin/category*') ? 'menu-open':'' }}">
                    <a href="#"
                       class="nav-link {{ Request::is('admin/categories*') || Request::is('admin/category*')  ? 'active':'' }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.categories.index') }}"
                               class="nav-link {{ Request::is('admin/categories') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    All categories
                                    <i class="right fa fa-list-alt"></i>
                                </p>
                            </a>
                        </li>

                        @can('access active category')
                            <li class="nav-item">
                                <a href="{{ route('admin.category.active.page') }}"
                                   class="nav-link {{ Request::is('admin/category/active') ? 'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Active categories
                                        <i class="right fas fa-plus-square"></i>
                                    </p>
                                </a>
                            </li>
                        @endcan

                        @can('access pending category')
                            <li class="nav-item">
                                <a href="{{ route('admin.category.pending.page') }}"
                                   class="nav-link {{ Request::is('admin/category/pending') ? 'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Pending categories
                                        <i class="right fas fa-plus-square"></i>
                                    </p>
                                </a>
                            </li>
                        @endcan

                        @can('create category')
                            <li class="nav-item">
                                <a href="{{ route('admin.categories.create') }}"
                                   class="nav-link {{ Request::is('admin/categories/create') ? 'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Add new category
                                        <i class="right fas fa-plus-square"></i>
                                    </p>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan

            @can('access tag')
                <li class="nav-item has-treeview {{ Request::is('admin/tags*') ? 'menu-open':'' }}">
                    <a href="#"
                       class="nav-link {{ Request::is('admin/tags*') ? 'active':'' }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Tags
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.tags.index') }}"
                               class="nav-link {{ Request::is('admin/tags') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    All tags
                                    <i class="right fa fa-list-alt"></i>
                                </p>
                            </a>
                        </li>

                        @can('create tag')
                            <li class="nav-item">
                                <a href="{{ route('admin.tags.create') }}"
                                   class="nav-link {{ Request::is('admin/tags/create') ? 'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Add new tag
                                        <i class="right fas fa-plus-square"></i>
                                    </p>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan

            @can('access post')
                <li class="nav-item has-treeview {{ Request::is('admin/post*') ? 'menu-open':'' }}">
                    <a href="#"
                       class="nav-link {{ Request::is('admin/post*') ? 'active':'' }}">
                        <i class="nav-icon fa fa-file-alt"></i>
                        <p>
                            Post
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.post.index') }}"
                               class="nav-link {{ Request::is('admin/post') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    All posts
                                    <i class="right fa fa-list-alt"></i>
                                </p>
                            </a>
                        </li>

                        @can('pending post')
                            <li class="nav-item">
                                <a href="{{ route('admin.post.pending.page') }}"
                                   class="nav-link {{ Request::is('admin/post/pending/all') ? 'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Pending posts
                                        <i class="right fa fa-list-alt"></i>
                                    </p>
                                </a>
                            </li>
                        @endcan

                        @can('create post')
                            <li class="nav-item">
                                <a href="{{ route('admin.post.create') }}"
                                   class="nav-link {{ Request::is('admin/post/create') ? 'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Add new post
                                        <i class="right fas fa-plus-square"></i>
                                    </p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('access comment')
                <li class="nav-item">
                    <a href="{{ route('admin.comment.index') }}"
                       class="nav-link {{ Request::is('admin/comment/all') ?
                    'active':'' }}">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>
                            Comments
                        </p>
                    </a>
                </li>
            @endcan


            @can('access subscriber')
                <li class="nav-item">
                    <a href="{{ route('admin.subscriber.all') }}"
                       class="nav-link {{ Request::is('admin/subscriber/all') ?
                    'active':'' }}">
                        <i class="nav-icon fas fa-check"></i>
                        <p>
                            Subscribers
                        </p>
                    </a>
                </li>
            @endcan

            @can('access user')
                <li class="nav-item has-treeview {{ Request::is('admin/user*') ? 'menu-open':'' }}">
                    <a href="#"
                       class="nav-link {{ Request::is('admin/user*') ? 'active':'' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.user.index') }}"
                               class="nav-link {{ Request::is('admin/user') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    All user
                                    <i class="right fa fa-list-alt"></i>
                                </p>
                            </a>
                        </li>

                        @can('admin user')
                            <li class="nav-item">
                                <a href="{{ route('admin.user.admin.index') }}"
                                   class="nav-link {{ Request::is('admin/user/admin/all') ? 'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        All admins
                                        <i class="right fas fa-user-secret"></i>
                                    </p>
                                </a>
                            </li>
                        @endcan

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    All subscribers
                                    <i class="right fa fa-list-alt"></i>
                                </p>
                            </a>
                        </li>

                        @can('create user')
                            <li class="nav-item">
                                <a href="{{ route('admin.user.create') }}"
                                   class="nav-link {{ Request::is('admin/user/create') ? 'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Add new user
                                        <i class="right fas fa-user-plus"></i>
                                    </p>
                                </a>
                            </li>
                        @endcan

                        @can('trash user')
                            <li class="nav-item">
                                <a href="{{ route('admin.user-trash.index') }}"
                                   class="nav-link {{ Request::is('admin/user-trash') ? 'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Trash User
                                        <i class="right fas fa-user-plus"></i>
                                    </p>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan

            @can('access role')
                <li
                    class="nav-item has-treeview {{ Request::is('admin/roles*') || Request::is('admin/role*') ? 'menu-open':'' }}">
                    <a href="#"
                       class="nav-link {{ Request::is('admin/roles*') || Request::is('admin/role*') ? 'active':'' }}">
                        <i class="nav-icon fas fa-user-tag"></i>
                        <p>
                            Roles
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.roles.index') }}"
                               class="nav-link {{ Request::is('admin/roles') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    All role
                                    <i class="right fa fa-list-alt"></i>
                                </p>
                            </a>
                        </li>

                        @can('create role')
                            <li class="nav-item">
                                <a href="{{ route('admin.roles.create') }}"
                                   class="nav-link {{ Request::is('admin/roles/create') ? 'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Add new role
                                        <i class="right fas fa-user-plus"></i>
                                    </p>
                                </a>
                            </li>
                        @endcan

                        @can('access user role')
                            <li class="nav-item">
                                <a href="{{ route('admin.role.all.user-role') }}"
                                   class="nav-link {{ Request::is('admin/role/all-user-role') ? 'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        All user role
                                        <i class="right fas fa-user-plus"></i>
                                    </p>
                                </a>
                            </li>
                        @endcan

                        @can('give user role')
                            <li class="nav-item">
                                <a href="{{ route('admin.role.give.user-role') }}"
                                   class="nav-link {{ Request::is('admin/role/give-user-role') ? 'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Give user role
                                        <i class="right fas fa-user-plus"></i>
                                    </p>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan

            @can('access permission')
                <li
                    class="nav-item has-treeview {{ Request::is('admin/permissions*') || Request::is('admin/permission*') ? 'menu-open':'' }}">
                    <a href="#"
                       class="nav-link {{ Request::is('admin/permissions*') || Request::is('admin/permission*') ? 'active':'' }}">
                        <i class="nav-icon fas fa-user-tag"></i>
                        <p>
                            Permissions
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.permissions.index') }}"
                               class="nav-link {{ Request::is('admin/permissions') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    All permission
                                    <i class="right fa fa-list-alt"></i>
                                </p>
                            </a>
                        </li>

                        @can('create permission')
                            <li class="nav-item">
                                <a href="{{ route('admin.permissions.create') }}"
                                   class="nav-link {{ Request::is('admin/permissions/create') ? 'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Add new permission
                                        <i class="right fas fa-user-plus"></i>
                                    </p>
                                </a>
                            </li>
                        @endcan

                        @can('access role permission')
                            <li class="nav-item">
                                <a href="{{ route('admin.permission.all.role-permission') }}"
                                   class="nav-link {{ Request::is('admin/permission/all-role-permission') || Request::is('admin/permission/edit-role-perission') ? 'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        All role permission
                                        <i class="right fas fa-user-plus"></i>
                                    </p>
                                </a>
                            </li>
                        @endcan

                        @can('give role permission')
                            <li class="nav-item">
                                <a href="{{ route('admin.permission.give.role-permision') }}"
                                   class="nav-link {{ Request::is('admin/permission/give-role-permission') ? 'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Give role permission
                                        <i class="right fas fa-user-plus"></i>
                                    </p>
                                </a>
                            </li>
                        @endcan

                        @can('access user permission')
                            <li class="nav-item">
                                <a href="{{ route('admin.permission.all.user-permission') }}"
                                   class="nav-link {{ Request::is('admin/permission/all-user-permission') || Request::is('admin/permission/edit-user-perission') ? 'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        All user permission
                                        <i class="right fas fa-user-plus"></i>
                                    </p>
                                </a>
                            </li>
                        @endcan

                        @can('give user permission')
                            <li class="nav-item">
                                <a href="{{ route('admin.permission.give.user-permision') }}"
                                   class="nav-link {{ Request::is('admin/permission/give-user-permission') ? 'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Give user permission
                                        <i class="right fas fa-user-plus"></i>
                                    </p>
                                </a>
                            </li>
                        @endcan


                    </ul>
                </li>
            @endcan

            <li class="nav-header">SETTING</li>

            <li class="nav-item">
                <a href="{{ route('admin.profile.index') }}"
                   class="nav-link {{ Request::is('admin/profile') ? 'active':'' }}">
                    <i class="nav-icon fas fa-user-cog"></i>
                    <p>
                        Profile
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link"
                   onclick="event.preventDefault();logoutFunction();">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        {{ __('Logout') }}
                    </p>
                    <form id="logout-form" action="{{ route('logout') }}"
                          method="POST">
                        @csrf
                    </form>
                </a>
            </li>
        </ul>
    </nav>
    @endhasanyrole

    @hasrole('user')
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview"
            role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item {{ Request::is('user/dashboard') ? 'menu-open':'' }}">
                <a href="{{ route('user.dashboard') }}"
                   class="nav-link {{ Request::is('user/dashboard') ? 'active':'' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            @can('access category')
                <li
                    class="nav-item has-treeview {{ Request::is('user/categories*') || Request::is('admin/category*') ? 'menu-open':'' }}">
                    <a href="#"
                       class="nav-link {{ Request::is('user/categories*') || Request::is('admin/category*')  ? 'active':'' }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.categories.index') }}"
                               class="nav-link {{ Request::is('user/categories') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    All categories
                                    <i class="right fa fa-list-alt"></i>
                                </p>
                            </a>
                        </li>

                        @can('create category')
                            <li class="nav-item">
                                <a href="{{ route('user.categories.create') }}"
                                   class="nav-link {{ Request::is('user/categories/create') ? 'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Add new category
                                        <i class="right fas fa-plus-square"></i>
                                    </p>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan

            @can('access tag')
                <li class="nav-item has-treeview {{ Request::is('user/tags*') ? 'menu-open':'' }}">
                    <a href="#"
                       class="nav-link {{ Request::is('user/tags*') ? 'active':'' }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Tags
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.tags.index') }}"
                               class="nav-link {{ Request::is('user/tags') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    All tags
                                    <i class="right fa fa-list-alt"></i>
                                </p>
                            </a>
                        </li>

                        @can('create tag')
                            <li class="nav-item">
                                <a href="{{ route('user.tags.create') }}"
                                   class="nav-link {{ Request::is('user/tags/create') ? 'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Add new tag
                                        <i class="right fas fa-plus-square"></i>
                                    </p>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan

            @can('access post')
                <li class="nav-item has-treeview {{ Request::is('user/post*') ? 'menu-open':'' }}">
                    <a href="#"
                       class="nav-link {{ Request::is('user/post*') ? 'active':'' }}">
                        <i class="nav-icon fa fa-file-alt"></i>
                        <p>
                            Post
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.post.index') }}"
                               class="nav-link {{ Request::is('user/post') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    All posts
                                    <i class="right fa fa-list-alt"></i>
                                </p>
                            </a>
                        </li>

                        @can('pending post')
                            <li class="nav-item">
                                <a href="{{ route('user.post.pending.page') }}"
                                   class="nav-link {{ Request::is('user/post/pending/all') ? 'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Pending posts
                                        <i class="right fa fa-list-alt"></i>
                                    </p>
                                </a>
                            </li>
                        @endcan

                        @can('create post')
                            <li class="nav-item">
                                <a href="{{ route('user.post.create') }}"
                                   class="nav-link {{ Request::is('user/post/create') ? 'active':'' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Add new post
                                        <i class="right fas fa-plus-square"></i>
                                    </p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('access comment')
                <li class="nav-item">
                    <a href="{{ route('user.comment.index') }}" class="nav-link {{ Request::is('user/comment/all') ?
                    'active':'' }}">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>
                            Comments
                        </p>
                    </a>
                </li>
            @endcan

            <li class="nav-header">SETTING</li>

            <li class="nav-item">
                <a href="{{ route('user.profile.index') }}"
                   class="nav-link {{ Request::is('user/profile') ? 'active':'' }}">
                    <i class="nav-icon fas fa-user-cog"></i>
                    <p>
                        Profile
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link"
                   onclick="event.preventDefault();logoutFunction();">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        {{ __('Logout') }}
                    </p>
                    <form id="logout-form" action="{{ route('logout') }}"
                          method="POST">
                        @csrf
                    </form>
                </a>
            </li>

        </ul>
    </nav>
    @endhasrole

    <!-- /.sidebar-menu -->
</div>
