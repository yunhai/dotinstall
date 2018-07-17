@extends('layout.master')
@section('title', 'プログラミングＧＯ')
@section('breadcrumbs', Breadcrumbs::render('lesson_detail'))

@push('css')
    <link rel="stylesheet" href="https://cdn.plyr.io/3.3.20/plyr.css">
@endpush

@push('js')
    <script src="https://cdn.plyr.io/3.3.20/plyr.js"></script>
    <script type="text/javascript" src="/js/video.js"></script>
@endpush

@section('content')
<div id="content">
    <h2 class="ttlCommon border-bottom-0 mb-0 pl-0 pr-0">レッスン一覧 〇〇レッスン　〇〇本の動画で提供中</h2>
    <div class="box mb-0">
        <div class="card">
            <div class="lession-nar w-100"><span>ステージ２-2　簡単なメモアプリを作って見よう！</span></div>
        </div>
    </div>
    <div class="box border-top-0">
        <div class="card card-video-list">
            <div class="container-fluid">
                @php
                    $video = [];
                    if (!empty($target['videos'])) {
                        $video = current($target['videos']);
                    }
                @endphp
                @if ($video)
                    <video controls crossorigin playsinline id="j-player">
                        @php $video_path = $video['path']; @endphp
                        <source src="@media_path($video_path)" type="video/mp4" size="1080" >
                    </video>
                @endif
                <div class="container-fluid">
                    <div class="row box-request">
                        <div class="col-7">
                            @if ($target['is_closeable'])
                            <a href="{{ route('lesson_detail.close', ['lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']]) }}" class="btn-request">
                                <img class="btn-to-complete" src="/img/btn_to_complete.png">
                            </a>
                            @endif
                            <a href="#" class="btn-request">
                                <img class="btn-sorce-conformation" src="/img/btn_sorce_conformation.png">
                            </a>
                            <a href="#" class="btn-request">
                                <img class="btn-diamond" src="/img/btn_diamond.png">
                            </a>
                        </div>
                        <div class="col-5 text-right">
                            @if ($prev_video)
                            <a href="{{ route('lesson_detail.detail', ['lesson_id' => $prev_video['lesson_id'], 'lesson_detail_id' => $prev_video['id']]) }}" title="{{ $prev_video['name'] }}">
                                <img class="btn-prev" src="/img/btn-prev.png">
                            </a>
                            @endif
                            @if ($next_video)
                            <a href="{{ route('lesson_detail.detail', ['lesson_id' => $next_video['lesson_id'], 'lesson_detail_id' => $next_video['id']]) }}" title="{{ $next_video['name'] }}">
                                <img class="btn-next" src="/img/btn-next.png">
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @include('component.lesson.item', ['lesson_details' => $lesson_details])
            </div>
        </div>
    </div>
</div>
@stop
