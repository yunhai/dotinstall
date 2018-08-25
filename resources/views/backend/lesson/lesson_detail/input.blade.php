@extends('backend.layout.master')
@section('title', 'レッスン詳細編集')
@push('css')
    <link href="/vendor/backend/summernote/summernote-bs4.css" rel="stylesheet">
    <link href="/css/backend/upload/chunk.css" rel="stylesheet">
    <link href="/css/backend/lesson/lesson_detail/input.css" rel="stylesheet">
    <link href="/vendor/backend/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
@endpush
@push('js')
    <script src="/vendor/backend/summernote/summernote-bs4.js"></script>
    <script src="/vendor/backend/summernote/lang/summernote-ja-JP.js"></script>
    <script src="/js/backend/editor/summernote.js"></script>
    <script src="/js/backend/common/upload.js"></script>
    <script src="/js/backend/spark-md5.min.js"></script>
    <script src="/vendor/backend/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="/js/backend/common/select.js"></script>
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script>
    function vimeo(id) {
        const option = {
            title: 0,
            portrait: 0,
            byline: 0,
        }
        const player = new Vimeo.Player(id, option);

        player.getDuration().then(function(duration) {
            const html = `<input type='hidden' name='duration' value='${duration}' />`;
            $('.j-vimeoContainer').append(html);
        });
    }

    $('#url').change((e) => {
        var date = new Date;
        var seconds = date.getSeconds();
        var minutes = date.getMinutes();
        var hour = date.getHours();

        const id = `${hour}${minutes}${seconds}`;
        const $target = $(e.target);
        const vimeo_path = $target.val();
        
        if (vimeo_path) {
            const html = `
                <div data-vimeo-url="${vimeo_path}" 
                    data-vimeo-title="false"
                    data-vimeo-portrait="false"
                    data-vimeo-byline="false"
                    data-vimeo-width="640" id="${id}">
                </div>
            `;
            $('.j-vimeoContainer').html(html);
            vimeo(id);
        } else {
            $('.j-vimeoContainer').html('');
        }
    })
    </script>
@endpush
@section('content')
    <div class='hidden' id='j-template'>
        <select class='language_holder j-template_language'>@foreach($form['language'] as $id => $lang)<option value='{{ $id }}'>{{ $lang }}</option>@endforeach</select>
    </div>
    @php
        $target = $target ?? [];
        print_r("<pre>");
        print_r(Session::all('test'));
        print_r("</pre>");
        $form = [
            'form_btn' => '保存',
            'form_label' => '動画',
            'form_back_url' => route('backend.lesson_detail.index', ['lesson_id' => $lesson_id]),
            'form_field' => [
                'name' => [
                    'field_label' => '題名',
                    'field_name' => 'name',
                    'field_value' => array_get($target, 'name', ''),
                    'field_type' => 'text',
                    'field_attribute' => [
                      'id' => 'lesson_detail-name'
                    ]
                ],
                'caption' => [
                    'field_label' => 'この動画について',
                    'field_name' => 'caption',
                    'field_value' => array_get($target, 'caption', ''),
                    'field_type' => 'textarea'
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
                'url' => [
                    'field_label' => '動画',
                    'field_name' => 'url',
                    'field_value' => array_get($target, 'url', ''),
                    'field_type' => 'vimeo',
                    'field_attribute' => [
                        'data-video_duration' => @old('duration', array_get($target, 'duration', 0))
                    ]
                ],
                'poster' => [
                    'field_label' => 'サムネイル',
                    'field_name' => 'poster',
                    'field_value' => array_get($target, 'posters', ''),
                    'field_advance' => [
                        'languages' => $form['language']
                    ],
                    'field_type' => 'file_dd',
                    'field_class' => 'j-poster',
                    'field_attribute' => [
                        'data-url' => route('backend.media.chuck'),
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
                    'field_advance' => [
                        'languages' => $form['language'],
                        'source_code_content' => $source_code_content ?? []
                    ],
                    'field_attribute' => [
                        'data-url' => route('backend.media.chuck'),
                        'data-download' => 1,
                        'data-query' => '{"media_type": "document"}',
                        'data-type' => 'msword',
                        'data-max_file_upload' => 10
                    ]
                ],
                'resource' => [
                    'field_label' => '素材',
                    'field_name' => 'resource',
                    'field_value' => array_get($target, 'resources', ''),
                    'field_type' => 'file_dd_multiple',
                    'field_attribute' => [
                        'data-url' => route('backend.media.chuck'),
                        'data-download' => 1,
                        'data-query' => '{"media_type": "image"}',
                        'data-type' => 'image',
                        'data-max_file_upload' => 10,
                        'data-width' => 200,
                    ],
                    'field_advance' => [
                    ],
                ],
            ],
            'form_attribute' => [
            ]
        ];
    @endphp

    @include('backend.component.form.form', $form)
@stop
