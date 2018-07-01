<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="robots" content="noydir,noodp,index,follow">
        <meta content='IE=edge' http-equiv='X-UA-Compatible' />
        <meta content='width=device-width, initial-scale=1' name='viewport' />
        <title>@yield('title')</title>

        <link href="/vendor/bootstrap/css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
        <link href="/vendor/fontawesome/css/all.css" media="all" rel="stylesheet" type="text/css" />
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

            @include('component.layout.footer')
            <script type="text/javascript" src="/vendor/backend/jquery/jquery-3.3.1.min.js"></script>
            <script type="text/javascript" src="/vendor/backend/jquery/jquery.easing.min.js"></script>
            <script type="text/javascript" src="/vendor/backend/bootstrap/js/bootstrap.min.js"></script>
            <script>
                $( document ).ready(function() {
                    var count_elements = $('.col-video').length;
                    if(count_elements % 5 === 0) {
                        var i;
                        for (i = 1; i <= 5; ++i) {
                            $('.col-video:nth-child('+i+')').css( "border-bottom", "1px solid #bca9af" );
                        }
                    }
                });
            </script>
        </div>
    </body>
</html>