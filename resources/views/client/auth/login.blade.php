@extends('client.layout.blank')
@section('title', 'ログインパネル')
@section('content')
<div class="container">
    <div class="row justify-content-center mx-auto mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ログインパネル</div>
                <div class="card-body">
                    <form method="POST" action="" aria-label="ログインパネル" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">メール</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                @if (!empty($errors->first('email')))
                                    <span class="text-danger d-block mt-2">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パースワード</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}">
                                @if (!empty($errors->first('password')))
                                    <span class="text-danger d-block mt-2">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                        @if(Session::has('status'))
                            <div class="form-group row d-block text-center">
                                <span class="text-danger">メールアドレスかパスワードが間違っています</span>
                            </div>
                        @endif
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">ログイン</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
