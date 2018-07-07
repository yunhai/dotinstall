@extends('layout.master')
@section('title', $lessons['name'])
@section('content')
@section('breadcrumbs', Breadcrumbs::render('lesson.detail', $lessons['name']))
<div id="content">
    <div class="box">
        <div class="card">
            <div class="lession-heading w-100">
                <img class="img-fluid" src="/img/light-bulb.png"><span>【{{ $lessons['ms_categories']['name'] }}】{{ $lessons['name'] }}</span>
                <span class="lession-heading-url float-right">28,643 人が学習中です</span>
            </div>
        </div>
        <div class="card card-video-list">
            <div class="container-fluid">
                @include('component.lesson.item', ['lesson_details' => $lessons['lesson_details']])
            </div>
        </div>
    </div>
</div>
@stop
