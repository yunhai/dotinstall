<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="robots" content="noydir,noodp,index,follow">
        <meta content='IE=edge' http-equiv='X-UA-Compatible' />
        <meta content='width=device-width, initial-scale=1' name='viewport' />
        <meta name=”description” content=” 小学生から大人までＩＰＨＯＮＥアプリ開発レッスン動画。swift言語レッスン動画見放題！” />

        <title>@yield('title')</title>
        <link rel="icon" href="/img/favicon.png">

        <link href="/vendor/bootstrap/css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
        <link href="/vendor/fontawesome/css/all.css" media="all" rel="stylesheet" type="text/css" />
        <link href="/css/common.css" media="all" rel="stylesheet" type="text/css" />
        <link href="/css/style.css" media="all" rel="stylesheet" type="text/css" />
        @pc
			<link href="/css/pc.css" media="all" rel="stylesheet" type="text/css" />
		@endpc
		@sp
			<link href="/css/sp.css" media="all" rel="stylesheet" type="text/css" />
		@endsp
        <link href="/css/privacy.css" media="all" rel="stylesheet" type="text/css" />
        @stack('css')
        <!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123965724-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		
		  gtag('config', 'UA-123965724-1');
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
        <script type="text/javascript" src="/js/app.js"></script>
        @stack('js')
    </body>
</html>
