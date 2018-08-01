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
                '姓名',
                'メールアドレス',
                'パス',
                'ユーザー名',
                '手数料率',
                '手数料',
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
                'fullname' => [
                    'field' => 'fullname',
                ],
                'email' => [
                    'field' => 'email',
                ],
                'password' => [
                    'field' => 'password',
                ],
                'username' => [
                    'field' => 'username',
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
                        <a class="btn btn-info btn-sm" href="' . route('backend.affiliator_invitation.index', ['affiliator_id' => ':id']) . '">ユーザー</a>
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
