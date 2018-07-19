@extends('backend.layout.master')
@section('title', 'アフィリエイター一覧')
@section('content')
    @section('list_header')
        <div class="col-lg-12">
            <div class="form-group float-right">
                <a class="btn btn-primary btn-sm" href="{{ route('backend.affiliator.create') }}">新規</a>
            </div>
        </div>
    @stop

    @php
        $table = [
            'title' => 'アフィリエイター',
            'header' => [
                '姓名',
                'ユーザー名',
                'パス',
                'メールアドレス',
                'Token',
                'Commision_Rate',
                'Balance',
                '公開状況',
                '',
            ],
            'body' => [
                'fullname' => [
                    'field' => 'fullname',
                ],
                'username' => [
                    'field' => 'username',
                ],
                'password' => [
                    'field' => 'password',
                ],
                'email' => [
                    'field' => 'email',
                ],
                'token' => [
                    'field' => 'token',
                ],
                'commission_rate' => [
                    'field' => 'commission_rate',
                ],
                'balance' => [
                    'field' => 'balance',
                ],
                'mode' => [
                    'field' => 'mode',
                    'option' => $form['mode'],
                    'attr' => [
                        'style' => 'width:10%',
                        'class' => 'text-center'
                    ]
                ],
                'button' => [
                    'field' => '',
                    'tpl' => '
                        <a class="btn btn-info btn-sm" href="' . route('backend.affiliator.edit', ['affiliator_id' => ':id']) . '">編集</a>
                        <a href="' . route('backend.affiliator.delete', ['affiliator_id' => ':id']) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'削除してよろしいですか？\');">削除</a>
                    ',
                    'tpl_arg' => [
                        ':id' => 'id'
                    ],
                    'attr' => [
                        'style' => 'width:20%',
                        'class' => 'text-center'
                    ]
                ]
            ],
        ];
    @endphp
    @include('backend.component.list.paging', ['table' => $table, 'data' => $data])
@stop
