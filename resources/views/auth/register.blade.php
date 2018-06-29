@extends('layout.master')
@section('title', '新規登録')

@section('content')
<!-- HEADER -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">トップ</li>
    <li class="breadcrumb-item active" aria-current="page">新規ユーザー登録</li>
  </ol>
</nav>
<div id="content">
    <h2 class="ttlCommon">プログラミングゴーにようこそ！</h2>
    <div class="container mar_b30">
        <p class="mar_t30 mar_b30">すでにユーザーの方はこちらからログインしてください。TwitterやFacebookとサイト連携している方は簡単にログインすることもできます。</p>
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                    <a class="nav-link" href="/login" role="tab">ログイン</a>
                    <a class="nav-link active show" data-toggle="pill" href="/" role="tab">新規ユーザー登録</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab">パスワードを忘れた？</a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    @include('component.register.form')
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="row justify-content-left">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">パスワード再設定手続き</div>
                        
                                        <div class="card-body">
                                            <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                                @csrf
                        
                                                <div class="form-group row">
                                                    <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>
                        
                                                    <div class="col-md-6">
                                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                        
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
                                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        
                                                        @if ($errors->has('password'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                        
                                                <div class="form-group row mb-0">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-primary">ユーザー登録する</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active show" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">ログイン</a>
                                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">新規ユーザー登録</a>
                                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">パスワードを忘れた？</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
