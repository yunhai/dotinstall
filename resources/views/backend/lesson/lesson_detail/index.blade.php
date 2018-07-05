@extends('backend.layout.master')
@section('title', 'レッスン詳細')
@section('content')
@section('list_header')
    <div class="col-lg-12">
        <div class="form-group float-right">
            <a class="btn btn-primary btn-sm"
                href="{{ route('backend.lesson_detail.create', ['lesson_id' => $lesson_id]) }}">
                新規
        </a>
        </div>
    </div>
@stop

@php
    $table = [
        'title' => 'レッスン詳細',
        'header' => [
            '動画の題名',
            '表示順序',
            ''
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
                    <a class="btn btn-info btn-sm"
                        href="' . route('backend.lesson_detail.edit', ['lesson_id' => ':lesson_id', 'lesson_detail_id' => ':lesson_detail_id']) . '">
                        編集
                    </a>
                    <a class="btn btn-danger btn-sm"
                        href="' . route('backend.lesson_detail.delete', ['lesson_id' => ':lesson_id', 'lesson_detail_id' => ':lesson_detail_id']) . '"
                        onclick="return confirm(\'削除してよろしいですか？\');">
                        削除
                    </a>
                ',
                'tpl_arg' => [
                    ':lesson_id' => 'lesson_id',
                    ':lesson_detail_id' => 'id',
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
