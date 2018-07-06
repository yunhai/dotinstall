@extends('backend.layout.master')
@section('content')
    @push('css')
        <link href="/vendor/backend/summernote/summernote-bs4.css" rel="stylesheet">
        <link href="/css/backend/upload/chunk.css" rel="stylesheet">
    @endpush
    @push('js')
        <script src="/vendor/backend/summernote/summernote-bs4.js"></script>
        <script src="/vendor/backend/summernote/lang/summernote-ja-JP.js"></script>
        <script src="/js/backend/editor/summernote.js"></script>
        <script src="/js/backend/common/upload.js"></script>
    @endpush
    @php
        $target = $target ?? [];
        $form = [
            'form_btn' => '保存',
            'form_label' => '動画',
            'form_back_url' => route('backend.lesson_detail.index', ['lesson_id' => $lesson_id]),
            'form_field' => [
                'name' => [
                    'field_label' => '動画の題名',
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
                'mode' => [
                    'field_label' => '公開状況',
                    'field_name' => 'mode',
                    'field_value' => array_get($target, 'mode', ''),
                    'field_type' => 'radio',
                    'field_option' => $form['mode'],
                ],
                'free_mode' => [
                    'field_label' => '無料状況',
                    'field_name' => 'free_mode',
                    'field_value' => array_get($target, 'free_mode', ''),
                    'field_type' => 'radio',
                    'field_option' => $form['free_mode'],
                ],
                'sort' => [
                    'field_label' => '表示順序',
                    'field_name' => 'sort',
                    'field_value' => array_get($target, 'sort', ''),
                    'field_type' => 'text'
                ],
                'video' => [
                    'field_label' => '動画',
                    'field_name' => 'video',
                    'field_value' => array_get($target, 'videos', ''),
                    'field_type' => 'file_dd',
                    'field_attribute' => [
                        'data-url' => '/backend/media/chunk/',
                        'data-preview' => 1,
                        'data-query' => '{"media_type": "video"}',
                        'data-type' => 'video',
                        'data-max_file_upload' => 1
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
                'source_code' => [
                    'field_label' => 'ソースコード',
                    'field_name' => 'source_code',
                    'field_value' => array_get($target, 'source_codes', ''),
                    'field_type' => 'file_dd_multiple',
                    'field_attribute' => [
                        'data-url' => '/backend/media/chunk/',
                        'data-download' => 1,
                        'data-query' => '{"media_type": "document"}',
                        'data-type' => 'document',
                        'data-max_file_upload' => 10
                    ]
                ],
                'resource' => [
                    'field_label' => 'Resource',
                    'field_name' => 'resource',
                    'field_value' => array_get($target, 'resources', ''),
                    'field_type' => 'file_dd_multiple',
                    'field_attribute' => [
                        'data-url' => '/backend/media/chunk/',
                        'data-download' => 1,
                        'data-query' => '{"media_type": "document"}',
                        'data-type' => 'document',
                        'data-max_file_upload' => 10
                    ]
                ],
            ],
            'form_attribute' => [
            ]
        ];
    @endphp

    @include('backend.component.form.form', $form)
@stop

@section('content1')
<div class="container">
    <h2>Example</h2>
    <div class="text-center" >
        <div id="resumable-drop">
            <button id="resumable-browse" data-url="{{ url('backend/media/chunk') }}" >Upload</button> or drop here
        </div>
        @csrf
        <br/>
    </div>
</div>
@stop