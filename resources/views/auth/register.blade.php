@extends('layout.master')
@section('title', '新規登録')
@section('breadcrumbs', Breadcrumbs::render('register'))
@section('content')
<div id="content">
    @if (app('request')->input('provider') == 'line')
        @php
            $provider_ttl = 'LINEアカウントで登録します';
            $provider_lbl = 'LINEアカウント';
        @endphp
    @elseif (app('request')->input('provider') == 'twitter')
        @php
            $provider_ttl = 'Twitterアカウントで登録します';
            $provider_lbl = 'Twitterアカウント';
        @endphp
    @elseif (app('request')->input('provider') == 'facebook')
        @php
            $provider_ttl = 'Facebookアカウントで登録します';
            $provider_lbl = 'Facebookアカウント';
        @endphp
    @elseif (app('request')->input('provider') == 'yahoo')
        @php
            $provider_ttl = 'Yahooアカウントで登録します';
            $provider_lbl = 'Yahooアカウント';
        @endphp
    @elseif (app('request')->input('provider') == 'google')
        @php
            $provider_ttl = 'Googleアカウントで登録します';
            $provider_lbl = 'Googleアカウント';
        @endphp
    @else
        @php
            $provider_ttl = 'プログラミングゴーにようこそ！';
            $provider_lbl = '';
        @endphp
    @endif
    <div class="box ttlCommon mb-0 px-5">{{ $provider_ttl }}</div>
    <div class="box-user px-5">
        <div class="col-12 mar_t20 mar_b20 pl-0 pr-0">
            @if (!empty(app('request')->input('provider')))
                <p class="alert alert-info mar_b20">この{{ $provider_lbl }}と連携したアカウントを新しく作成します。以下に必要事項を入力してください。
                    <br>
                    <span>（既にアカウントをお持ちの方はメールアドレスとパスワードでログインしたあとに「設定変更」から{{ $provider_lbl }}との連携をおこなってください。）</span>
                </p>
            @else
                <p class="mar_b20">初めての方はまずはユーザー登録をしてください。なお、外部サービスのアカウントで登録すると、後日簡単にログインすることができます。</p>
            @endif
            <div class="row">
                @pc
                <div class="col-2 pr-0">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                        <a class="nav-link" href="{{ route('login') }}" role="tab">ログイン</a>
                        <a class="bg-nav-link nav-link active show" data-toggle="pill" href="{{ route('register') }}" role="tab">新規登録</a>
                        <a class="nav-link" href="{{ route('register.diamond') }}" role="tab"><span class="mr-2"><img class="img-fluid" src="/img/charge_diamond.png" width="15px;"></span>月額会員になる</a>
                        <a class="nav-link" href="{{ route('password.request') }}" role="tab">パスワードを忘れた？</a>
                    </div>
                </div>
                @endpc
                <div class="col-lg-7 pl-0 pr-0">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade active show" role="tabpanel">
                            <div class="tab-pane-user row">
                                <div class="col">
                                    <div class="card card-register">
                                        <div class="card-header">無理会員登録（¥980円税別クレジット決済のみご利用可能です。）</div>

                                        <div class="card-body">
                                            <form method="POST" aria-label="新規ユーザー登録">
                                                @csrf

                                                @if (!empty($provider_lbl))
                                                    <div class="form-group row mb-4">
                                                        <label for="name" class="col-md-4 col-form-label">
                                                            {{ $provider_lbl }}
                                                        </label>

                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control float-left w-75 mr-1" value="{{ app('request')->input('name') }}" disabled>
                                                            <input type="hidden" name="provider" value="{{ app('request')->input('provider') }}">
                                                            <input type="hidden" name="provider_user_id" value="{{ app('request')->input('provider_user_id') }}">
                                                            <img class="img-fluid" src="img/{{ app('request')->input('provider') }}.png" style="vertical-align: -15px;">
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="form-group row mb-4">
                                                    <label for="email" class="col-md-4 col-form-label">メールアドレス</label>

                                                    <div class="col-md-8">
                                                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') ? old('email') : app('request')->input('email') }}">

                                                        @if ($errors->has('email'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if (empty(app('request')->input('provider')))
                                                <div class="form-group row">
                                                    <label for="password" class="col-md-4 col-form-label">パスワード</label>

                                                    <div class="col-md-8">
                                                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                                                        <div class="form-text">パスワードは6文字以上にしてください。</div>

                                                        @if ($errors->has('password'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="password_confirmation" class="col-md-4 col-form-label">パスワード確認</label>

                                                    <div class="col-md-8">
                                                        <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation">

                                                        @if ($errors->has('password_confirmation'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                @endif

                                                <div class="form-group row mb-0">
                                                    <div class="col text-center">
                                                        <p class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" style="@pc margin-top: 2px; @endpc @sp margin-top: 0px @endsp" checked>学習レポートメールを受け取る
                                                            </label>
                                                        </p>
                                                        <p class="mt-3">
                                                            <a href="{{ route('terms') }}" target="_blank">利用規約に同意</a>
                                                        </p>
                                                        <button type="submit" class="bg-button pad_l25 pad_r25">登録する</button>
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
                <div class="@pc col-3 @endpc @sp col-sm-12 mar_t20 @endsp">
                    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                        <div class="card card-register-social">
                            <div class="card-header text-center">
                                @if (!empty(app('request')->input('provider')))
                                    なぜ入力が必要なの？
                                @else
                                    その他の方法でログイン
                                @endif
                            </div>

                            <div class="card-body @if (empty(app('request')->input('provider'))) px-4 @endif">
                                @if (!empty(app('request')->input('provider')))
                                    <p>メールアドレスは運営側からの連絡をする際に必要となります。</p>
                                    <p class="mar_b0">パスワードを設定したい場合は、ユーザー登録後に設定変更画面からおこなってください。</p>
                                @else
                                    <!--
                                    <a href="/auth/line" class="btn btn-line btn-block">LINEログイン</a>
                                    <a href="/auth/twitter" class="btn btn-twitter btn-block">
                                        <span><img class="img-fluid" src="img/twitter.png"></span> <span class="btn-twitter-label">Twitterログイン</span>
                                    </a>
                                    -->
                                    <a href="/auth/facebook" class="btn btn-facebook btn-block">
                                        <span><img class="img-fluid" src="img/facebook.png"></span> <span class="btn-facebook-label">Facebookログイン</span>
                                    </a>
                                    <a href="/auth/yahoo" class="btn btn-yahoo btn-block">
                                        <span><img class="img-fluid" src="img/yahoo.png"></span> <span class="btn-yahoo-label">ログイン</span>
                                    </a>
                                    <a href="/auth/google" class="btn btn-google btn-block">
                                        <span><img class="img-fluid" src="img/google.png"></span> <span class="btn-google-label">Googleログイン</span>
                                    </a>
                                    <p class="mar_t10 mar_b0 text-danger">ログイン時に SNS に勝手に投稿されることはありません</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
