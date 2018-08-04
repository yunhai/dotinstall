@extends('backend.layout.master')
@section('title', 'パスワード編集')
@php
    $target = $target ?? [];
    $form = [
        'form_btn' => '保存',
        'form_label' => 'パスワード変更',
        'form_field' => [
            'current_password' => [
                'field_label' => '前のパスワード',
                'field_name' => 'current_password',
                'field_value' => array_get($target, 'current_password', ''),
                'field_type' => 'password'
            ],
            'new_password' => [
                'field_label' => '新しいパスワード',
                'field_name' => 'new_password',
                'field_value' => array_get($target, 'new_password', ''),
                'field_type' => 'password'
            ],
            'new_password_confirmation' => [
                'field_label' => '確認パスワード',
                'field_name' => 'new_password_confirmation',
                'field_value' => array_get($target, 'new_password_confirmation', ''),
                'field_type' => 'password'
            ]
        ],
        'form_attribute' => [
        ]
    ];
@endphp
@section('content')
    @include('backend.component.form.form', $form)
@stop
