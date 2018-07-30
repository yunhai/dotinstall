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
                'member_email' => [
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
    @include('backend.component.list.paging', ['table' => $table, 'data' => $data])
@stop
