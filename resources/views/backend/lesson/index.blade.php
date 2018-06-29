@extends('backend.layout.master')
@section('title', 'レッスン一覧')
@section('content')
@section('list_header')
    <div class="col-lg-12">
        <div class="form-group float-right">
            <a class="btn btn-primary btn-sm" href="/backend/lesson/create">新規</a>
        </div>
    </div>
@stop

@php
    $table = [
        'title' => 'カテゴリー',
        'header' => [
            'レッスン一名',
            '',
        ],
        'body' => [
            'name' => [
                'field' => 'name',
            ],
            'button' => [
                'field' => '',
                'tpl' => '
                    <a class="btn btn-info btn-sm" href="/backend/lesson/:id/edit">編集</a>
                    <a class="btn btn-info btn-sm" href="/backend/lesson/:id/detail">閲覧</a>
                    <a href="/backend/lesson/:id/delete" class="btn btn-danger btn-sm" onclick="return confirm(\'削除してよろしいですか？\');">削除</a>
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
@include('backend.component.list.paging', ['table' => $table, 'data' => $lessons])
@stop
