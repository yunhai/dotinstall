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
                'difficulty' => [
                    'field_label' => 'レベル',
                    'field_name' => 'difficulty',
                    'field_value' => array_get($target, 'difficulty', ''),
                    'field_type' => 'select',
                    'field_option' => $form['difficulty'],
                    'field_attribute' => [
                        'title' => '選択なし'
                    ]
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
            ],
            'form_attribute' => [
            ]
        ];
    @endphp
    @include('backend.component.form.form', $form)
@stop
