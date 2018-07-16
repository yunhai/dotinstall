@extends('layout.master')
@section('title', 'プログラミングＧＯ')
@section('content')
@section('breadcrumbs', Breadcrumbs::render('stripe'))
<div id="content">
    <div class="box"><h2 class="ttlCommon mb-0">マイページ</h2></div>
    <div class="container col-8 mar_b30">
        <div class="card">
            <div class="card-header text-center"><span class="mr-2"><img class="img-fluid" src="img/charge_diamond.png"></span><span>ダイヤモンド会員になる</span></div>

            <div class="card-body">
                <form class="form-c" method="POST" action="">
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
                                <p><input type="text" class="form-control" name="" value=""></p>
                                <p>※ 半角数字で入力</p>
                                <p><img class="img-fluid" src="img/charge.png"></p>
                                <p>※ デビットカードご利用可能です。</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">有効期限 (月/年)</label>

                            <div class="col-md-6">
                                <p>
                                    <select>
                                    <option value="volvo">Volvo</option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                    </select>
                                    <select>
                                    <option value="volvo">Volvo</option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                    </select>
                                </p>
                                <p class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" style="margin-top: .2rem;">規約に同意
                                    </label>
                                </p>
                                <p>
                                    <button type="submit" class="btn btn-primary">ダイヤモンド会員に登録する</button>
                                </p>
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
