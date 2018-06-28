<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Style-Type" content="text/css">
        <meta name="robots" content="noydir,noodp,index,follow">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title')</title>
        <link href="/css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
        <link href="/css/style.css" media="all" rel="stylesheet" type="text/css" />
        <link href="/css/privacy.css" media="all" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <!-- /HEADER -->
        <span class="d-block px-3 py-2 text-left text-bold text-white old-bv">簡単な実戦でプログラミングを習得５分動画学習</span>
        <nav class="navbar navbar-expand-sm">
            <a class="navbar-brand" href="/"><img class="img-logo" src="images/logo_header.jpg" alt="cogwheel"></a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbars">
                <ul class="navbar-nav ml-auto form-inline text-center">
                    <li class="nav-item active pad_r20">
                        <a class="nav-link" href="#">
                            <p><img class="img-fluid img-diamond" src="images/diamond.jpg" alt="ダイヤモンド会員"></p>
                            <span>ダイヤモンド会員</span>
                            <span class="sr-only">(current)</span>          
                        </a>
                    </li>
                    <li class="nav-item pad_r20">
                        <a class="nav-link" href="#">
                            <p><img class="img-fluid img-video" src="images/video-header.jpg" alt="レッスン一覧"></p>
                            <span>レッスン一覧</span>
                        </a>
                    </li>
                    <li class="nav-item pad_r20">
                        <a class="nav-link" href="#">
                            <p><img class="img-fluid img-user" src="images/user.jpg" alt="ログイン"></p>
                            <span>ログイン</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <p><img class="img-fluid img-party" src="images/party.jpg" alt="新規登録"></p>
                            <span>新規登録</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- HEADER -->

        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">My Dashboard</li>
                </ol>
                -->
                @yield('content')
            </div>
            <footer class="footer">
                <div class="footer-container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 text-center footer-container-left">
                            <h6 class="mar_b10">5分動画で実践的にプログラミングを習得！</h6>
                            <h4 class="title-widget">
                                <a class="" href="/"><img class="img-logo" src="images/logo_footer.png" alt="cogwheel"></a>
                            </h4>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <h6 class="title-widget">ご利用にあたって</h6>
                            <hr>
                            <ul class="pad_l20">
                                <li><a href="/terms">利用規約</a></li>
                                <li><a href="/privacy">プライバシーポリシー</a></li>
                                <li><a href="#">運営企業情報</a></li>
                                <li><a href="#">お問い合わせ</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <h6 class="title-widget">ソーシャルメディア</h6>
                            <hr>
                            <ul class="pad_l20">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Facebook</a></li>
                            </ul>
                            <h6 class="title-widget">サービス</h6>
                            <hr>
                            <ul class="pad_l20 mar_b0">
                                <li><a href="#">レッスン一覧（５０）</a></li>
                                <li><a href="#">有料会員ご説明</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
            <script type="text/javascript" src="/js/backend/jquery.min.js"></script>
            <script type="text/javascript" src="/js/backend/bootstrap.min.js"></script>
            <!-- <script type="text/javascript" src="/js/backend/bootstrap.bundle.min.js"></script> -->
            <script type="text/javascript" src="/js/backend/jquery.easing.min.js"></script>
            <script type="text/javascript" src="/js/backend/sb-admin.min.js"></script>
            <script type="text/javascript" src="/js/backend/bootstrap.file-input.js"></script>
            <script type="text/javascript" src="/js/backend/upload/resumable.js"></script>
            <script type="text/javascript" src="/js/backend/upload/upload.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    // $('input[type=file]').bootstrapFileInput();
                });
            </script>
        </div>
    </body>
</html>