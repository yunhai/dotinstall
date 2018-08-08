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
<div class="box box-panel mar_b10">
    <div class="card">
        <img class="card-img card-img-panel" src="/img/panel.jpg">
        <div class="card-img-overlay px-5">
            <div class="card-body">
                <h5 class="card-text card-text-header text-center font-weight-bold mb-0">難しい話しは後にして、実戦形式で覚えて行こう！</h5>
                <div class="row @pc align-items-end @endpc">
                    <div class="pc-card-sign card-sign p-0" id="pc-panel-left">
                        <p class="card-text card-text-sign">５分動画！小学生から大人まで！</p>
                        <p class="card-text card-text-sign">実戦で覚えるプログラミング！</p>
                        <p class="card-text card-text-sign last mb-0">何も考えずに真似して作って見よう！</p>
                        <a href="{{ route('register') }}" class="card-sign-button">新規登録はこちら！</a>
                    </div>
                    <div class="card-video px-0" id="pc-panel-right">
                        @if (!empty($youtube_link))
                            <iframe width="426" height="240" src="{{ $youtube_link['link'] }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@pc
    @if (Auth::check() == false)
        @include('component.layout.panel_language_pc')
    @endif
    @normal_user
        @include('component.layout.panel_language_pc')
    @endnormal_user
@endpc
@sp
    @if (Auth::check() == false)
        @include('component.layout.panel_language_sp')
    @endif
    @normal_user
        @include('component.layout.panel_language_sp')
    @endnormal_user
@endsp
@foreach ($lessons as $lesson)
    @if (!empty($lesson['lesson_details']))
        <div class="box box-sp">
            <div class="card">
                <div class="lession-heading w-100 px-5">
                    <img class="img-fluid" src="/img/light-bulb.png" />
                    <div class="col-8 pr-0 pad_l5">
                        <span>【{{ $lesson['ms_categories']['name'] }}】{{ $lesson['name'] }}@if (!empty($lesson['video_count'])) (全{{ $lesson['video_count'] }}回) @endif</span>
                    </div>
                    <div class="col-4">
                        <a href="{{ route('lesson.detail', ['lesson_id' => $lesson['id']] ) }}" class="lession-heading-url float-right">レッスン一覧</a>
                    </div>
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
<div class="box mb-0">
    <div class="card-lesson-total text-center">
        <p class="card-text">
            <a href="{{ route('lesson') }}">全てのレッスンを見る（{{ $global_total_lessons }}）</a>
        </p>
    </div>
</div>
@stop
