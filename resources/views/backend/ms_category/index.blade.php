@extends('backend.layout.master')
@section('title', 'カテゴリー')
@section('content')
    @section('list_header')
        <div class="row">
            <div class="col-sm-12">
                <div id="dataTable_filter" class="dataTables_filter">
                    <label>
                        <a class="btn btn-primary btn-sm" href="{{ route('backend.ms_category.create') }}">新規</a>
                    </label>
                </div>
            </div>
        </div>
    @stop

    @php
        $table = [
            'title' => 'カテゴリー',
            'header' => [
                'カテゴリー名',
                'レベル',
                'カテゴリについて',
                '',
            ],
            'body' => [
                'name' => [
                    'field' => 'name',
                ],
                'level' => [
                    'field' => 'level',
                    'option' => $form['level'],
                ],
                'caption' => [
                    'field' => 'caption',
                    'attr' => [
                        'style' => 'width:40%',
                    ]
                ],
                'button' => [
                    'field' => '',
                    'tpl' => '
                        <a class="btn btn-info btn-sm" href="' . route('backend.ms_category.edit', ['ms_category_id' => ':id']) . '">編集</a>
                        <a href="' . route('backend.ms_category.delete', ['ms_category_id' => ':id']) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'削除してよろしいですか？\');">削除</a>
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
    @include('backend.component.list.paging', ['table' => $table, 'data' => $ms_categories])
@stop
