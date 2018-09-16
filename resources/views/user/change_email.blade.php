@extends('layout.master')
@section('title', 'メールアドレスの変更')

@push('js')
@if (session('user_change_email_confirmation') || session('user_change_email_finish'))
    <script type="text/javascript">
        $(window).on('load',function(){
            $('#modal').modal('show');
        });
    </script>
    <div id="modal"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" style="max-width:420px;">
            <div class="modal-content rounded-0">
                <div class="modal-body">
                    <p class="mb-0">
                        @if (session('user_change_email_confirmation'))
                            入力したメールに認証URLを送信しました
                        @elseif (session('user_change_email_finish'))
                            メールを変更しました
                        @endif
                    </p>
                </div>
                <div class="modal-footer" style="padding: 0; justify-content:center;">
                    <a href="{{ route('top') }}" class="btn">OK</a>
                </div>
            </div>
        </div>
    </div>
@endif
@endpush

@section('breadcrumbs', Breadcrumbs::render('user.change_password'))
@section('content')
<div id="content">
    <div class="box ttlCommon mb-0 px-5">メールアドレスの変更</div>
    <div class="row px-5">
        <div class="col-12 mar_t20 mar_b20 pl-0 p-r-0">
            <p class="mar_b20">メールアドレスを変更するには、必要な項目を記入して更新してください。</p>
            @if (session('confirm'))
                <p class="alert alert-info mar_t20 mar_b20">
                    <button type="button" class="close" data-dismiss="alert" style="font-size: 13px; line-height: inherit;">×</button>
                    入力したメールに認証URLを送信しました
                </p>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade active show" role="tabpanel">
                            <div class="card">
                                <div class="card-header">メールアドレスの変更</div>
                                <div class="card-body">
                                    <form method="POST" aria-label="メールアドレスの変更">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">新メールアドレス</label>

                                            <div class="col-md-7">
                                                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email">

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
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
@endsection
