@extends('backend.layout.master')
@section('title', 'Youtubeリンク')
@section('content')
    @section('list_header')
        <div class="col-lg-12">
            <div class="form-group float-right">
                <a class="btn btn-primary btn-sm" href="{{ route('backend.youtube_link.create') }}">新規</a>
            </div>
        </div>
    @stop

    @php
        $table = [
            'title' => 'Youtubeリンク',
            'header' => [
                'Video名',
                'URL',
                '公開状況',
                '',
            ],
            'body' => [
                'name' => [
                    'field' => 'name',
                ],
                'link' => [
                    'field' => 'link',
                    'tpl' => '
                        <a href=":link" target="_blank">:link</a>
                    ',
                    'tpl_arg' => [
                        ':link' => 'link'
                    ],
                    'attr' => [
                        'style' => 'width:40%',
                    ]
                ],
                'mode' => [
                    'field' => 'mode',
                    'option' => $form['mode'],
                    'attr' => [
                        'style' => 'width:10%',
                        'class' => 'text-center'
                    ]
                ],
                'button' => [
                    'field' => '',
                    'tpl' => '
                        <a class="btn btn-info btn-sm" href="' . route('backend.youtube_link.edit', ['youtube_link_id' => ':id']) . '">編集</a>
                        <a href="' . route('backend.youtube_link.delete', ['youtube_link_id' => ':id']) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'削除してよろしいですか？\');">削除</a>
                    ',
                    'tpl_arg' => [
                        ':id' => 'id'
                    ],
                    'attr' => [
                        'style' => 'width:15%',
                        'class' => 'text-center'
                    ]
                ]
            ],
        ];
    @endphp
    @include('backend.component.list.paging', ['table' => $table, 'data' => $data])
@stop
