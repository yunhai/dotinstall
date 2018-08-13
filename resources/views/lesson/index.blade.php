@extends('layout.master')
@section('title', 'レッスン一覧')
@section('content')
@section('breadcrumbs', Breadcrumbs::render('lesson'))
<div id="content">
	<!--
    <div class="box mb-0" style="border-top: 1px solid #bca9af;">
        <div class="card">
            <div class="lession-nar w-100 px-5"><span>簡単な実戦でプログラムを覚えよう！</span></div>
        </div>
    </div>
	-->
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
