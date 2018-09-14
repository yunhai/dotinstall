@extends('layout.master')
@section('title', '新規登録')
@section('breadcrumbs', Breadcrumbs::render('register.diamond'))
@push('css')
    <link rel="stylesheet" href="/css/payment.css">
@endpush

@push('js')
    <script src="https://js.stripe.com/v3/"></script>
    <script>var STRIPE_KEY = "{{ config('services.stripe.key') }}";</script>
    <script src="/js/payment.js"></script>
    @if (session('success'))
        <script type="text/javascript">
            $(window).on('load',function(){
                $('#success').modal('show');
            });
        </script>
        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="success"  data-keyboard="false" data-backdrop="static">
              <div class="modal-dialog modal-sm" style="max-width:420px;">
                  <div class="modal-content rounded-0">
                      <div class="modal-body">
                          <p class="mb-0">月額会員ご登録ありがとうございます。</br>
                            マイページより購入履歴がご確認できます。</br>
                            何かご不明な事がありましたら、お問い合わせよりご連絡ください。</p>
                      </div>
                      <div class="modal-footer" style="padding: 0; justify-content:center;">
                          <a href="{{ route('top') }}" class="btn">OK</a>
                      </div>
                  </div>
              </div>
        </div>
    @endif
    <script type="text/javascript">
        $('#agree').change(function() {
            if ($(this).is(":checked")) {
                $("#j-submit").css("cursor", "pointer");
                $("#j-submit").css("opacity", "1");
            } else {
                $("#j-submit").css("cursor", "auto");
                $("#j-submit").css("opacity", "0.6");
            }
        });
    </script>
@endpush

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
                <p class="mar_b20">すでにユーザーの方はこちらからログインしてください。TwitterやFacebookとサイト連携している方は簡単にログインすることもできます。</p>
            @endif
            <div class="row">
                @pc
                <div class="col-2 pr-0">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                        <a class="nav-link" href="{{ route('login') }}" role="tab">ログイン</a>
                        <a class="nav-link" href="{{ route('register') }}" role="tab">新規登録</a>
                        <a class="bg-nav-link nav-link active show" data-toggle="pill" href="{{ route('register.diamond') }}" role="tab"><span class="mr-2"><img class="img-fluid" src="/img/charge_diamond.png" width="15px;"></span>アップグレード</a>
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
                                        <div class="card-header">【月額会員】</div>
                                        <div class="card-body">
                                            <ul class="card-info">
                                                <li>・全ての動画が見放題となります。</li>
                                                <li>・月額制:\980円（税込み）</li>
                                                <li>・クレジットカード決済のみとなります。</li>
                                                <li>・毎月自動決済されます。</li>
                                                <li>・購入後、設定変更画面から自動更新を停止することもできます。</li>
                                            </ul>
                                            <hr>
                                            <form id='j-payment-form' method="post" aria-label="新規ユーザー登録">
                                                <div class="@pc row-group @endpc">
                                                    <span class="card-note">＊すでに会員様は、マイページより購入お願いします。</span>
                                                    <label class="mar_b20">【新規登録】</label>
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

                                                    <div class="form-group row">
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
                                                </div>
                                                <hr>
                                                <div class="@pc row-group @endpc">
                                                    <label class="mar_b20">月額制:￥９８０円（税別）</label>
                                                    <div class="form-group">
                                                        <div>
                                                            <div class='container' id='card-holder'>
                                                                <div class='row' @sp style="padding-bottom:2px" @endsp>
                                                                    <div id="card-number" class='@pc col-5 @endpc @sp col-7 @endsp card-element' @sp style="flex:0 0 60%; max-width:60%;" @endsp></div>
                                                                    <div id="card-expiry" class='col-3 card-element'></div>
                                                                    <div id="card-cvc" class='col card-element' @pc style="max-width:90%; padding-left: 55px;" @endpc @sp style="padding-right:5px;padding-left: 3px;" @endsp></div>
                                                                </div>
                                                            </div>
                                                            <div id="card-errors" role="alert" style="margin-top: .25rem; color: #dc3545;"></div>
                                                            @if (!empty(session('error')))
                                                                @foreach (session('error') as $error)
                                                                    <div id="card-errors" role="alert" style="margin-top: .25rem; color: #dc3545;">{{ $error }}</div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                        <label for="card_number" class="col-form-label">※ 半角数字で入力</label>
                                                    </div>
                                                    <div class="form-group row mb-0">
                                                        <div class="col text-center">
                                                            <img class="img-fluid" src="/img/i-card.png">
                                                            <div class="agree">
                                                                <label>※ デビットカードご利用可能です。</label>
                                                                <label>※ 有料会員利用規約に同意されたうえでご登録ください。</label>
                                                                <div class="form-check">
                                                                    <label class="form-check-label" for="agree">
                                                                    <input type="checkbox" class="form-check-input" id="agree" style='margin-top:3px;'>
                                                                    有料会員<a target="_blank" href="{{ route('terms') }}">利用規約</a>に同意</label>
                                                                </div>
                                                            </div>
                                                            <button id='j-submit' type="submit" class="btn btn-lg btn-primary">有料会員に登録する</button>
                                                        </div>
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
                            <div class="card-header text-center" @pc style="padding-bottom:21px; padding-top:21px" @endpc>
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
                                    <a href="/auth/facebook" class="btn btn-facebook btn-block">
                                        <span><img class="img-fluid" src="/img/facebook.png"></span> <span class="btn-facebook-label">Facebookログイン</span>
                                    </a>
                                    <a href="/auth/yahoo" class="btn btn-yahoo btn-block">
                                        <span><img class="img-fluid" src="/img/yahoo.png"></span> <span class="btn-yahoo-label">ログイン</span>
                                    </a>
                                    <a href="/auth/google" class="btn btn-google btn-block">
                                        <span><img class="img-fluid" src="/img/google.png"></span> <span class="btn-google-label">Googleログイン</span>
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
