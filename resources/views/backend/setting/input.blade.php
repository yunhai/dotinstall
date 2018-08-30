@extends('backend.layout.master')
@section('title', '設定編集')
@php
    $target = $target ?? [];
    $form = [
        'form_btn' => '保存',
        'form_label' => '設定',
        'form_back_url' => route('backend.setting.index'),
        'form_field' => [
            'show_name' => [
                'field_label' => '設定項目',
                'field_name' => 'show_name',
                'field_value' => array_get($target, 'show_name', ''),
                'field_type' => 'text',
                'field_attribute' => [
                    'readonly' => 'readonly'
                ]
            ],
            /*
            'key' => [
                'field_label' => 'ロジック名',
                'field_name' => 'key',
                'field_value' => array_get($target, 'key', ''),
                'field_type' => 'text',
                'field_attribute' => [
                    'readonly' => 'readonly',
                ]
            ],
            */
            'value' => [
                'field_label' => '設定値',
                'field_name' => 'value',
                'field_value' => array_get($target, 'value', ''),
                'field_type' => 'text'
            ]
        ],
        'form_attribute' => [
            'key' => 'hidden',
        ]
    ];
@endphp
@section('content')
    @include('backend.component.form.form', $form)
@stop
