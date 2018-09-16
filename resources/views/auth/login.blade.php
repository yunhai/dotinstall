@extends('layout.master')
@section('title', 'ログイン')
@push('js')
    <script type="text/javascript">
        @if (session('error'))
            $(window).on('load',function(){
                $('#error').modal('show');
            });
        @endif

        @if (session('invalid_active_link'))
            $(window).on('load',function(){
                $('#invalid_activation_link').modal('show');
            });
        @endif
    </script>
@endpush
@section('breadcrumbs', Breadcrumbs::render('login'))
@section('content')
<div id="content">
    <div class="box ttlCommon mb-0 px-5">プログラミングゴーにようこそ！</div>
    <div class="box-user px-5">
        <div class="col-12 mar_t20 mar_b20 pl-0 pr-0">
            <p class="mar_b20">すでにユーザーの方はこちらからログインしてください。Facebookとサイト連携している方は簡単にログインすることもできます。</p>
            <div class="row">
                <div class="col-2 d-none d-lg-block pr-0">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                        <a class="bg-nav-link nav-link active show" href="{{ route('login') }}" role="tab">ログイン</a>
                        <a class="nav-link" href="{{ route('register') }}" role="tab">新規登録</a>
                        <a class="nav-link" href="{{ route('register.diamond') }}" role="tab"><span class="mr-2"><img class="img-fluid" style="padding-bottom: 3px;" src="/img/charge_diamond.png" width="15px;"></span>アップグレード</a>
                        <a class="nav-link" href="{{ route('password.request') }}" role="tab">パスワードを忘れた？</a>
                    </div>
                </div>
                <div class="col-lg-7 pl-0 pr-0">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade active show" role="tabpanel">
                            <div class="tab-pane-user row">
                                <div class="col-12">
                                    <div class="card card-login">
                                        <div class="card-header">ログイン</div>

                                        <div class="card-body">
                                            <form method="POST" aria-label="ログイン">
                                                @csrf

                                                <div class="form-group row mb-4">
                                                    <label for="email" class="col-md-4 col-form-label">メールアドレス</label>

                                                    <div class="col-md-8">
                                                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">

                                                        @if ($errors->has('email'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-4">
                                                    <label for="password" class="col-md-4 col-form-label">パスワード</label>

                                                    <div class="col-md-8">
                                                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                                        @if ($errors->has('password'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-0">
                                                    <div class="col text-center">
                                                        <p class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" name='remember_me' value='1' class="form-check-input" style="@pc margin-top: 2px; @endpc @sp margin-top: 0px @endsp">ログイン情報を保存する
                                                            </label>
                                                        </p>
                                                        <button type="submit" class="bg-button pad_l20 pad_r20">ログイン</button>
                                                        <div class="help-block mt-3"><a href="{{ route('password.request') }}">パスワードを忘れた方はこちらへ</a></div>
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
                        <div class="card card-login-social">
                            <div class="card-header text-center">その他の方法でログイン</div>

                            <div class="card-body px-4">
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
                                <p class="mar_t15 mar_b0 text-danger">ログイン時に SNS に勝手に投稿されることはありません</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@if (session('error'))
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="error" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content rounded-0">
            <div class="modal-body">
                <p class="mb-0">{{ session('error') }}</p>
            </div>
            <div class="modal-footer" style="padding: 0; justify-content:center;">
              <a href="javascript:;" class="btn" data-dismiss="modal" aria-label="Close">OK</a>
            </div>
        </div>
    </div>
</div>
@endif

@if (session('invalid_active_link'))
    @include('component.modal.invalid_activation_link', [])
@endif
@endsection
