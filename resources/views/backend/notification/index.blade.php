@extends('backend.layout.master')
@section('title', '通知')
@section('content')
    @section('list_header')
        <div class="row">
            <div class="col-sm-12">
                <div id="dataTable_filter" class="dataTables_filter">
                    <label>
                        <a class="btn btn-primary btn-sm" href="{{ route('backend.notification.create') }}">新規</a>
                    </label>
                </div>
            </div>
        </div>
    @stop

    @php
        $table = [
            'title' => '通知',
            'header' => [
                '題名',
                '内容',
                '作成日',
                ''
            ],
            'body' => [
                'title' => [
                    'field' => 'title',
                    'attr' => [
                        'style' => 'width:25%',
                    ]
                ],
                'name' => [
                    'field' => '',
                    'apply' => ['nl2br', 'content']
                ],
                'post_date' => [
                    'field' => 'post_date',
                ],
                'button' => [
                    'field' => '',
                    'tpl' => '
                        <a class="btn btn-info btn-sm" href="' . route('backend.notification.edit', ['notification_id' => ':id']) . '">編集</a>
                        <a href="' . route('backend.notification.delete', ['notification_id' => ':id']) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'削除してよろしいですか？\');">削除</a>
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
