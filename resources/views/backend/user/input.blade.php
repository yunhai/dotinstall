@extends('backend.layout.master')
@section('title', 'ユーザー編集')
@php
    $target = $target ?? [];
    $form = [
        'form_btn' => '保存',
        'form_label' => 'ユーザー',
        'form_back_url' => route('backend.user.index'),
        'form_field' => [
            'name' => [
                'field_label' => 'ユーザー名',
                'field_name' => 'name',
                'field_value' => array_get($target, 'name', ''),
                'field_type' => 'text'
            ],
            'email' => [
                'field_label' => 'メールアドレス',
                'field_name' => 'email',
                'field_value' => array_get($target, 'email', ''),
                'field_type' => 'text'
            ],

        ],
        'form_attribute' => [
        ]
    ];
@endphp
@section('content')
    @include('backend.component.form.form', $form)
@stop
