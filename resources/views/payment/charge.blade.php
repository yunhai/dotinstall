@extends('layout.master')
@section('title', 'プログラミングＧＯ')
@push('css')
    <link rel="stylesheet" href="/css/payment.css">
@endpush

@push('js')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="/js/payment.js"></script>
@endpush
@section('breadcrumbs', Breadcrumbs::render('stripe'))

@section('content')
<div id="content">
    <div class="box"><h2 class="ttlCommon mb-0">マイページ</h2></div>
    <div class="container col-8 mar_b30">
        <div class="card">
            <div class="card-header text-center"><span class="mr-2"><img class="img-fluid" src="img/charge_diamond.png"></span><span>ダイヤモンド会員になる</span></div>

            <div class="card-body">
                <form id='j-payment-form' class="form-c" method="POST" action="{{ route('payment.charge') }}">
                    @csrf

                    <div class="form-group form-group-stripe">
                        <p>クレジットカード情報を登録<p>
                    </div>
                    <div class="form-group form-group-stripe">
                        <p>お支払い方法	クレジットカード<p>
                        <p>動画は全て見放題となります！動画は毎月増えます！</p>
                        <p>※ 毎月自動的に決済されます。<br>※ 購入後、設定変更画面から自動更新を停止することもできます。</p>
                    </div>
                    <div class="form-group form-group-stripe mb-0 border-bottom-0">
                        <div class="form-group row">
                            <p class="col-md-4 col-form-label text-md-left">ダイヤモンド会員、月額/980円（税別）<p>
                        </div>
                        <div class="form-group row">
                            <label for="card_number" class="col-md-4 col-form-label text-md-right">クレジットカード番号</label>

                            <div class="col-md-6">
                                <div id="card-element"></div>
                                <div id="card-errors" role="alert"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <button id='j-submit' type="btn" class="btn btn-primary">ダイヤモンド会員に登録する</button>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <p class="card-text">※ 弊社からクレジットカード会社への請求が行なわれる時期は翌月中旬となります。<br>※ プレミアム会員利用規約に同意されたうえでご登録ください。</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
