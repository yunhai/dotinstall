@extends('backend.layout.master')
@php
    $target = $target ?? [];
    $form = [
        'form_btn' => '保存',
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

@section('content1')
    @include('backend.component.form.form', $form)
@stop

@section('content')
<div class="container">
    <h2>Example</h2>
    <div class="text-center" >
        <div id="resumable-error" style="display: none">
            Resumable not supported
        </div>
        <div id="resumable-drop" style="display: none">
            <p><button id="resumable-browse" data-url="{{ url('backend/media/chunk') }}" >Upload</button> or drop here
            </p>
            <p>Uses `api/upload` endpoint which uses `browser` data instead of session (session is not inited in api routes). This is automatically detected.</p>
        </div>
        @csrf
        <ul id="file-upload-list" class="list-unstyled"  style="display: none">

        </ul>
        <br/>
    </div>
</div>
@stop