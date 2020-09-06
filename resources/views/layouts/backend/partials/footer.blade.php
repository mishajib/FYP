<footer class="main-footer">
    <strong>&copy;
        {{ config('app.name') }} @ {{ now()->year }}.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b><a href="https://www.mishajib.com" class="btn btn-link">MI
                SHAJIB</a></b>
    </div>
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script
    src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script
    src="{{ asset('assets/backend/js/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script
    src="{{ asset('assets/backend/js/bootstrap.bundle.min.js') }}"></script>
<!-- Select2 -->
<script
    src="{{ asset('assets/backend/js/select2.full.min.js') }}"></script>
<!-- DataTables -->
<script
    src="{{ asset('assets/backend/js/jquery.dataTables.min.js') }}"></script>
<script
    src="{{ asset('assets/backend/js/dataTables.bootstrap4.min.js')
    }}"></script>
<!-- Summernote -->
<script
    src="{{ asset('assets/backend/js/summernote-bs4.min.js') }}"></script>
<!-- Bootstrap Switch -->
<script
    src="{{ asset('assets/backend/js/bootstrap-switch.min.js') }}"></script>
<!-- overlayScrollbars -->
<script
    src="{{ asset('assets/backend/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/backend/js/adminlte.min.js') }}"></script>
{{--dropify js--}}
<script src="{{ asset('assets/backend/js/dropify.min.js')
}}"></script>
<script src="{{ asset('assets/backend/js/sweetalert2@9.js') }}"></script>
@include('sweetalert::alert')
@include('notify::messages')
@notifyJs
@include("layouts.errors")

<script>
    $(function () {
        $.widget.bridge('uibutton', $.ui.button);

        $("#datatable").DataTable();

        $('.dropify').dropify();

        // Summernote
        $('.textarea').summernote({
            height: 300,
        });
    });

    function restoreFunction(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            buttonsStyling: true,
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "want to restore!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, restore it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#dc3545',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('restore-form-' + id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        });
    }

    function logoutFunction() {
        const swalWithBootstrapButtons = Swal.mixin({
            buttonsStyling: true,
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "want to logout!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, log out!',
            cancelButtonText: 'No, cancel!',
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#dc3545',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('logout-form').submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your session is safe :)',
                    'error'
                )
            }
        });
    }

    function pendingItem(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            buttonsStyling: true,
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "want to make this pending!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, pending it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#dc3545',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('pending-form-' + id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        });
    }

    function approveItem(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            buttonsStyling: true,
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "want to approved this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, approve it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#dc3545',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('approved-form-' + id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        });
    }

    //Initialize Select2 Elements
    $('#select').select2({
        theme: 'bootstrap4',
        allowClear: true,
    });

    $('#select2').select2({
        theme: 'bootstrap4',
        allowClear: true,
    });

    $('#select3').select2({
        theme: 'bootstrap4',
        allowClear: true,
    });

    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
</script>
<script type="text/javascript">
    function deleteItem(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            buttonsStyling: true,
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#dc3545',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-' + id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        });
    }
</script>
</body>
</html>
