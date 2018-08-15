@extends('backend.layout.master')
@section('title', 'パスワード編集')
@php
    $target = $target ?? [];
    $form = [
        'form_btn' => '保存',
        'form_label' => 'パスワード',
        'form_back_url' => route('backend.user.index'),
        'form_field' => [
            'password' => [
                'field_label' => 'パスワード',
                'field_name' => 'password',
                'field_value' => array_get($target, 'password', ''),
                'field_type' => 'password'
            ],

        ],
        'form_attribute' => [
        ]
    ];
@endphp
@section('content')
    @include('backend.component.form.form', $form)
@stop
