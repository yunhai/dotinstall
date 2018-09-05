@extends('backend.layout.master')
@section('title', 'Youtubeリンク編集')
@push('js')
    <script src="/js/backend/youtube.js"></script>
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
            'youtube_id' => [
                'field_label' => '',
                'field_name' => 'youtube_id',
                'field_value' => array_get($target, 'youtube_id', ''),
                'field_type' => 'hidden'
            ],
            'media_id' => [
                'field_label' => '画像',
                'field_name' => 'media_id',
                'field_value' => array_get($target, 'media', ''),
                'field_type' => 'file_dd',
                'field_attribute' => [
                    'data-url' => route('backend.media.chuck'),
                    'data-download' => 1,
                    'data-query' => '{"media_type": "image", "thumbnail": 0, "width": 480}',
                    'data-type' => 'image',
                    'data-max_file_upload' => 1,
                    'data-width' => 400,
                ],
                'field_advance' => [
                ],
                'field_intro' => '(width: 480px, height: 240px)'
            ],
            'type' => [
                'field_label' => 'Display',
                'field_name' => 'type',
                'field_value' => array_get($target, 'type', ''),
                'field_type' => 'radio',
                'field_option' => $form['type'],
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
