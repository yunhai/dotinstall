@extends('backend.layout.master')
@php
    $target = $target ?? [];
    $fields = [
        'name' => [
            'field_label' => 'カテゴリー名',
            'field_name' => 'name',
            'field_value' => array_get($target, 'name', ''),
            'field_type' => 'text'
        ],
        'sort' => [
            'field_label' => '表示順序',
            'field_name' => 'sort',
            'field_value' => array_get($target, 'sort', ''),
            'field_type' => 'text'
        ],
    ];
@endphp
@section('content')
    <div class="card">
        <div class="card-header"><i class="fa fa-edit"></i> カテゴリー</div>
        <div class="card-body">
            <form method="post">
                @csrf

                <table class="table table-bordered">
                    <tbody>
                        @foreach ($fields as $field)
                            @include('backend.component.form.'.$field['field_type'], $field)
                        @endforeach
                    </tbody>
                </table>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary btn-sm" value="更新">
                </div>
            </form>
        </div>
    </div>
@stop
