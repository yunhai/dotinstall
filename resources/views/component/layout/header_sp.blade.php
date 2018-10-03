<h1 class="d-block py-2 px-5 mb-0 text-left text-bold text-white old-bv font_12">小学生の子供から大人まで簡単な実戦でプログラミングを習得できる５分動画学習</h1>
<nav class="navbar navbar-expand-sm navbar-light px-5">
    <a class="navbar-brand" href="/">
        <img class="img-logo" src="/img/logo_header.png" alt="プログラミングゴーPrograming Go">
    </a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarheaders" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarheaders">
        <ul class="navbar-nav ml-auto align-items-lg-end">
            @if (Auth::check() && Auth::user()->role == constant('USER_ROLE_PUBLIC'))
                @normal_user
                <!--
                <li class="nav-item">
                    <a class="nav-link text-lg-center" href="{{ route('user.upgrade') }}" title='アップグレード'>
                        <img class="img-diamond mb-2" src="/img/diamond.jpg" alt="アップグレード">
                        <span class="d-lg-none">アップグレード</span>
                        <span class="d-none d-lg-block">アップグレード</span>
                    </a>
                </li>
                -->
                @endnormal_user
                <!--
                <li class="nav-item">
                    <a class="nav-link text-lg-center" href="{{ route('lesson') }}">
                        <img class="img-video mb-2" src="/img/video-header.jpg" alt="レッスン一覧">
                        <span class="d-lg-none">レッスン一覧</span>
                        <span class="d-none d-lg-block">レッスン一覧</span>
                    </a>
                </li>
                -->
                <!--
                <li class="nav-item nav-item-user dropdown">
                    <a class="nav-link text-lg-center dropdown-toggle" data-toggle="dropdown" href="#">
                        <img class="img-user" src="/img/user.jpg" alt="">
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
                -->
                <li class="nav-item">
                    <a class="nav-link text-lg-center" href="{{ route('mypage') }}">
                        <img class="img-user" src="/img/user.jpg" alt="マイページ" style="margin-top:-10px;">
                        <span class="d-lg-none">マイページ</span>
                        <span class="d-none d-lg-block">マイページ</span>
                    </a>
                </li>
                <!--
                <li
                 class="nav-item">
                    <a class="nav-link text-lg-center" href="{{ route('user.change_password') }}">
                        <img class="img-video mb-2" src="/img/change-password.png" alt="パスワード変更">
                        <span class="d-lg-none">パスワード変更</span>
                        <span class="d-none d-lg-block">パスワード変更</span>
                    </a>
                </li>
                -->
                <li class="nav-item">
                    <a class="nav-link text-lg-center" href="{{ route('logout') }}">
                        <img class="img-logout" src="/img/logout.png" alt="ログアウト">
                        <span class="d-lg-none">ログアウト</span>
                        <span class="d-none d-lg-block">ログアウト</span>
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link text-lg-center" href="{{ route('register.diamond') }}" title='新規登録'>
                        <img class="img-party mb-2" src="/img/party.jpg" alt="新規登録">
                        <span class="d-lg-none">新規登録</span>
                        <span class="d-none d-lg-block">新規登録</span>
                    </a>
                </li>
                <!--
                <li class="nav-item">
                    <a class="nav-link text-lg-center" href="{{ route('lesson') }}">
                        <img class="img-video mb-2" src="/img/video-header.jpg" alt="レッスン一覧">
                        <span class="d-lg-none">レッスン一覧</span>
                        <span class="d-none d-lg-block">レッスン一覧</span>
                    </a>
                </li>
                -->
                <li class="nav-item">
                    <a class="nav-link text-lg-center" href="/login">
                        <img class="img-user" src="/img/user.jpg" alt="ログイン" style="margin-top:-10px;">
                        <span class="d-lg-none">ログイン</span>
                        <span class="d-none d-lg-block">ログイン</span>
                    </a>
                </li>
                <!--
                <li class="nav-item">
                    <a class="nav-link text-lg-center" href="/register">
                        <img class="img-party mb-2" src="/img/party.jpg" alt="無料会員">
                        <span class="d-lg-none">無料会員</span>
                        <span class="d-none d-lg-block">無料会員</span>
                    </a>
                </li>
                -->
            @endif
        </ul>
    </div>
</nav>
