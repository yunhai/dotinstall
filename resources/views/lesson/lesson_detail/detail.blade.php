@extends('layout.master')
@section('title', 'プログラミングＧＯ')
@section('breadcrumbs', Breadcrumbs::render('lesson_detail'))

@push('css')
    <link rel="stylesheet" href="https://cdn.plyr.io/3.3.20/plyr.css">
    <link rel="stylesheet" href="/css/lesson/lesson_detail/detail.css">
@endpush

@push('js')
    <script src="https://cdn.plyr.io/3.3.20/plyr.js"></script>
    <script type="text/javascript" src="/js/video.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/ace.js'></script>
    <script type="text/javascript" src="/js/ace.js"></script>
@endpush

@section('content')
<div id="content">
    <div class="box ttlCommon border-bottom-0 mb-0 pl-5 pr-5">レッスン一覧 〇〇レッスン　〇〇本の動画で提供中</div>
    <div class="box">
        <div class="card">
            <div class="lession-nar w-100 pl-5 pr-5"><span>ステージ２-2　簡単なメモアプリを作って見よう！</span></div>
        </div>
    </div>
    <div class="box border-top-0 pl-5 pr-5">
        <div class="card card-video-list">
            <div class="container-fluid pl-0 pr-0">
                @php
                    $video = [];
                    if (!empty($target['videos'])) {
                        $video = current($target['videos']);
                    }
                @endphp
                @if ($video)
                <div class="player">
                    <video controls crossorigin playsinline id="j-player" class='hidden'>
                        @php $video_path = $video['path']; @endphp
                        <source src="@media_path($video_path)" type="video/mp4" size="720" >
                    </video>
                </div>
                @endif
                <div class="container-fluid">
                    <div class="row box-request">
                        <div class="col-7 pl-0 pr-0">
                            @if ($target['is_closeable'])
                            <a href="{{ route('lesson_detail.close', ['lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']]) }}" class="btn-request">
                                <img class="btn-to-complete" src="/img/btn_to_complete.png">
                            </a>
                            @endif
                            @if ($target['popup'])
                            @php $model_id = 'modal_' . $target['lesson_id'] . $target['id']; @endphp
                            <a href="#" class="btn-request" data-toggle="modal" data-target="#{{ $model_id }}">
                                <img class="btn-sorce-conformation" src="/img/btn_sorce_conformation.png">
                            </a>
                            @endif
                            <a href="#" class="btn-request">
                                <img class="btn-diamond" src="/img/btn_diamond.png">
                            </a>
                        </div>

                        <div class="col-5  pl-0 pr-0 text-right">
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
@if ($target['popup'])
    @include('component.modal.ace', ['modal_id' => $model_id, 'content' => $target['source_code_contents'], 'lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']])
@endif
@stop
