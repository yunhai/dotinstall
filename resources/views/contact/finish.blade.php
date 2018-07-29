@extends('layout.master')
@section('title', 'お問い合わせ')
@section('content')
@section('breadcrumbs', Breadcrumbs::render('contact.finish'))
<div id="content">
    <div class="box ttlCommon mb-0 px-5">お問い合わせ</div>
    <div class="row px-5">
        <div class="col-12 mar_t30 mar_b30 pl-0 pr-0">
            ご意見ありがとうございました。<br />
            いただいたご意見はスタッフが必ず目を通して参考にさせていただきます。<br />
            大変恐縮ですが個々のご意見にはご返答できませんので、ご了承ください。<br />
            今後ともハタラクティブを何卒よろしくお願いいたします。<br />
        </div>
    </div>
</div>
@endsection
