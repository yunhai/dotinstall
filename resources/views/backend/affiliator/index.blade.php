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
                '',
                'URL',
                '姓名',
                'メールアドレス',
                'パス',
                '利益',
                '料金率',
                '状況',
                '',
            ],
            'body' => [
                'qrcode' => [
                    'field' => '',
                    'tpl' => '
                        <img src="https://chart.googleapis.com/chart?cht=qr&amp;chs=100x100&amp;chl=' . route('register.affiliator', ['token' => ':token']) . '">
                    ',
                    'tpl_arg' => [
                        ':token' => 'token'
                    ],
                    'attr' => [
                        'style' => 'width:15%',
                        'class' => 'text-center'
                    ]
                ],
                'url' => [
                    'field' => '',
                    'tpl' => route('register.affiliator', ['token' => ':token'])
                    ,
                    'tpl_arg' => [
                        ':token' => 'token'
                    ],
                ],
                'fullname' => [
                    'field' => 'fullname',
                ],
                'email' => [
                    'field' => 'email',
                ],
                'password' => [
                    'field' => 'password',
                ],
                'balance' => [
                    'field' => 'balance',
                ],
                'commission_rate' => [
                    'field' => '',
                    'field' => '',
                    'tpl' => ':commission_rate %',
                    'tpl_arg' => [
                        ':commission_rate' => 'commission_rate'
                    ],
                    'attr' => [
                        'style' => 'width:8%',
                        'class' => 'text-center'
                    ]
                ],
                'mode' => [
                    'field' => 'mode',
                    'option' => $form['mode'],
                    'attr' => [
                        'style' => 'width:6%',
                        'class' => 'text-center'
                    ]
                ],
                'button' => [
                    'field' => '',
                    'tpl' => '
                        <a class="btn btn-primary btn-sm" href="' . route('backend.affiliator_income.index', ['affiliator_id' => ':id']) . '">利益</a>
                        <a class="btn btn-secondary btn-sm" href="' . route('backend.affiliator_invitation.index', ['affiliator_id' => ':id']) . '">ユーザー</a>
                        <a class="btn btn-info btn-sm" href="' . route('backend.affiliator.edit', ['affiliator_id' => ':id']) . '">編集</a>
                        <a class="btn btn-danger btn-sm" href="' . route('backend.affiliator.delete', ['affiliator_id' => ':id']) . '" onclick="return confirm(\'削除してよろしいですか？\');">削除</a>
                    ',
                    'tpl_arg' => [
                        ':id' => 'id'
                    ],
                    'attr' => [
                        'style' => 'width:10%',
                        'class' => 'text-center'
                    ]
                ]
            ],
        ];
    @endphp
    @include('backend.component.list.paging', ['table' => $table, 'data' => $data])
@stop
