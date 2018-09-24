@extends('layout.master')
@section('title', 'お問い合わせ | プログラミングＧＯ')
@section('meta_description', 'お問い合わせ')
@section('content')
@section('breadcrumbs', Breadcrumbs::render('contact.contact'))
<div id="content">
    <div class="box ttlCommon mb-0 px-5">お問い合わせ</div>
    <div class="row px-5">
        <div class="col-12 mar_t20 mar_b20 pl-0 pr-0">
            <div class="card">
                <div class="card-header">お問い合わせ</div>

                <div class="card-body">
                    <form method="POST" aria-label="お問い合わせ" class="form-c">
                        @csrf

                        <div class="form-group">
                            <label for="name">お名前<span class="required">（必須）</span></label>
                            <input class="form-control w-50" name="name" placeholder="お名前">
                            @if (!empty($errors->first('name')))
                                <span class="text-danger d-block mt-2">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">メールアドレス<span class="required">（必須）</span></label>
                            <input class="form-control w-50" name="email" placeholder="メールアドレス">
                            @if (!empty($errors->first('email')))
                                <span class="text-danger d-block mt-2">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone">電話番号</label>
                            <input class="form-control w-50" name="phone" placeholder="電話番号">
                            @if (!empty($errors->first('phone')))
                                <span class="text-danger d-block mt-2">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="content">内容<span class="required">（必須）</span></label>
                            <textarea class="form-control" rows="10" name="content" placeholder="内容"></textarea>
                            @if (!empty($errors->first('content')))
                                <span class="text-danger d-block mt-2">{{ $errors->first('content') }}</span>
                            @endif
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-primary" value="送信">
                        </div>
                        <p class="mb-0 text-center">＊土曜日、日曜日、休日、年始、定休日を除き２４時間以内に担当者からご連絡いたします。</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
