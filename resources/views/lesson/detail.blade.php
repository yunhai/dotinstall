@extends('layout.master')
@section('title', $target['name'])
@section('breadcrumbs', Breadcrumbs::render('lesson.detail', $target['name']))
@push('css')
    <link rel="stylesheet" href="/css/lesson/lesson_detail/detail.css">
@endpush

@push('js')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/ace.js'></script>
    <script type="text/javascript" src="/js/ace.js"></script>
@endpush

@section('content')
@php
    $count = 0;
    if (!empty($stat[$target['id']])) {
        $count = number_format($stat[$target['id']]);
    }
@endphp
<div id="content">
    <div class="content box mb-0" @if (count($target['lesson_details']) > 0) style="min-height: auto; !important" @endif>
        <div class="card">
            <div class="lession-heading w-100 px-5">
                <img class="img-fluid" src="/img/light-bulb.png">
                <div class="@pc col-10 @endpc @sp col-7 @endsp pr-0 pad_l5">
                	<span>【{{ $target['ms_categories']['name'] }}】{{ $target['name'] }}@if (!empty($target['video_count'])) (全{{ $target['video_count'] }}回) @endif</span>
                </div>
                <div class="@pc col-2 @endpc @sp col-5 @endsp">
                	<span class="lession-heading-url float-right">{{ $count }} 人が学習中です</span>
                </div>
            </div>
        </div>
        <div class="card card-video-list">
            <div class="container-fluid box-sp px-5">
                @include('component.lesson.item', ['lesson_details' => $target['lesson_details']])
            </div>
        </div>
    </div>
</div>
@stop
