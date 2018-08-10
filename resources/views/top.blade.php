@extends('layout.master')
@section('title', 'プログラミングＧＯ')
@push('css')
    <link rel="stylesheet" href="/css/lesson/lesson_detail/detail.css">
@endpush

@push('js')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/ace.js'></script>
    <script type="text/javascript" src="/js/ace.js"></script>
    <script type="text/javascript" src="/js/lesson/lesson_detail/lesson_detail.js"></script>
@endpush
@section('content')
@normal_user
	@include('component.top.panel', ['youtube_link' => $youtube_link])
@endnormal_user
@if (Auth::check() == false)
	@include('component.top.panel', ['youtube_link' => $youtube_link])
	@include('component.top.video', ['filter_form' => $filter_form, 'lessons' => $lessons])
@else
	@include('component.top.lesson', ['lessons' => $lessons])
@endif
<div class="box mb-0">
    <div class="card-lesson-total text-center">
        <p class="card-text">
            <a href="{{ route('lesson') }}">全てのレッスンを見る（{{ $global_total_lessons }}）</a>
        </p>
    </div>
</div>
@stop