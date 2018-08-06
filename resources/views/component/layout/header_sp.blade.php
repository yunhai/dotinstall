<nav class="navbar navbar-expand-sm navbar-light px-5">
    <a class="navbar-brand" href="/"><img class="img-logo" src="/img/logo_header.jpg" alt="cogwheel"></a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarheaders" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarheaders">
        <ul class="navbar-nav ml-auto align-items-lg-end">
            @if (Auth::check() && Auth::user()->role == constant('USER_ROLE_PUBLIC'))
                @normal_user
                <li class="nav-item">
                    <a class="nav-link text-lg-center" href="{{ route('user.upgrade') }}">
                        <img class="img-diamond mb-2" src="/img/diamond.jpg" alt="ダイヤモンド会員">
                        <span class="d-lg-none">ダイヤモンド会員</span>
                        <span class="d-none d-lg-block">ダイヤモンド会員</span>
                    </a>
                </li>
                @endnormal_user
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
                    <div class="dropdown-menu rounded-0" style="right: 0; left: auto;">
                        <a class="dropdown-item" href="{{ route('mypage') }}">
                            <div class="dropdown-message small">マイページ</div>
                        </a>
                        <a class="dropdown-item" href="{{ route('user.change_password') }}">
                            <div class="dropdown-message small">パスワード変更</div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            <div class="dropdown-message small">ログアウト</div>
                        </a>
                    </div>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link text-lg-center" href="{{ route('register.diamond') }}">
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