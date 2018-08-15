<div class="box box-panel mb-0">
    <div class="card">
        <img class="card-img card-img-panel" src="/img/panel.jpg">
        <div class="card-img-overlay px-5">
            <div class="card-body" @pc style="padding-top: .5rem; padding-left: 70px; padding-right: 70px;" @endpc>
                <h5 class="card-text card-text-header text-center font-weight-bold mb-0">小学生からプログラミング動画！</h5>
                <div class="row @pc align-items-end @endpc">
                    <div class="pc-card-sign card-sign p-0" id="pc-panel-left">
                        <p class="card-text card-text-sign">５分動画！小学生から大人まで！</p>
                        <p class="card-text card-text-sign">実戦で覚えるプログラミング！</p>
                        <p class="card-text card-text-sign last">何も考えずに真似して作って見よう！</p>
                        <a href="{{ route('register') }}" class="card-sign-button">新規登録はこちら！</a>
                    </div>
                    <div class="card-video px-0" id="pc-panel-right">
                        @if (!empty($youtube_link))
                            <iframe width="480" height="240" src="https://www.youtube.com/embed/{{ $youtube_link['youtube_id'] }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>