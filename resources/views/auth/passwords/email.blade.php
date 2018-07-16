@extends('layout.master')
@section('title', 'パスワード再設定手続き')
@section('breadcrumbs', Breadcrumbs::render('password.email'))
@section('content')
<div id="content">
    <div class="box mb-0"><h2 class="ttlCommon">パスワード再設定手続き</h2></div>
    <div class="container mar_b30">
        <p class="mar_t30 mar_b30">パスワードを忘れた方は以下に登録時のメールアドレスを入力してください。手続きの手順を説明したメールを送らせていただきます。</p>
        <div class="row">
            <div class="col-3 d-none d-lg-block">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                    <a class="nav-link" href="{{ route('login') }}" role="tab">ログイン</a>
                    <a class="nav-link" href="/register" role="tab">新規ユーザー登録</a>
                    <a class="nav-link active show" href="{{ route('password.email') }}" role="tab">パスワードを忘れた？</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade active show" role="tabpanel">
                        <div class="row justify-content-left">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">パスワード再設定手続き</div>

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('password.email') }}"  aria-label="パスワード再設定手続き">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">登録メールアドレス</label>

                                                <div class="col-md-7">
                                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">

                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-7 offset-md-4">
                                                    <button type="submit" class="btn btn-default">メールを送信する</button>
                                                </div>
                                            </div>
                                        </form>
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
                        <div class="card-header text-center">ご注意</div>

                        <div class="card-body">
                            <p class="mar_b0">パスワードを設定したい場合は、ユーザー登録後に設定変更画面からおこなってください。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
