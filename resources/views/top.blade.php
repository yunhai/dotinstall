@extends('layout.master')
@section('title', 'プログラミングＧＯ')
@push('css')
    <link rel="stylesheet" href="/css/lesson/lesson_detail/detail.css">
@endpush

@push('js')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/ace.js'></script>
    <script type="text/javascript" src="/js/ace.js"></script>
@endpush
@section('content')
<div class="box box-panel mb-0">
    <div class="card">
        <img class="card-img" src="/img/panel.jpg">
        <div class="card-img-overlay px-5">
            <div class="card-body">
                <h5 class="card-text card-text-header text-center font-weight-bold mb-0">難しい話しは後にして、実戦形式で覚えて行こう！</h5>
                <div class="row">
                    <div class="card-sign col-lg-5 p-0">
                        <p class="card-text card-text-sign">５分動画！小学生から大人まで！</p>
                        <p class="card-text card-text-sign">実戦で覚えるプログラミング！</p>
                        <p class="card-text card-text-sign last mb-0">何も考えずに真似して作って見よう！</p>
                        <a href="{{ route('register') }}" class="btn card-sign-button p-0"><img class="img-fluid" src="/img/btn-register.png"></a>
                    </div>
                    <div class="card-video col-lg-7 d-none d-lg-block pr-0">
                        @if (!empty($youtube_link))
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{ $youtube_link['link'] }}" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="box box-panel">
    <div class="card">
        <img class="card-img" src="/img/panel_language.png">
    </div>
</div>
@foreach ($lessons as $lesson)
    @if (!empty($lesson['lesson_details']))
        <div class="box">
            <div class="card">
                <div class="lession-heading w-100 px-5">
                    <img class="img-fluid" src="/img/light-bulb.png" />
                    <span>【{{ $lesson['ms_categories']['name'] }}】{{ $lesson['name'] }}@if (!empty($lesson['video_count'])) (全{{ $lesson['video_count'] }}回) @endif</span>
                    <a href="{{ route('lesson.detail', ['lesson_id' => $lesson['id']] ) }}" class="lession-heading-url float-right">レッスン一覧</a>
                </div>
            </div>
            <div class="card card-video-list">
                <div class="container-fluid px-5">
                    @include('component.lesson.item', ['lesson_details' => $lesson['lesson_details']])
                </div>
            </div>
        </div>
    @endif
@endforeach
<div class="box">
    <div class="card-lesson-total text-center">
        <p class="card-text">
            <a href="{{ route('lesson') }}">全てのレッスンを見る（{{ $total_lessons }}）</a>
        </p>
    </div>
</div>
@stop
