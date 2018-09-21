@extends('layout.master')
@section('title', 'パスワード再設定手続き')
@push('js')
    @if (session('status'))
    <script type="text/javascript">
        $(window).on('load',function(){
            $('#status').modal('show');
        });
    </script>
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="status" data-keyboard="false" data-backdrop="static">
              <div class="modal-dialog modal-sm">
                  <div class="modal-content rounded-0">
                      <div class="modal-body">
                          <p class="mb-0">登録メールアドレスに送信しました。ご確認お願いいたします。</p>
                      </div>
                      <div class="modal-footer" style="padding: 0; justify-content:center;">
                          <a href="javascript:;" class="btn" data-dismiss="modal" aria-label="Close">OK</a>
                      </div>
                  </div>
              </div>
        </div>
    @endif
@endpush
@section('breadcrumbs', Breadcrumbs::render('password.request'))
@section('content')
<div id="content">
    <div class="box ttlCommon mb-0 px-5">パスワード再設定手続き</div>
    <div class="box-user px-5">
        <div class="col-12 mar_t20 mar_b20 pl-0 pr-0">
            @if (session('status'))
                <p class="alert alert-info mar_b20">
                    <button type="button" class="close" data-dismiss="alert" style="font-size: 13px; line-height: inherit;">×</button>
                    {{ session('status') }}
                </p>
            @else
                <p class="mar_b20">パスワードを忘れた方は以下に登録時のメールアドレスを入力してください。手続きの手順を説明したメールを送らせていただきます。</p>
            @endif

            <div class="row">
                @pc
                <div class="col-2 pr-0">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                        <a class="nav-link" href="{{ route('login') }}" role="tab">ログイン</a>
                        <!--<a class="nav-link" href="/register" role="tab">新規ユーザー登録</a>-->
                        <a class="nav-link" href="{{ route('register.diamond') }}" role="tab"><span class="mr-2"><img class="img-fluid" style="padding-bottom: 7px;" src="/img/party.png" width="20px;"></span>新規登録</a>
                        <a class="bg-nav-link nav-link active show" href="{{ route('password.request') }}" role="tab">パスワードを忘れた？</a>
                    </div>
                </div>
                @endpc
                <div class="col-lg-7 pl-0 pr-0">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade active show" role="tabpanel">
                            <div class="tab-pane-user row">
                                <div class="col">
                                    <div class="card card-password-forgot">
                                        <div class="card-header">パスワード再設定手続き</div>

                                        <div class="card-body">
                                            <form method="POST" action="{{ route('password.email') }}"  aria-label="パスワード再設定手続き">
                                                @csrf

                                                <div class="form-group row">
                                                    <label for="email" class="col-md-4 col-form-label">登録メールアドレス</label>

                                                    <div class="col-md-8">
                                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">

                                                        @if ($errors->has('email'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-0">
                                                    <div class="col text-center">
                                                        <button type="submit" class="bg-button">メールを送信する</button>
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
                        <div class="card card-password-forgot-note">
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
</div>
@endsection
