@extends('layout.master')
@section('title', '運営者情報 | プログラミングＧＯ')
@section('meta_description', '運営者情報')
@section('breadcrumbs', Breadcrumbs::render('company'))
@section('content')
<div id="content">
    <div class="box ttlCommon mb-0 px-5">運営者情報</div>
    <div class="row px-5">
        <div class="col-12 mar_t20 mar_b20 pl-0 pr-0">
            <div class="card">
                <div class="card-header">運営者情報</div>
                <div class="card-body">
                    <div class="form-group">
                        <p>【代表取締役社長】 　田中　誠<p>
                    </div>
                    <div class="form-group">
                        <p>【所在地】    東京都港区三田2丁目4-3</p>
                    </div>
                    <div class="form-group">
                        <p>【電話番号】(050) 5809 7110</p>
                    </div>
                    <div class="form-group">
                        <p>【設立】2009年10月23日</p>
                    </div>
                    <div class="form-group mb-0">
                        <p class="card-text">【事業内容】初心者向けプログラミング勉強動画、実践型で楽しく学んでいく５分動画レッスン事業</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
