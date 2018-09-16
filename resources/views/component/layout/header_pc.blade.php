<!-- /HEADER -->
<h1 class="d-block px-5 py-2 mb-0 text-left text-bold text-white old-bv font_12">小学生から大人まで簡単な実戦でプログラミングを習得５分動画学習</h1>
<nav class="navbar navbar-expand navbar-light px-5 pt-0 pb-0">
    <a class="navbar-brand" href="/"><img class="img-logo" src="/img/logo_header.png" alt="cogwheel"></a>

    <div class="navbar-collapse">
        <ul class="navbar-nav ml-auto align-items-end">
            @if (Auth::check() && Auth::user()->role == constant('USER_ROLE_PUBLIC'))
                @normal_user
                <li class="nav-item">
                    <a class="nav-link text-center" href="{{ route('user.upgrade') }}" title='アップグレード'>
                        <img class="img-diamond mb-2" src="/img/diamond.jpg" alt="アップグレード">
                        <span class="d-block">アップグレード</span>
                    </a>
                </li>
                @endnormal_user
                <li class="nav-item">
                    <a class="nav-link text-center" href="{{ route('lesson') }}">
                        <img class="img-video mb-2" src="/img/video-header.jpg" alt="レッスン一覧">
                        <span class="d-block">レッスン一覧</span>
                    </a>
                </li>

                <li class="nav-item nav-item-user dropdown">
                    <a class="nav-link text-center dropdown-toggle" data-toggle="dropdown" href="#">
                        <img class="img-user mb-2" src="/img/user.jpg" alt="">
                        <span class="d-block">{{ $name }}</span>
                    </a>
                    <div class="dropdown-menu rounded-0" style="right: 0; left: auto;">
                        <a class="dropdown-item" href="{{ route('mypage') }}">
                            <div class="dropdown-message font_12">マイページ</div>
                        </a>
                        @if (!Auth::user()->provider)
                        <a class="dropdown-item" href="{{ route('user.change_password') }}" title='パスワード変更'>
                            <div class="dropdown-message font_12">パスワード変更</div>
                        </a>
                        <a class="dropdown-item" href="{{ route('user.change_email') }}" title='メールアドレス変更'>
                            <div class="dropdown-message font_12">メールアドレス変更</div>
                        </a>
                        @endif
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            <div class="dropdown-message font_12">ログアウト</div>
                        </a>
                    </div>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link text-center" href="{{ route('register.diamond') }}" title="アップグレード">
                        <img class="img-diamond mb-2" src="/img/diamond.jpg" alt="アップグレード">
                        <span class="d-block">アップグレード</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" href="{{ route('lesson') }}">
                        <img class="img-video mb-2" src="/img/video-header.jpg" alt="レッスン一覧">
                        <span class="d-block">レッスン一覧</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" href="/login">
                        <img class="img-user mb-2" src="/img/user.jpg" alt="ログイン">
                        <span class="d-block">ログイン</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" href="/register">
                        <img class="img-party mb-2" src="/img/party.jpg" alt="無料会員">
                        <span class="d-block">無料会員</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
