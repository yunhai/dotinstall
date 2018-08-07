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
    <div class="box ttlCommon border-bottom-0 mb-0 px-5">{{ $lessons['name'] }}　{{ $lessons['video_count'] }}本の動画で提供中</div>
    <div class="box mb-0">
        <div class="card">
            <div class="lession-nar w-100 px-5"><span>{{ $target['name'] }}</span></div>
        </div>
    </div>
    <div class="box px-5 mb-0 mar_t20">
        @php
            $video = [];
            if (!empty($target['videos'])) {
                $video = current($target['videos']);
            }
        @endphp
        @if ($video)
        <div class="@sp player @endsp @pc player-yt @endpc">
            <video controls crossorigin playsinline id="j-player" class='hidden'>
                @php $video_path = $video['path']; @endphp
                <source src="@media_path($video_path)" type="video/mp4" size="720" >
            </video>
            <div class="container-fluid">
                <div class="row box-request" @if (count($lesson_details) == 0) style="border-bottom: 0;" @endif>
                    <div class="col-7 pl-0 pr-0">
                        @if ($target['is_closeable'])
                            <a href="{{ route('lesson_detail.close', ['lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']]) }}" class="btn-sm bg-button-to-complete">
                                完了する
                            </a>
                        @else
                            <a href="{{ route('lesson_detail.reopen', ['lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']]) }}" class="btn-sm bg-button-complete">
                                完了
                            </a>
                        @endif
                        @if ($target['popup'])
                        @php $model_id = 'modal_' . $target['lesson_id'] . $target['id']; @endphp
                        <a href="javascript:;" class="btn-sm bg-button-source-confirmation" data-toggle="modal" data-target="#{{ $model_id }}">ソース確認
                        </a>
                        @endif
                        @normal_user
                            <a href="{{ route('user.upgrade') }}" class="btn-sm bg-button-user-diamond">
                                <img class="img-fluid" src="/img/charge_diamond.png" width="16px;">
                                <span>月額会員に登録する</span>
                            </a>
                        @endnormal_user
                    </div>

                    <div class="col-5  pl-0 pr-0 text-right">
                        @if ($prev_video)
                        <a class="btn-sm bg-button-paginate" href="{{ route('lesson_detail.detail', ['lesson_id' => $prev_video['lesson_id'], 'lesson_detail_id' => $prev_video['id']]) }}" title="{{ $prev_video['name'] }}">前の動画
                        </a>
                        @endif
                        @if ($next_video)
                        <a class="btn-sm bg-button-paginate" href="{{ route('lesson_detail.detail', ['lesson_id' => $next_video['lesson_id'], 'lesson_detail_id' => $next_video['id']]) }}" title="{{ $next_video['name'] }}">次の動画
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="box px-5 box-sp">
        <div class="card card-video-list" @if (!empty($lesson_details)) style="border-top: 1px solid #bca9af;" @endif>
            <div class="container-fluid pl-0 pr-0">
                @include('component.lesson.item', ['lesson_details' => $lesson_details])
            </div>
        </div>
    </div>
</div>
@if ($target['popup'])
    @include('component.modal.ace', ['modal_id' => $model_id, 'content' => $target['source_code_contents'], 'lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']])
@endif
@stop
