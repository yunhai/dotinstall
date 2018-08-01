@extends('client.layout.master')
@section('title', 'アフィリエイター一覧')
@section('content')
    @section('list_header')
    @stop
    @php
        $table = [
            'title' => 'アフィリエイター',
            'header' => [
                'member email',
                'Join date',
                'Member fee',
                '手数料率',
                '手数料',
            ],
            'body' => [
                'ユーザー名' => [
                    'field' => '',
                    'apply' => ['array_get', $form['user_email'], 'apply_value'],
                    'apply_value' => 'user_id'
                ],
                '登録日' => [
                    'field' => 'join_date'
                ],
                '料金' => [
                    'field' => 'affiliator_commission_base'
                ],
                '料金率' => [
                    'field' => 'affiliator_commission_rate'
                ],
                '利益' => [
                    'field' => 'affiliator_commission'
                ]
            ],
        ];
    @endphp
    @include('backend.component.list.paging', ['table' => $table, 'data' => $data])
@stop
