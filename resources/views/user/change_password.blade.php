@extends('layout.master')
@section('title', 'パスワードの変更')
@section('breadcrumbs', Breadcrumbs::render('user.change_password'))
@section('content')
<div id="content">
    <div class="box ttlCommon mb-0 px-5">パスワードの変更</div>
    <div class="row px-5">
        <div class="col-12 mar_t20 mar_b20 pl-0 p-r-0">
            <p class="mar_b20">パスワードを変更するには、必要な項目を記入して更新してください。</p>
            @if (session('success'))
                <p class="alert alert-info mar_t20 mar_b20">
                    <button type="button" class="close" data-dismiss="alert" style="font-size: 13px; line-height: inherit;">×</button>
                    {{ session('success') }}
                </p>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade active show" role="tabpanel">
                            <div class="row justify-content-left">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">パスワードの変更</div>

                                        <div class="card-body">

                                            <form method="POST" action="{{ route('user.change_password') }}" aria-label="パスワードの変更">
                                                @csrf

                                                @if (!Auth::user()->provider)
                                                <div class="form-group row">
                                                    <label for="current_password" class="col-md-4 col-form-label text-md-right">現在のパスワード</label>

                                                    <div class="col-md-7">
                                                        <input id="current_password" type="password" class="form-control{{ $errors->has('current_password') ? ' is-invalid' : '' }}" name="current_password" value="{{ $current_password ?? old('current_password') }}" autofocus>

                                                        @if ($errors->has('current_password'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('current_password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                @endif

                                                <div class="form-group row">
                                                    <label for="new_password" class="col-md-4 col-form-label text-md-right">新パスワード</label>

                                                    <div class="col-md-7">
                                                        <input id="new_password" type="password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" name="new_password">

                                                        @if ($errors->has('new_password'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('new_password') }}</strong>
                                                            </span>
                                                        @endif
                                                        <div class="form-text">パスワードは6文字以上にしてください。</div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="new_password_confirmation" class="col-md-4 col-form-label text-md-right">新パスワード (確認)</label>

                                                    <div class="col-md-7">
                                                        <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-0">
                                                    <div class="col-md-7 offset-md-4">
                                                        <button type="submit" class="btn btn-sm bg-button">
                                                            更新する
                                                        </button>
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
            </div>
        </div>
    </div>
</div>
@endsection
