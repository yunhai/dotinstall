@extends('backend.layout.master')
@section('title', 'レッスン編集')
@section('content')
    @push('css')
        <link href="/vendor/backend/summernote/summernote-bs4.css" rel="stylesheet">
        <link href="/css/backend/upload/chunk.css" rel="stylesheet">
        <link href="/vendor/backend/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
    @endpush

    @push('js')
        <script src="/vendor/backend/summernote/summernote-bs4.js"></script>
        <script src="/vendor/backend/summernote/lang/summernote-ja-JP.js"></script>
        <script src="/js/backend/editor/summernote.js"></script>
        <script src="/vendor/backend/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="/js/backend/common/upload.js"></script>
        <script src="/js/backend/common/select.js"></script>
    @endpush

    @php
        $target = $target ?? [];
        $form = [
            'form_action' => '',
            'form_btn' => '保存',
            'form_label' => 'レッスン一編集',
            'form_back_url' => route('backend.lesson.index'),
            'form_field' => [
                'name' => [
                    'field_label' => 'レッスン一名',
                    'field_name' => 'name',
                    'field_value' => array_get($target, 'name', ''),
                    'field_type' => 'text'
                ],
                'caption' => [
                    'field_label' => 'Caption',
                    'field_name' => 'caption',
                    'field_value' => array_get($target, 'caption', ''),
                    'field_type' => 'editor'
                ],
                'note' => [
                    'field_label' => 'Note',
                    'field_name' => 'note',
                    'field_value' => array_get($target, 'note', ''),
                    'field_type' => 'editor'
                ],
                'mode' => [
                    'field_label' => '公開状況',
                    'field_name' => 'mode',
                    'field_value' => array_get($target, 'mode', ''),
                    'field_type' => 'radio',
                    'field_option' => $form['mode'],
                ],
                'category_id' => [
                    'field_label' => 'カテゴリー',
                    'field_name' => 'category_id',
                    'field_value' => array_get($target, 'category_id', ''),
                    'field_type' => 'select',
                    'field_option' => $form['category'],
                    'field_attribute' => [
                        'title' => '選択なし'
                    ]
                ],
                'poster' => [
                    'field_label' => 'サムネイル',
                    'field_name' => 'poster',
                    'field_value' => array_get($target, 'posters', ''),
                    'field_type' => 'file_dd',
                    'field_attribute' => [
                        'data-url' => '/backend/media/chunk/',
                        'data-preview' => 1,
                        'data-query' => '{"media_type": "image"}',
                        'data-type' => 'image',
                        'data-max_file_upload' => 1
                    ]
                ],
            ],
            'form_attribute' => [
            ]
        ];
    @endphp
    @include('backend.component.form.form', $form)
@stop
