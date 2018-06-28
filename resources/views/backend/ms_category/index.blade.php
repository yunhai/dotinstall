@extends('backend.layout.master')
@section('title', 'カテゴリー')
@section('content')
    @section('list_header')
        <div class="col-lg-12">
            <div class="form-group float-right">
                <a class="btn btn-primary btn-sm" href="/backend/ms_category/create">新規</a>
            </div>
        </div>
    @stop

    @php
        $table = [
            'title' => 'カテゴリー',
            'header' => [
                'ID',
                'カテゴリー名',
                '表示順序',
                '',
            ],
            'body' => [
                'id' => [
                    'field' => 'id',
                    'attr' => [
                        'style' => 'width:5%',
                    ]
                ],
                'name' => [
                    'field' => 'name',
                    'attr' => [
                        'style' => 'width:25%',
                    ]
                ],
                'sort' => [
                    'field' => 'sort',
                ],
                'button' => [
                    'field' => '',
                    'tpl' => '
                        <a class="btn btn-info btn-sm" href="/backend/ms_category/:id/edit">編集</a>
                        <a href="/backend/ms_category/:id/delete" class="btn btn-danger btn-sm" onclick="return confirm(\'削除してよろしいですか？\');">削除</a>
                    ',
                    'tpl_arg' => [
                        ':id' => 'id'
                    ],
                    'attr' => [
                        'style' => 'width:25%',
                        'class' => 'text-center'
                    ]
                ]
            ],
        ];
    @endphp
    @include('backend.component.list.paging', ['table' => $table, 'data' => $ms_categories])
@stop
