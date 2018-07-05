@extends('backend.layout.master')
@section('title', 'カテゴリー')
@section('content')
    @section('list_header')
        <div class="col-lg-12">
            <div class="form-group float-right">
                <a class="btn btn-primary btn-sm" href="{{ route('backend.ms_category.create') }}">新規</a>
            </div>
        </div>
    @stop

    @php
        $table = [
            'title' => 'カテゴリー',
            'header' => [
                'カテゴリー名',
                '表示順序',
                '',
            ],
            'body' => [
                'name' => [
                    'field' => 'name',
                ],
                'sort' => [
                    'field' => 'sort',
                    'attr' => [
                        'style' => 'width:10%',
                        'class' => 'text-center'
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
