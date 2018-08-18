@extends('backend.layout.master')
@section('title', 'ユーザー')
@section('content')
    @section('list_header')
        <div class='statis'>
            <label>無料人数: </label>
            <span>{{ $statis['member_diamond'] }}</span> <br />
            <label>有料人数: </label>
            <span>{{ $statis['member_normal'] }}</span>
        </div>
        @include('backend.component.filter.user.user', $filter_form ?? [])
    @stop
    @php
        $table = [
            'title' => 'カテゴリー',
            'header' => [
                'ユーザー名',
                'メールアドレス',
                '状況',
                '会員',
                '登録日',
                '',
            ],
            'body' => [
                'name' => [
                    'field' => 'name',
                ],
                'email' => [
                    'field' => 'email',
                    'attr' => [
                        'style' => 'width:25%',
                    ]
                ],
                'mode' => [
                    'field' => 'mode',
                    'option' => $form['mode'],
                ],
                'grade' => [
                    'field' => 'grade',
                    'option' => $form['grade'],
                ],
                'created_at' => [
                    'field' => 'created_at',
                ],
                'button' => [
                    'field' => '',
                    'tpl' => '
                        <a class="btn btn-info btn-sm" href="' . route('backend.user.edit', ['user_id' => ':id']) . '">編集</a>
                        <a class="btn btn-info btn-sm" href="' . route('backend.user.change_password', ['user_id' => ':id']) . '">パスワード変更</a>
                        <a href="' . route('backend.user.delete', ['user_id' => ':id']) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'削除してよろしいですか？\');">削除</a>
                    ',
                    'tpl_arg' => [
                        ':id' => 'id'
                    ],
                    'attr' => [
                        'style' => 'width:25%',
                        'class' => 'text-center'
                    ]
                ]
            ],
        ];
    @endphp
    @include('backend.component.list.paging', ['table' => $table, 'data' => $data])
@stop
