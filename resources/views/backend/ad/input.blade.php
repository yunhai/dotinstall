@extends('backend.layout.master')
@section('title', '広告')
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
        'form_label' => '広告',
        'form_back_url' => route('backend.ad.index'),
        'form_field' => [
            'name' => [
                'field_label' => '広告名',
                'field_name' => 'name',
                'field_value' => array_get($target, 'name', ''),
                'field_type' => 'text'
            ],
            'link' => [
                'field_label' => 'リンク',
                'field_name' => 'link',
                'field_value' => array_get($target, 'link', ''),
                'field_type' => 'textarea'
            ],
            'media_id' => [
                'field_label' => '画像',
                'field_name' => 'media_id',
                'field_value' => array_get($target, 'ad_media', ''),
                'field_type' => 'file_dd',
                'field_attribute' => [
                    'data-url' => route('backend.media.chuck'),
                    'data-download' => 1,
                    'data-query' => '{"media_type": "image", "thumbnail": 0, "width": 480}',
                    'data-type' => 'image',
                    'data-type.url' => false,
                    'data-type.url_label' => 'URL',
                    'data-max_file_upload' => 100,
                    'data-width' => 400,
                ],
                'field_advance' => [
                ],
                'field_intro' => '(サイズ：300x250)'
            ],
            'type' => [
                'field_label' => 'タイプ',
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
            ],
            'login_mode' => [
                'field_label' => 'ログン状況',
                'field_name' => 'login_mode',
                'field_value' => array_get($target, 'login_mode', ''),
                'field_type' => 'radio',
                'field_option' => $form['login_mode'],
            ]
        ],
    ];
@endphp
@section('content')
    @include('backend.component.form.form', $form)
@stop
