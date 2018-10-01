@extends('backend.layout.master')
@section('title', 'カテゴリー編集')
@push('js')
    <script src="/js/backend/common/upload.js"></script>
    <script src="/js/backend/spark-md5.min.js"></script>
@endpush
@push('css')
    <link href="/css/backend/upload/chunk.css" rel="stylesheet">
@endpush
@php

    $target = $target ?? [];
    $form = [
        'form_btn' => '保存',
        'form_label' => 'カテゴリー',
        'form_back_url' => route('backend.ms_category.index'),
        'form_field' => [
            'ms_category_id' => [
                'field_label' => 'カテゴリー名',
                'field_name' => 'ms_category_id',
                'field_value' => array_get($target, 'ms_category_id', ''),
                'field_type' => 'select',
                'field_option' => $form['ms_category'],
                'field_attribute' => [
                    'title' => '選択なし'
                ]
            ],
            'level' => [
                'field_label' => 'レベル',
                'field_name' => 'level',
                'field_value' => array_get($target, 'level', ''),
                'field_type' => 'select',
                'field_option' => $form['level'],
                'field_attribute' => [
                    'title' => '選択なし'
                ]
            ],
            'caption' => [
                'field_label' => 'このカテゴリについて',
                'field_name' => 'caption',
                'field_value' => array_get($target, 'caption', ''),
                'field_type' => 'text'
            ],
            'media_id' => [
                'field_label' => '画像',
                'field_name' => 'media_id',
                'field_value' => array_get($target, 'media', ''),
                'field_type' => 'file_dd',
                'field_attribute' => [
                    'data-url' => route('backend.media.chuck'),
                    'data-download' => 1,
                    'data-query' => '{"media_type": "image", "thumbnail": 0, "width": 110}',
                    'data-type' => 'image',
                    'data-type.url' => false,
                    'data-type.url_label' => 'URL',
                    'data-max_file_upload' => 1,
                    'data-width' => 110,
                ],
                'field_advance' => [
                ],
                'field_intro' => '(サイズ：460x110)'
            ],
        ],
        'form_attribute' => [
        ]
    ];
@endphp
@section('content')
    @include('backend.component.form.form', $form)
@stop
