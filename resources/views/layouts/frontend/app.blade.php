<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>@yield("title", "Enter site title here")
        - {{ config("app.name") }}</title>

    <!-- Google font -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600"
        rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet"
          href="{{ asset('assets/frontend/css/bootstrap.min.css') }}"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet"
          href="{{ asset('assets/frontend/css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet"
          href="{{ asset('assets/frontend/css/style.css') }}"/>

    <!-- Favicon-->
    <link rel="icon" href="{{ asset("assets/favicon.png") }}"
          type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/chat/style.css') }}">

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
<script
    src="https://unpkg.com/jscroll@2.4.1/dist/jquery.jscroll.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@include('sweetalert::alert')
<script>
    $('ul.nav li.dropdown').hover(function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });
</script>
<script>
    $('ul.pagination').hide();
    $(function () {
        $('.post-scroll').jscroll({
            autoTrigger: true,
            autoTriggerUntil: true,
            refresh: true,
            loadingHtml: '<img class="center-block" height="200" src="{{ asset('assets/loader.gif') }}" alt="Loading..." />', // MAKE SURE THAT YOU PUT THE CORRECT IMG PATH
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.post-scroll',
            callback: function () {
                $('ul.pagination').remove();
            }
        });

        $('.category-scroll').jscroll({
            autoTrigger: true,
            autoTriggerUntil: true,
            refresh: true,
            loadingHtml: '<img class="center-block" height="100" src="{{ asset('assets/loader.gif') }}" alt="Loading..." />', // MAKE SURE THAT YOU PUT THE CORRECT IMG PATH
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'ul.category-scroll',
            callback: function () {
                $('ul.pagination').remove();
            }
        });
    });
</script>
</body>

</html>
