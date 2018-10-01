@extends('backend.layout.master')
@section('title', 'レッスン一覧')
@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet">
@endpush
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>
    <script src="/js/backend/common/sortable.js"></script>
@endpush
@section('content')
    @section('list_header')
        <div class="row">
            <div class="col-sm-12">
                <div id="dataTable_filter" class="dataTables_filter">
                    <label>
                        <a class="btn btn-primary btn-sm" href="{{ route('backend.lesson.create') }}">新規</a>
                    </label>
                </div>
            </div>
        </div>
    @stop

    @php
        $table = [
            'title' => 'カテゴリー',
            'header' => [
                'レッスン一名',
                '表示状況',
                'カテゴリー',
                '動画',
                '',
            ],
            'body' => [
                'name' => [
                    'field' => '',
                    'tpl' => '<span id="j-title--:id" data-tpl="【:difficulty】【＃<sort>】:name">【:difficulty】【＃:sort】:name</span>',
                    'tpl_arg' => [
                        ':id' => 'id',
                        ':difficulty' => [$form['level'], 'difficulty'],
                        ':sort' => 'sort',
                        ':name' => 'name',
                    ]
                ],
                'mode' => [
                    'field' => 'mode',
                    'option' => $form['mode'],
                    'attr' => [
                        'style' => 'width:10%',
                    ]
                ],
                'category' => [
                    'field' => 'category_id',
                    'option' => $form['category'],
                    'attr' => [
                        'style' => 'width:15%',
                    ]
                ],
                'video_count' => [
                    'field' => 'video_count',
                    'attr' => [
                        'style' => 'width:6%',
                        'class' => 'text-center'
                    ]
                ],
                'button' => [
                    'field' => '',
                    'tpl' => '
                        <a class="btn btn-info btn-sm" href="' . route('backend.lesson_detail.index', ['lesson_id' => ':id']) . '">動画</a>
                        <a class="btn btn-info btn-sm" href="' . route('backend.lesson.edit', ['lesson_id' => ':id']) . '">編集</a>
                        <a href="' . route('backend.lesson.delete', ['lesson_id' => ':id']) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'削除してよろしいですか？\');">削除</a>
                    ',
                    'tpl_arg' => [
                        ':id' => 'id'
                    ],
                    'attr' => [
                        'style' => 'width:20%',
                        'class' => 'text-center'
                    ]
                ]
            ],
        ];
    @endphp
    @include('backend.component.list.sortable', ['table' => $table, 'data' => $lessons])
@stop
