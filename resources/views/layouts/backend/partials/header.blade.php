<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield("title", "Enter site title here")
        - {{ config("app.name") }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/all.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet"
          href="{{ asset('assets/backend/css/select2.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/backend/css/select2-bootstrap4.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet"
          href="{{ asset('assets/backend/css/dataTables.bootstrap4.min.css')
          }}">
    <!-- Theme style -->
    <link rel="stylesheet"
          href="{{ asset('assets/backend/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
          href="{{ asset('assets/backend/css/OverlayScrollbars.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet"
          href="{{ asset('assets/backend/css/summernote-bs4.css') }}">

    {{--    dropify css--}}
    <link rel="stylesheet"
          href="{{ asset('assets/backend/css/dropify.min.css') }}">

    <!-- Favicon-->
    <link rel="icon" href="{{ asset('assets/favicon.png') }}"
          type="image/x-icon">

    @notifyCss
    <style>
        .notify-alert {
            top: 60px;
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice {
            background-color: #007bff;
            border-color: #006fe6;
            color: #fff;
            padding: 0 10px;
            margin-top: .31rem;
        }

        .select2-container--bootstrap4 .select2-dropdown .select2-results__option[aria-selected=true] {
            background-color: #18daa4;
        }
    </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
