@extends('layout.master')
@section('title', 'レッスン一覧')
@section('content')
@section('breadcrumbs', Breadcrumbs::render('lesson'))

@push('js')
    <script type="text/javascript" src="/js/lesson/filter.js"></script>
@endpush

<div id="content">
    @include('component.lesson.lesson', ['filter_form' => $filter_form, 'lessons' => $lessons])
</div>
<div class="box mb-0">
    <div class="card-lesson-total text-center">
        <p class="card-text">
            <a href="{{ route('lesson') }}">全てのレッスンを見る（{{ $global_total_lessons }}）</a>
        </p>
    </div>
</div>
@stop
