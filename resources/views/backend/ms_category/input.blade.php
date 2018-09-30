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
/*
category  name          level          image                      caption
          swift入門     小学生コース      pink.jpg              swiftを基礎からマスターしよう！子供～大人の方
          swift入門     初級コース        blue.jpg              覚えるまで何度もコードを書いてみよう
          swift入門     中級コース        green.jpg             コードを書くのが一番近道！頑張ろう！
          swift入門     上級コース        orange.jpg            解らなことはGoogleで検索してみよう！
  */
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
