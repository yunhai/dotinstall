@extends('backend.layout.master')
@section('title', 'カテゴリー編集')
@php
    $target = $target ?? [];
    $form = [
        'form_btn' => '保存',
        'form_label' => 'カテゴリー',
        'form_back_url' => route('backend.ms_category.index'),
        'form_field' => [
            'name' => [
                'field_label' => 'カテゴリー名',
                'field_name' => 'name',
                'field_value' => array_get($target, 'name', ''),
                'field_type' => 'text'
            ],
            'sort' => [
                'field_label' => '表示順序',
                'field_name' => 'sort',
                'field_value' => array_get($target, 'sort', ''),
                'field_type' => 'text'
            ],
            'mode' => [
                'field_label' => '公開状況',
                'field_name' => 'mode',
                'field_value' => array_get($target, 'mode', ''),
                'field_type' => 'radio',
                'field_option' => $form['mode'],
            ]
        ],
        'form_attribute' => [
            'enctype' => 'multipart/form-data'
        ]
    ];
@endphp
@section('content')
    @include('backend.component.form.form', $form)
@stop
