@extends('backend.layout.master')


@php
    $target = $target ?? [];
    $form = [
        'form_action' => '',
        'form_btn' => '保存',
        'form_label' => 'レッスン一編集',
        'form_field' => [
            'name' => [
                'field_label' => 'レッスン一名',
                'field_name' => 'name',
                'field_value' => array_get($target, 'name', ''),
                'field_type' => 'text'
            ],
            'sort' => [
                'field_label' => 'メディアカウント',
                'field_name' => 'media_count',
                'field_value' => array_get($target, 'media_count', ''),
                'field_type' => 'text'
            ],
        ],
        'form_attribute' => [
            'enctype' => 'multipart/form-data'
        ]
    ];
@endphp
@section('content')
    @include('backend.component.form.form', $form)
@stop
