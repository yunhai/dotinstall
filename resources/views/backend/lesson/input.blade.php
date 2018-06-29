@extends('backend.layout.master')

@section('content')
    @push('css')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    @endpush
    @push('js')
        <script src="/vendor/backend/summernote/summernote-bs4.js"></script>
        <script src="/vendor/backend/summernote/lang/summernote-ja-JP.js"></script>
        <script src="/js/backend/editor/summernote.js"></script>
    @endpush

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
                /*'image' => [
                    'field_label' => 'Image',
                    'field_name' => 'image',
                    'field_value' => array_get($target, 'image', ''),
                    'field_type' => 'file'
                ],
                */
            ],
            'form_attribute' => [
                'enctype' => 'multipart/form-data'
            ]
        ];
    @endphp
    @include('backend.component.form.form', $form)
@stop
