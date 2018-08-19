@extends('layout.master')
@section('title', 'お問い合わせ')
@section('content')
@section('breadcrumbs', Breadcrumbs::render('contact.finish'))
<div id="content">
    <div class="box ttlCommon mb-0 px-5">お問い合わせ</div>
    <div class="row px-5">
        <div class="col-12 mar_t20 mar_b20 pl-0 pr-0">お問い合わせありがとうございました。<br />＊土曜日、日曜日、休日、年始、定休日を除き２４時間以内に担当者からご連絡いたします。<br />
        </div>
    </div>
</div>
@endsection
