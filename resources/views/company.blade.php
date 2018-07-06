@extends('layout.master')
@section('title', '運営者情報')
@section('content')
@section('breadcrumbs', Breadcrumbs::render('company'))
<div id="content">
    <div class="box"><h2 class="ttlCommon mb-0">運営者情報</h2></div>
    <div class="container col-8 mar_b30">
        <div class="card">
            <div class="card-header">運営者情報</div>

            <div class="card-body">
                <div class="form-group">
                    <p>【社名】株式会社プログラミングゴー<p>
                </div>
                <div class="form-group">
                    <p>【代表取締役社長】 　田中　誠<p>
                </div>
                <div class="form-group">
                    <p>【所在地】	東京都港区三田2丁目4-3</p>
                </div>
                <div class="form-group">
                    <p>【設立】2015年3月18日</p>
                </div>
                <div class="form-group mb-0">
                    <p class="card-text">【事業内容】初心者向けプログラミング勉強動画、実践型で楽しく学んでいく５分動画事業</p>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
