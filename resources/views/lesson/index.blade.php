@extends('layout.master')
@section('title', 'レッスン一覧 | プログラミングＧＯ')
@section('meta_description', 'レッスン一覧')
@section('breadcrumbs', Breadcrumbs::render('lesson'))

@section('content')
    @push('js')
        <script type="text/javascript" src="/js/lesson/filter.js"></script>
    @endpush

    <div id="content">
        @include('component.lesson.lesson', ['filter_form' => $filter_form, 'lessons' => $lessons])
    </div>
@stop
