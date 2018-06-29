<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title')</title>
        <link href="/vendor/backend/bootstrap/css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
        <link href="/vendor/backend/fontawesome/css/fontawesome.css" media="all" rel="stylesheet" type="text/css" />
        <link href="/css/backend/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" />
        <link href="/css/backend/sb-admin.css" media="all" rel="stylesheet" type="text/css" />
        <link href="/css/backend/common.css" media="all" rel="stylesheet" type="text/css" />
        <link href="/css/backend/dataTables.bootstrap4.css" media="all" rel="stylesheet" type="text/css" />
        @stack('css')
    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <!-- Navigation-->
        @include('backend.component.layout.sidebar');

        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                @include('backend.component.layout.breadcrumb')
                @yield('content')
            </div>
            <footer class="sticky-footer">
                <div class="container">
                    <div class="text-center">
                        <small>Copyright © <?php echo date('Y'); ?></small>
                    </div>
                </div>
            </footer>
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fa fa-angle-up"></i>
            </a>
            <script type="text/javascript" src="/vendor/backend/jquery/jquery-3.3.1.min.js"></script>
            <script type="text/javascript" src="/vendor/backend/jquery/jquery.easing.min.js"></script>
            <script type="text/javascript" src="/vendor/backend/bootstrap/js/bootstrap.min.js"></script>

            <script type="text/javascript" src="/js/backend/sb-admin.min.js"></script>
            <script type="text/javascript" src="/js/backend/bootstrap.file-input.js"></script>
            <script type="text/javascript" src="/js/backend/upload/resumable.js"></script>
            <script type="text/javascript" src="/js/backend/upload/upload.js"></script>
            @stack('js')
            <script type="text/javascript">
                $(document).ready(function () {
                    // $('input[type=file]').bootstrapFileInput();
                });
            </script>
        </div>
    </body>
</html>