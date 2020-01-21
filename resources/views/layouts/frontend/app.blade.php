
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>@yield("title", "Enter site title here") - {{ config("app.name") }}</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<!-- Header -->
    @include("layouts.frontend.partials.header");
<!-- /Header -->

<!-- section -->
    @yield("content")
<!-- /section -->

<!-- Footer -->
    @include("layouts.frontend.partials.footer")
<!-- /Footer -->

<!-- jQuery Plugins -->
<script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>

</body>
</html>
