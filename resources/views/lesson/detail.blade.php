@extends('layout.master')
@section('title', $target['name'])
@section('content')
@section('breadcrumbs', Breadcrumbs::render('lesson.detail', $target['name']))
@php
    $count = 0;
    if (!empty($stat[$target['id']])) {
        $count = number_format($stat[$target['id']]);
    }
@endphp
<div id="content">
    <div class="box">
        <div class="card">
            <div class="lession-heading w-100">
                <img class="img-fluid" src="/img/light-bulb.png">
                <span>【{{ $target['ms_categories']['name'] }}】{{ $target['name'] }}</span>
                <span class="lession-heading-url float-right">{{ $count }} 人が学習中です</span>
            </div>
        </div>
        <div class="card card-video-list">
            <div class="container-fluid">
                @include('component.lesson.item', ['lesson_details' => $target['lesson_details']])
            </div>
        </div>
    </div>
</div>
@stop
