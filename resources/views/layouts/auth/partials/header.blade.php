<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield("title", "Enter your title here")
        - {{ config("app.name") }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/all.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/backend/css/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet"
          href="{{ asset('assets/backend/css/adminlte.min.css') }}">

    <!-- Favicon-->
    <link rel="icon" href="{{ asset('assets/favicon.png') }}"
          type="image/x-icon">

    @notifyCss
    <style>
        .notify-alert {
            top: 60px;
        }
    </style>
</head>
