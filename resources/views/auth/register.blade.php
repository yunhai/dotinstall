@extends('layout.master')
@section('title', '新規登録')
@section('breadcrumbs', Breadcrumbs::render('register'))
@section('content')
<div id="content">
    <div class="box mb-0"><h2 class="ttlCommon">プログラミングゴーにようこそ！</h2></div>
    <div class="container mar_b30">
        <p class="mar_t30 mar_b30">すでにユーザーの方はこちらからログインしてください。TwitterやFacebookとサイト連携している方は簡単にログインすることもできます。</p>
        <div class="row">
            <div class="col-3 d-none d-lg-block">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                    <a class="nav-link" href="/login" role="tab">ログイン</a>
                    <a class="nav-link active show" data-toggle="pill" href="/" role="tab">新規ユーザー登録</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab">パスワードを忘れた？</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade active show" role="tabpanel">
                        <div class="row justify-content-left">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">新規ユーザー登録</div>

                                    <div class="card-body">
                                        <form method="POST" action="" aria-label="新規ユーザー登録">
                                            @csrf

                                            @if(app('request')->input('provider') == 'facebook')
                                            <div class="form-group row">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">Facebookアカウント</label>

                                                <div class="col-md-6">
                                                    <input type="text" class="form-control float-left w-75 mr-1" value="{{ app('request')->input('name') }}" disabled>
                                                    <input type="hidden" name="provider" value="{{ app('request')->input('provider') }}">
                                                    <input type="hidden" name="provider_user_id" value="{{ app('request')->input('provider_user_id') }}">
                                                    <img class="img-fluid" src="img/facebook.png" style="vertical-align: -15px;">
                                                </div>
                                            </div>
                                            @endif
                                            <div class="form-group row">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">ユーザー名</label>

                                                <div class="col-md-6">
                                                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                                    @if ($errors->has('name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

                                                <div class="col-md-6">
                                                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                                                <div class="col-md-6">
                                                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-default">ユーザー登録する</button>
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
                        <div class="card-header">その他の方法でログイン</div>

                        <div class="card-body">
                            <a href="/auth/line" class="btn btn-line btn-block">LINEログイン</a>
                            <a href="/auth/twitter" class="btn btn-twitter btn-block">
                                <span><img class="img-fluid" src="img/twitter.png"></span> <span class="btn-twitter-label">Twitterで登録</span>
                            </a>
                            <a href="/auth/facebook" class="btn btn-facebook btn-block">
                                <span><img class="img-fluid" src="img/facebook.png"></span> <span class="btn-facebook-label">Facebookで登録</span>
                            </a>
                            <a href="/auth/yahoo" class="btn btn-yahoo btn-block">
                                <span><img class="img-fluid" src="img/yahoo.png"></span> <span class="btn-yahoo-label">で登録</span>
                            </a>
                            <a href="/auth/google" class="btn btn-google btn-block">
                                <span><img class="img-fluid" src="img/google.png"></span> <span class="btn-google-label">Googleで登録</span>
                            </a>
                            <p class="mar_t10 mar_b0 text-danger">ログイン時に SNS に勝手に投稿されることはありません</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
