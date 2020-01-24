    @include("layouts.backend.partials.header")

    <!-- Navbar -->
        @include("layouts.backend.partials.navbar")
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
            <img src="{{ asset('assets/backend/dist/img/AdminLTELogo.png') }}" alt="FYP" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">FYP</span>
        </a>

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
            @yield("content")
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    {{--    footer part--}}
    @include("layouts.backend.partials.footer")