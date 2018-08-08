@extends('backend.layout.master')
@section('title', 'アフィリエイターユーザー一覧')
@section('content')
    @section('list_header')
        @include('backend.component.filter.date', ['year' => $form['year'], 'month' => $form['month']])
    @stop
    @php
        $table = [
            'title' => 'アフィリエイターユーザー一覧',
            'header' => [
                'ユーザーメール',
                '登録日',
                '料金',
                '料金率',
                '利益',
            ],
            'body' => [
                'user_id' => [
                    'field' => '',
                    'apply' => ['array_get', $form['user_email'], 'apply_value'],
                    'apply_value' => 'user_id'
                ],
                'join_date' => [
                    'field' => 'join_date'
                ],
                'affiliator_commission_base' => [
                    'field' => 'affiliator_commission_base'
                ],
                'affiliator_commission_rate' => [
                    'field' => 'affiliator_commission_rate'
                ],
                'affiliator_commission' => [
                    'field' => 'affiliator_commission'
                ]
            ],
        ];
    @endphp
    @include('backend.component.list.index', ['table' => $table, 'data' => $data])
@stop
