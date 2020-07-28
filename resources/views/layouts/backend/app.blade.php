@include("layouts.backend.partials.header")

<!-- Navbar -->
@include("layouts.backend.partials.navbar")
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @hasanyrole('super|admin')
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('assets/backend/logo.png') }}" alt="FYP"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">FYP</span>
    </a>
    @else
        <a href="{{ route('user.dashboard') }}" class="brand-link">
            <img src="{{ asset('assets/backend/dist/img/AdminLTELogo.png') }}"
                 alt="FYP" class="brand-image img-circle elevation-3"
                 style="opacity: .8;">
            <span class="brand-text font-weight-light">FYP</span>
        </a>
        @endhasanyrole

        <!-- Sidebar -->
    @include("layouts.backend.partials.sidebar")
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
@include("layouts.backend.partials.content-header")
<!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

{{--    footer part--}}
@include("layouts.backend.partials.footer")
