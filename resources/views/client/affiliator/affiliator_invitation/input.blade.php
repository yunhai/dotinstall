@extends('client.layout.master')
@section('title', 'アフィリエイター編集')
@section('content')
    @php
        $target = $target ?? [];
        $form = [
            'form_action' => '',
            'form_btn' => '保存',
            'form_label' => 'アフィリエイター編集',
            'form_back_url' => route('backend.affiliator.index'),
            'form_field' => [
                'name' => [
                    'field_label' => '姓名',
                    'field_name' => 'fullname',
                    'field_value' => array_get($target, 'fullname', ''),
                    'field_type' => 'text'
                ],
                'username' => [
                    'field_label' => 'ユーザー名',
                    'field_name' => 'username',
                    'field_value' => array_get($target, 'username', ''),
                    'field_type' => 'text'
                ],
                'password' => [
                    'field_label' => 'パス',
                    'field_name' => 'password',
                    'field_value' => array_get($target, 'password', ''),
                    'field_type' => 'text'
                ],
                'email' => [
                    'field_label' => 'メールアドレス',
                    'field_name' => 'email',
                    'field_value' => array_get($target, 'email', ''),
                    'field_type' => 'text'
                ],
                'commission_rate' => [
                    'field_label' => '手数料率',
                    'field_name' => 'commission_rate',
                    'field_value' => array_get($target, 'commission_rate', ''),
                    'field_type' => 'text'
                ],
                'token' => [
                    'field_label' => 'コード',
                    'field_name' => 'token',
                    'field_value' => array_get($target, 'token', ''),
                    'field_type' => 'text',
                    'field_attribute' => [
                        'readonly' => 'readonly'
                    ]
                ],
                'balance' => [
                    'field_label' => '手数料',
                    'field_name' => 'balance',
                    'field_value' => array_get($target, 'balance', ''),
                    'field_type' => 'text',
                    'field_attribute' => [
                        'readonly' => 'readonly'
                    ]
                ],
                'mode' => [
                    'field_label' => '状況',
                    'field_name' => 'mode',
                    'field_value' => array_get($target, 'mode', ''),
                    'field_type' => 'radio',
                    'field_option' => $form['mode'],
                ],
            ],
            'form_attribute' => [
            ]
        ];
    @endphp
    @include('backend.component.form.form', $form)
@stop
