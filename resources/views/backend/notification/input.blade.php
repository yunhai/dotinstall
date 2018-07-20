@extends('backend.layout.master')
@section('title', '通知編集')
@php
    $target = $target ?? [];
    $form = [
        'form_btn' => '保存',
        'form_label' => '通知',
        'form_back_url' => route('backend.notification.index'),
        'form_field' => [
            'title' => [
                'field_label' => '題名',
                'field_name' => 'title',
                'field_value' => array_get($target, 'title', ''),
                'field_type' => 'text'
            ],
            'content' => [
                'field_label' => '内容',
                'field_name' => 'content',
                'field_value' => array_get($target, 'content', ''),
                'field_type' => 'textarea'
            ],
        ],
        'form_attribute' => [
        ]
    ];
@endphp
@section('content')
    @include('backend.component.form.form', $form)
@stop
