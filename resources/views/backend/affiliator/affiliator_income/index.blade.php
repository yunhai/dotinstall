@extends('backend.layout.master')
@section('title', 'アフィリエイター利益一覧')
@section('content')
    @section('list_header')
        @include('backend.component.filter.date', ['year' => $form['year'], 'month' => $form['month']])
    @stop
    @php
        $table = [
            'title' => 'アフィリエイター利益一覧',
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
    @include('backend.component.list.index', ['table' => $table, 'data' => $data])
@stop
