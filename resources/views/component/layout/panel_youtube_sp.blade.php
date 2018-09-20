<div class="box box-panel box-panel-yt mb-0">
    <div class="card">
        <div class="card-img-overlay px-5">
            <div class="card-body card-body-text">
                <h5 class="card-text card-text-header text-center font-weight-bold mb-0">{{ $global_setting['slogan'] }}</h5>
                <div class="row">
                    <div class="card-sign p-0" id="pc-panel-left">
                        <!--<p class="card-text card-text-sign">無料レッスンもいっぱいご用意！</p>-->
                        <p class="card-text card-text-sign last">{!! nl2br($global_setting['page_caption']) !!}</p>
                        @if (!Auth::check())
                        <a href="{{ route('register') }}" class="card-sign-button" style='margin-right: 15px;'>新規登録はこちら！</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
