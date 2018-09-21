@extends('backend.layout.master')
@section('title', '広告')
@section('content')
    @section('list_header')
        <div class="row">
            <div class="col-sm-12">
                <div id="dataTable_filter" class="dataTables_filter">
                    <label>
                        <a class="btn btn-primary btn-sm" href="{{ route('backend.ad.create') }}">新規</a>
                    </label>
                </div>
            </div>
        </div>
    @stop

    @php
        $table = [
            'title' => '広告',
            'header' => [
                '広告名',
                'タイプ',
                '公開状況',
                '',
            ],
            'body' => [
                'name' => [
                    'field' => 'name',
                ],
                'type' => [
                    'field' => 'type',
                    'option' => $form['type'],
                    'attr' => [
                        'style' => 'width:10%',
                        'class' => 'text-center'
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
                        <a class="btn btn-info btn-sm" href="' . route('backend.ad.edit', ['ad_id' => ':id']) . '">編集</a>
                        <a href="' . route('backend.ad.delete', ['ad_id' => ':id']) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'削除してよろしいですか？\');">削除</a>
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
