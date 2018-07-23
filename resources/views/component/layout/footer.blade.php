<footer class="footer">
    <div class="container-fluid px-5 pad_t40 pad_b40">
        <div class="row">
            <div class="col-lg-6 col-md-6 text-center footer-container-left">
                <h6 class="mar_b10">5分動画で実践的にプログラミングを習得！</h6>
                <h4 class="title-widget">
                    <a class="" href="/"><img class="img-logo" src="/img/logo_footer.png" alt="cogwheel"></a>
                </h4>
            </div>
            <div class="col-lg-3 col-md-3">
                <h6 class="title-widget">ご利用にあたって</h6>
                <hr>
                <ul class="pad_l20">
                    <li class="pb-1"><a href="{{ route('terms') }}">利用規約</a></li>
                    <li class="pb-1"><a href="{{ route('privacy') }}">プライバシーポリシー</a></li>
                    <li class="pb-1"><a href="{{ route('company') }}">運営企業情報</a></li>
                    <li><a href="{{ route('contact') }}">お問い合わせ</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3">
                <h6 class="title-widget">ソーシャルメディア</h6>
                <hr>
                <ul class="pad_l20">
                    <li class="pb-1"><a href="#">Twitter</a></li>
                    <li><a href="#">Facebook</a></li>
                </ul>
                <h6 class="title-widget">サービス</h6>
                <hr>
                <ul class="pad_l20 mar_b0">
                    <li class="pb-1"><a href="{{ route('lesson') }}">レッスン一覧（{{ $total_lessons }}）</a></li>
                    <li><a href="#">有料会員ご説明</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
