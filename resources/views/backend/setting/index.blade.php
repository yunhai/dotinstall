@extends('backend.layout.master')
@section('title', '設定')
@section('content')
    @section('list_header')
        <div class="row hidden">
            <div class="col-sm-12">
                <div id="dataTable_filter" class="dataTables_filter">
                    <label>
                        <a class="btn btn-primary btn-sm" href="{{ route('backend.setting.create') }}">新規</a>
                    </label>
                </div>
            </div>
        </div>
    @stop

    @php
        $table = [
            'title' => '設定',
            'header' => [
                '設定名',
                '設定値',
                '',
            ],
            'body' => [
                'key' => [
                    'field' => 'key',
                ],
                'value' => [
                    'field' => 'value',
                ],
                'button' => [
                    'field' => '',
                    'tpl' => '
                        <a class="btn btn-info btn-sm" href="' . route('backend.setting.edit', ['setting_id' => ':id']) . '">編集</a>
                        <a href="' . route('backend.setting.delete', ['setting_id' => ':id']) . '" class="btn btn-danger btn-sm hidden" onclick="return confirm(\'削除してよろしいですか？\');">削除</a>
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
