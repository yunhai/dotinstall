@extends('client.layout.master')
@section('title', '利益一覧')
@section('content')
    @section('list_header')
        @include('client.component.filter.date', ['year' => $form['year'], 'month' => $form['month']])
    @stop
    @php
        $table = [
            'title' => '利益一覧',
            'header' => [
                '日付',
                'ユーザー',
                '利益',
            ],
            'body' => [
                'target_date' => [
                    'field' => 'target_date'
                ],
                'invitation' => [
                    'field' => 'invitation',
                ],
                'commission' => [
                    'field' => 'commission'
                ]
            ],
        ];
    @endphp
    @include('client.component.list.paging', ['table' => $table, 'data' => $data])
@stop
