<div class="box box-panel mb-0">
    <div class="card">
        <img class="card-img card-img-panel" src="/img/panel.jpg">
        <div class="card-img-overlay px-5">
            <div class="card-body" @pc style="padding-top: .5rem; padding-left: 50px; padding-right: 50px;" @endpc>
                <h5 class="card-text card-text-header text-center font-weight-bold mb-0">小学１年生からプログラミング動画！</h5>
                <div class="row @pc align-items-end @endpc">
                    <div class="pc-card-sign card-sign p-0" id="pc-panel-left">
                        <p class="card-text card-text-sign">５分動画！小学生から大人まで！</p>
                        <p class="card-text card-text-sign">実戦で覚えるプログラミング！</p>
                        <p class="card-text card-text-sign">何も考えずに真似して作って見よう！</p>
                        <a href="{{ route('register') }}" class="card-sign-button">新規登録はこちら！</a>
                    </div>
                    <div class="card-video px-0" id="pc-panel-right">
                        @if (!empty($youtube_link))
                            <iframe width="480" height="240" src="{{ $youtube_link['link'] }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@pc
    @if (Auth::check() == false)
        @include('component.layout.panel_language_pc')
    @endif
    @normal_user
        @include('component.layout.panel_language_pc')
    @endnormal_user
@endpc
@sp
    @if (Auth::check() == false)
        @include('component.layout.panel_language_sp')
    @endif
    @normal_user
        @include('component.layout.panel_language_sp')
    @endnormal_user
@endsp