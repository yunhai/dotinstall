<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="robots" content="noydir,noodp,index,follow">
        <meta content='IE=edge' http-equiv='X-UA-Compatible' />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="canonical" href="{{ request()->url() }}" />
        <meta name="description" content="@yield('meta_description')">

        <title>@yield('title')</title>
        <link rel="icon" href="/img/favicon.png">

        <link href="/vendor/bootstrap/css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
        <link href="/vendor/fontawesome/css/all.css" media="all" rel="stylesheet" type="text/css" />

        @php $time = time(); @endphp;

        <link href="/css/common.css?{{ $time }}" media="all" rel="stylesheet" type="text/css" />
        <link href="/css/style.css?{{ $time }}" media="all" rel="stylesheet" type="text/css" />
        @pc
            <link href="/css/pc.css?{{ $time }}" media="all" rel="stylesheet" type="text/css" />
        @endpc
        @sp
            <link href="/css/sp.css?{{ $time }}" media="all" rel="stylesheet" type="text/css" />
        @endsp
        <link href="/css/privacy.css?{{ $time }}" media="all" rel="stylesheet" type="text/css" />
        @stack('css')
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-123965724-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', 'UA-123965724-1');
        </script>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-8715484651212706",
            enable_page_level_ads: true
            });
        </script>
    </head>
    <body>
        @include('component.layout.header')

        <div class="content-wrapper">
            @yield('breadcrumbs')
            <div class="container-fluid">
                @yield('content')
            </div>

            @include('component.layout.footer')
        </div>
        <script type="text/javascript" src="/vendor/backend/jquery/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="/vendor/backend/jquery/jquery.easing.min.js"></script>
        <script type="text/javascript" src="/vendor/backend/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/app.js?{{ $time }}"></script>
        @stack('js')
    </body>
</html>
