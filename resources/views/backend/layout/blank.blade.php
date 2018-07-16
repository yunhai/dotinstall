<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title')</title>
        <link rel="icon" href="/img/favicon.png">
        <link href="/vendor/backend/bootstrap/css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
        <link href="/vendor/backend/fontawesome/css/all.css" media="all" rel="stylesheet" type="text/css" />
        <link href="/vendor/backend/sb-admin/sb-admin.css" media="all" rel="stylesheet" type="text/css" />
        @stack('css')
    </head>
    <body>
        @yield('content')
        @stack('js')
    </body>
</html>