<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Style-Type" content="text/css">
        <meta name="robots" content="noydir,noodp,index,follow">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title')</title>

        <link href="/vendor/bootstrap/css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
        <link href="/css/style.css" media="all" rel="stylesheet" type="text/css" />
        <link href="/css/privacy.css" media="all" rel="stylesheet" type="text/css" />
        @stack('css')
    </head>
    <body>
        @include('component.layout.header')

        <div class="content-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>

            @include('component.layout.footer');
            <script type="text/javascript" src="/vendor/backend/jquery/jquery-3.3.1.min.js"></script>
            <script type="text/javascript" src="/vendor/backend/jquery/jquery.easing.min.js"></script>
            <script type="text/javascript" src="/vendor/backend/bootstrap/js/bootstrap.min.js"></script>
        </div>
    </body>
</html>