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
            <li class="nav-item" data-toggle="" data-placement="right" title="カテゴリー">
                <a class="nav-link" href="/backend/ms_category">
                    <i class="fa fa-cog fa-fw"></i>
                    <span class="nav-link-text">カテゴリー</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="" data-placement="right" title="レッスン一覧">
                <a class="nav-link" href="/backend/lesson">
                    <i class="fa fa-book fa-fw"></i>
                    <span class="nav-link-text">レッスン一覧</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="" data-placement="right" title="Tables">
                  <a class="nav-link" href="tables.html">
                        <i class="fa fa-fw fa-table"></i>
                        <span class="nav-link-text">Tables</span>
                  </a>
            </li>
            <li class="nav-item" data-toggle="" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">Components</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponents">
                    <li>
                        <a href="navbar.html">Navbar</a>
                    </li>
                    <li>
                        <a href="cards.html">Cards</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="" data-placement="right" title="Example Pages">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-file"></i>
                    <span class="nav-link-text">Example Pages</span>
                </a>
              <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                <li>
                    <a href="login.html">Login Page</a>
                </li>
                <li>
                    <a href="register.html">Registration Page</a>
                </li>
                <li>
                    <a href="forgot-password.html">Forgot Password Page</a>
                </li>
                <li>
                    <a href="blank.html">Blank Page</a>
                </li>
              </ul>
            </li>
            <li class="nav-item" data-toggle="" data-placement="right" title="Menu Levels">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-sitemap"></i>
                    <span class="nav-link-text">Menu Levels</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseMulti">
                    <li>
                        <a href="#">Second Level Item</a>
                    </li>
                <li>
                    <a href="#">Second Level Item</a>
                </li>
                <li>
                    <a href="#">Second Level Item</a>
                </li>
                <li>
                    <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>
                    <ul class="sidenav-third-level collapse" id="collapseMulti2">
                        <li>
                            <a href="#">Third Level Item</a>
                        </li>
                        <li>
                            <a href="#">Third Level Item</a>
                        </li>
                        <li>
                            <a href="#">Third Level Item</a>
                        </li>
                    </ul>
                </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="" data-placement="right" title="Link">
                <a class="nav-link" href="#">
                    <i class="fa fa-fw fa-link"></i>
                    <span class="nav-link-text">Link</span>
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