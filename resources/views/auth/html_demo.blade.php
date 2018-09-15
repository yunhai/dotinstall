@extends('layout.master')
@section('title', '新規登録')
@section('breadcrumbs', Breadcrumbs::render('register'))
@section('content')
<div id="content">
    <div class="box ttlCommon mb-0 px-5">ユーザー登録の完了まであと一歩です！</div>
    <div class="box-user px-5">
        <div class="col-12 mar_t30 mar_b30 pl-0 pr-0">
            <p class="mar_t30 mar_b30">送信されたメールに記載されているURLにアクセスしていただければユーザー登録が完了します。</p>
            <div class="row">
                <div class="col-2 d-none d-lg-block pr-0">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                        <a class="nav-link" href="{{ route('login') }}" role="tab">ログイン</a>
                        <a class="bg-nav-link nav-link active show" data-toggle="pill" href="{{ route('register') }}" role="tab">新規ユーザー登録</a>
                        <a class="nav-link" href="{{ route('password.request') }}" role="tab">パスワードを忘れた？</a>
                    </div>
                </div>
                <div class="col-lg-7 pl-0 pr-0">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade active show" role="tabpanel">
                            <div class="row justify-content-left">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">メールを送信しました！</div>

                                        <div class="card-body">
                                            <p>「{{ session('email') }}」 宛にメールを送信しました。メール本文に記載されている指示に従って手続きを完了させてください。</p>
                                            <p class="mar_b0">数分経ってもメールが届かない場合は、迷惑メールフォルダもあわせてご確認ください。</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-none d-lg-block">
                    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                        <div class="card">
                            <div class="card-header text-center">
                              ユーザー名について
                            </div>

                            <div class="card-body">
                                <p class="mar_b0">ユーザー名は送信されたメールに記載されたURLにアクセスした時点で確定となります。アクセスが遅れると他のユーザーにそのユーザー名を取られてしまう場合もありますのでご了承ください。</p>
                            </div>
                        </div>

                        <div class="card mar_t20">
                            <div class="card-header text-center">
                              ご注意
                            </div>

                            <div class="card-body">
                                <p class="mar_b0">送信メールに記載されたURLは一時間有効です。無効となった場合、最初から手続きをお願いいたします。</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
