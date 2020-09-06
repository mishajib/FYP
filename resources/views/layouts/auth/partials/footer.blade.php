<!-- jQuery -->
<script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/backend/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/backend/js/adminlte.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/sweetalert2@9.js') }}"></script>
@include('sweetalert::alert')
@include('notify::messages')
@notifyJs
@include("layouts.errors")
</body>
</html>
