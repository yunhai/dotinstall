<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ route('backend.home.dashboard') }}">管理画面</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="" data-placement="right" title="レッスン">
                <a class="nav-link" href="{{ route('backend.lesson.index') }}">
                    <i class="fa fa-book fa-fw"></i>
                    <span class="nav-link-text">レッスン</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="" data-placement="right" title="アフィリエイター">
                <a class="nav-link" href="{{ route('backend.affiliator.index') }}">
                    <i class="fa fa-book fa-fw"></i>
                    <span class="nav-link-text">アフィリエイター</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="" data-placement="right" title="Youtubeリンク">
                <a class="nav-link" href="{{ route('backend.youtube_link.index') }}">
                    <i class="fa fa-book fa-fw"></i>
                    <span class="nav-link-text">Youtubeリンク</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="" data-placement="right" title="Youtubeリンク">
                <a class="nav-link" href="{{ route('backend.notification.index') }}">
                    <i class="fa fa-book fa-fw"></i>
                    <span class="nav-link-text">通知</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="" data-placement="right" title="カテゴリー">
                <a class="nav-link" href="{{ route('backend.ms_category.index') }}">
                    <i class="fa fa-cog fa-fw"></i>
                    <span class="nav-link-text">カテゴリー</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="" data-placement="right" title="ユーザー">
                <a class="nav-link" href="{{ route('backend.user.index') }}">
                    <i class="fa fa-fw fa-user"></i>
                    <span class="nav-link-text">ユーザー</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-user"></i>
                    <span class="">設定</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="messagesDropdown" style="right: 0; left: auto;">
                    <a class="dropdown-item" href="{{ route('backend.login.change_password') }}">
                        <div class="dropdown-message small">
                            <i class="fa fa-fw fa-lock"></i>パスワード変更
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('backend.login.logout') }}">
                        <div class="dropdown-message small">
                            <i class="fa fa-fw fa-sign-out"></i>ログアウト
                        </div>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
