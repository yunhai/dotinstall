@extends('backend.layout.master')
@section('title', 'アフィリエイター一覧')
@section('content')
    @section('list_header')
        <div class="row">
            <div class="col-sm-12">
                <div id="dataTable_filter" class="dataTables_filter">
                    <label>
                        <a class="btn btn-primary btn-sm" href="{{ route('backend.affiliator.create') }}">新規</a>
                    </label>
                </div>
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
                'コード',
                '手数料率',
                '手数料',
                '状況',
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
                        'style' => 'width:15%',
                        'class' => 'text-center'
                    ]
                ]
            ],
        ];
    @endphp
    @include('backend.component.list.paging', ['table' => $table, 'data' => $data])
@stop
