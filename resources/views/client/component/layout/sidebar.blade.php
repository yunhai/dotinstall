<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="/backend/">管理画面</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="" data-placement="right" title="Dashboard">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="" data-placement="right" title="ユーザー">
                <a class="nav-link" href="/backend/user">
                    <i class="fa fa-fw fa-user"></i>
                    <span class="nav-link-text">ユーザー</span>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-user"></i>
                    <span class="d-lg-none">管理者パスワード変更</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="messagesDropdown" style="right: 0; left: auto;">
                    <a class="dropdown-item" href="/backend/changePassword">
                        <div class="dropdown-message small">
                            <i class="fa fa-fw fa-lock"></i>管理者パスワード変更
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/backend/logout">
                        <div class="dropdown-message small">
                            <i class="fa fa-fw fa-sign-out"></i>ログアウト
                        </div>
                    </a>
                </div>
            </li>
            <!--
            <li class="nav-item">
                <a class="nav-link" href="/backend/changePassword/">
                    <i class="fa fa-fw fa-lock"></i>管理者パスワード変更
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>ログアウト
                </a>
            </li>
             -->
        </ul>
    </div>
</nav>