@extends('backend.layout.master')
@section('title', 'レッスン詳細')
@section('content')
    @section('list_header')
        <div class="row">
            <div class="col-sm-12">
                <div id="dataTable_filter" class="dataTables_filter">
                    <label>
                        <a class="btn btn-primary btn-sm" href="{{ route('backend.lesson_detail.create', ['lesson_id' => $lesson_id]) }}">新規</a>
                    </label>
                </div>
            </div>
        </div>
    @stop

    @php
        $table = [
            'title' => 'レッスン詳細',
            'header' => [
                '題名',
                '表示順序',
                '無料状況',
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
                'free_mode' => [
                    'field' => 'free_mode',
                    'option' => $form['free_mode'],
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
