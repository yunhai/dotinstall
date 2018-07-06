@extends('backend.layout.master')
@section('title', 'Youtubeリンク編集')
@php
    $target = $target ?? [];

    $form = [
        'form_btn' => '保存',
        'form_label' => 'Youtubeリンク',
        'form_back_url' => route('backend.youtube_link.index'),
        'form_field' => [
            'name' => [
                'field_label' => 'Video名',
                'field_name' => 'name',
                'field_value' => array_get($target, 'name', ''),
                'field_type' => 'text'
            ],
            'link' => [
                'field_label' => 'URL',
                'field_name' => 'link',
                'field_value' => array_get($target, 'link', ''),
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
    ];
@endphp
@section('content')
    @include('backend.component.form.form', $form)
@stop
