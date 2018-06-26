@extends('backend.layout.master')
@php
    $target = $target ?? [];
    $form = [
        'form_btn' => '更新',
        'form_label' => 'lesson_media',
        'form_field' => [
            'name' => [
                'field_label' => 'lesson_media名 ',
                'field_name' => 'name',
                'field_value' => array_get($target, 'name', ''),
                'field_type' => 'text'
            ],
        ],
        'form_attribute' => [
            'enctype' => 'multipart/form-data'
        ]
    ];
@endphp
@section('content')
    @include('backend.component.form.form', $form)
@stop
