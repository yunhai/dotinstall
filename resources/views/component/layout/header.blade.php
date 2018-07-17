<!-- /HEADER -->
<span class="d-block px-3 py-2 text-left text-bold text-white old-bv">簡単な実戦でプログラミングを習得５分動画学習</span>
<nav class="navbar navbar-expand-lg navbar-light pl-3 pr-3">
    <a class="navbar-brand" href="/"><img class="img-logo" src="/img/logo_header.jpg" alt="cogwheel"></a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarheaders" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarheaders">
        <ul class="navbar-nav ml-auto align-items-lg-end">
            @if (Auth::user())
                <li class="nav-item">
                    <a class="nav-link text-lg-center" href="#">
                        <img class="img-diamond mb-2" src="/img/diamond.jpg" alt="ダイヤモンド会員">
                        <span class="d-lg-none">ダイヤモンド会員</span>
                        <span class="d-none d-lg-block">ダイヤモンド会員</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-lg-center" href="{{ route('lesson') }}">
                        <img class="img-video mb-2" src="/img/video-header.jpg" alt="レッスン一覧">
                        <span class="d-lg-none">レッスン一覧</span>
                        <span class="d-none d-lg-block">レッスン一覧</span>
                    </a>
                </li>
                <li class="nav-item nav-item-user dropdown">
                    <a class="nav-link text-lg-center dropdown-toggle" data-toggle="dropdown" href="#">
                        <img class="img-user mb-2" src="/img/user.jpg" alt="">
                        <span class="d-lg-none">{{ Auth::user()->name }}</span>
                        <span class="d-none d-lg-block">{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu" style="right: 0; left: auto;">
                        <a class="dropdown-item" href="{{ route('mypage') }}">
                            <div class="dropdown-message small">マイページ</div>
                        </a>
                        <a class="dropdown-item" href="#">
                            <div class="dropdown-message small">プロフィール</div>
                        </a>
                        <a class="dropdown-item" href="#">
                            <div class="dropdown-message small">設定変更</div>
                        </a>
                        <a class="dropdown-item" href="#">
                            <div class="dropdown-message small">ヘルプ</div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            <div class="dropdown-message small">ログアウト</div>
                        </a>
                    </div>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link text-lg-center" href="#">
                        <img class="img-diamond mb-2" src="/img/diamond.jpg" alt="ダイヤモンド会員">
                        <span class="d-lg-none">ダイヤモンド会員</span>
                        <span class="d-none d-lg-block">ダイヤモンド会員</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-lg-center" href="{{ route('lesson') }}">
                        <img class="img-video mb-2" src="/img/video-header.jpg" alt="レッスン一覧">
                        <span class="d-lg-none">レッスン一覧</span>
                        <span class="d-none d-lg-block">レッスン一覧</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-lg-center" href="/login">
                        <img class="img-user mb-2" src="/img/user.jpg" alt="ログイン">
                        <span class="d-lg-none">ログイン</span>
                        <span class="d-none d-lg-block">ログイン</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-lg-center" href="/register">
                        <img class="img-party mb-2" src="/img/party.jpg" alt="新規登録">
                        <span class="d-lg-none">新規登録</span>
                        <span class="d-none d-lg-block">新規登録</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
