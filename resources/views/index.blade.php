@extends('layout.master')
@section('title', 'プログラミングＧＯ')
@section('content')
<div class="box mb-0">
    <div class="card">
        <img class="card-img" src="/img/panel.jpg">
        <div class="card-img-overlay">
            <h5 class="card-title card-title-header text-center font-weight-bold">難しい話しは後にして、実戦形式で覚えて行こう！</h5>
            <div class="card-body">
                <div class="row">
                    <div class="card-sign col-lg-5">
                        <p class="card-text card-text-sign">５分動画！小学生から大人まで！</p>
                        <p class="card-text card-text-sign">実戦で覚えるプログラミング！</p>
                        <p class="card-text card-text-sign last">何も考えずに真似して作って見よう！</p>
                        <a href="/" class="btn btn-primary btn-lg card-sign-button">新規登録で５個動画無料！</a>
                    </div>
                    <div class="card-video col-lg-7 d-none d-lg-block">
                        <iframe width="100%" height="315"src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="box">
    <div class="card">
        <img class="card-img" src="/img/panel_language.png">
    </div>
</div>
@foreach ($lessons as $lesson)
<div class="box">
    <div class="card">
        <div class="lession-heading w-100">
            <img class="img-fluid" src="/img/light-bulb.png"><span>【{{ $lesson['ms_categories']['name'] ?? '' }}】{{ $lesson['name'] }}</span>
            <a href="{{ route('lesson') }}" class="lession-heading-url float-right">レッスン一覧</a>
        </div>
    </div>
    <div class="card card-video-list">
        <div class="container-fluid">
            @include('component.list.list', ['lesson_details' => $lesson['lesson_details']])
        </div>
    </div>
</div>
@endforeach
<div class="box">
    <div class="card-lesson-total text-center">
        <p class="card-text">
            <a href="#" class="btn btn-sm btn-request">全てのレッスンを見る（５０）</a>
        </p>
    </div>
</div>
@stop
