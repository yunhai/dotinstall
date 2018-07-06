<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="robots" content="noydir,noodp,index,follow">
        <meta content='IE=edge' http-equiv='X-UA-Compatible' />
        <meta content='width=device-width, initial-scale=1' name='viewport' />
        <title>@yield('title')</title>
        <link rel="icon" href="/img/cogwheel.jpg">

        <link href="/vendor/bootstrap/css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
        <link href="/vendor/fontawesome/css/all.css" media="all" rel="stylesheet" type="text/css" />
        <link href="/css/style.css" media="all" rel="stylesheet" type="text/css" />
        <link href="/css/privacy.css" media="all" rel="stylesheet" type="text/css" />
        @stack('css')
    </head>
    <body>
        @include('component.layout.header')

        <div class="content-wrapper">
            @if(request()->route()->getActionMethod() != 'index')
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">トップ</li>
                <li class="breadcrumb-item active" aria-current="page"></li>
              </ol>
            </nav>
            @endif
            <div class="container-fluid">
                @yield('content')
            </div>
            @include('component.layout.footer')
        </div>
        <script type="text/javascript" src="/vendor/backend/jquery/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="/vendor/backend/jquery/jquery.easing.min.js"></script>
        <script type="text/javascript" src="/vendor/backend/bootstrap/js/bootstrap.min.js"></script>
        @stack('js')
    </body>
</html>
