@extends('layout.master')
@section('title', 'プログラミングＧＯ')
@section('breadcrumbs', Breadcrumbs::render('lesson_detail'))

@push('css')
    <link rel="stylesheet" href="https://cdn.plyr.io/3.3.20/plyr.css">
    <link rel="stylesheet" href="/css/lesson/lesson_detail/detail.css">
@endpush

@push('js')
    <script src="https://cdn.plyr.io/3.3.20/plyr.js"></script>
    @diamond_user
        <script type="text/javascript" src="/js/video.diamond.js"></script>
    @else
        <script type="text/javascript" src="/js/video.normal.js"></script>
    @enddiamond_user

    <script src='https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/ace.js'></script>
    <script type="text/javascript" src="/js/ace.js"></script>
    <script type="text/javascript" src="/js/lesson/lesson_detail/lesson_detail.js"></script>
@endpush

@section('content')
@php
    $redirect = route('login');
    if (Auth::check()) {
        if (Auth::user()->grade == USER_GRADE_NORMAL) {
            $redirect = route('user.upgrade');
        }
    }
@endphp
<div id="content">
    <div class="box ttlCommon border-bottom-0 mb-0 px-5">【{{ $filter_form['difficulty'][$lessons['difficulty']] }}】【＃{{ $lessons['sort'] }}】{{ $lessons['name'] }}　{{ $lessons['video_count'] }}本の動画で提供中</div>
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
            @php
                $video_css_class = 'j-video_deny';
                if ($allow_access) {
                    $video_css_class = 'j-video_allow';
                }
            @endphp

            <video controls crossorigin playsinline id="j-player" class='hidden {{ $video_css_class }}'>
                @php $video_path = $video['path']; @endphp
                <source src="@media_path($video_path)" type="video/mp4" size="720" >
            </video>
            <div class="container-fluid">
                <div class="row box-request" @if (count($lesson_details) == 0) style="border-bottom: 0;" @endif>
                    <div class="col-7 pl-0 pr-0">
                        @if (Auth::check())
                            @php
                                if ($target['is_closeable']) {
                                    $text = '完了する';
                                    $css_class = 'bg-button-to-complete';
                                } else {
                                    $text = '完了';
                                    $css_class = 'bg-button-complete';
                                }
                            @endphp
                            @if ($allow_access)
                                <a href="javascript:;" class="btn-sm {{ $css_class }}  j-lessonDetailCloseReopen"
                                   data-href-close='{{ route('lesson_detail.close', ['lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']]) }}'
                                   data-href-reopen='{{ route('lesson_detail.reopen', ['lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']]) }}'
                                   data-action='{{ $target['is_closeable'] ? 'close' : 'reopen' }}'
                                 >
                                    {{ $text }}
                                </a>
                            @else
                                <a href="javascript:;" class="btn-sm {{ $css_class }}" data-toggle="modal" data-target="#modal_request_deny">
                                    {{ $text }}
                                </a>
                            @endif
                        @else
                            <a href="javascript:;" class="btn-sm bg-button-to-complete" style="opacity: .6;" data-toggle="modal" data-target="#modal_request_deny">完了する</a>
                        @endif

                        @unlogin
                            <a href="{{ route('register.diamond') }}" class="btn-sm bg-button-user-diamond">
                                <img class="img-fluid" src="/img/charge_diamond.png" width="16px;">
                                <span>月額会員に登録する</span>
                            </a>
                        @endunlogin
                        @normal_user
                            <a href="{{ route('user.upgrade') }}" class="btn-sm bg-button-user-diamond">
                                <img class="img-fluid" src="/img/charge_diamond.png" width="16px;">
                                <span>月額会員に登録する</span>
                            </a>
                        @endnormal_user
                    </div>

                    <div class="col-5  pl-0 pr-0 text-right">
                        @if ($prev_video)
                        <a class="btn-sm bg-button-paginate" href="{{ route('lesson_detail.detail', ['lesson_id' => $prev_video['lesson_id'], 'lesson_detail_id' => $prev_video['id']]) }}" title="{{ $prev_video['name'] }}">
                            前の動画
                        </a>
                        @endif
                        @if ($next_video)
                        <a class="btn-sm bg-button-paginate" href="{{ route('lesson_detail.detail', ['lesson_id' => $next_video['lesson_id'], 'lesson_detail_id' => $next_video['id']]) }}" title="{{ $next_video['name'] }}">
                            次の動画
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="box px-5">
        <div class="card card-video-list" @if (!empty($lesson_details)) style="border-top: 1px solid #bca9af;" @endif>
            <div class="container-fluid pl-0 pr-0">
                <div class="row">
	                @pc
	                	@php $model_id = 'modal_' . $target['lesson_id'] . $target['id']; @endphp
                        @include('component.lesson.lesson_detail.lesson_detail_info_pc', ['modal_id' => $model_id, 'resources' => $target['resources'], 'resources_item' => $target['resources_item'] ?? [], 'content' => $target['source_code_contents'], 'lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id'], 'allow_access' => $allow_access])
	                @endpc
	                @sp
	                	@php $model_id = 'modal_' . $target['lesson_id'] . $target['id']; @endphp
                        @include('component.lesson.lesson_detail.lesson_detail_info_sp', ['modal_id' => $model_id, 'resources' => $target['resources'], 'resources_item' => $target['resources_item'] ?? [], 'content' => $target['source_code_contents'], 'lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id'], 'allow_access' => $allow_access])
	                @endsp
                </div>
            </div>
        </div>
    </div>
</div>
@include('component.modal.video_speed', ['modal_id' => 'modal_diamond_user'])
@include('component.modal.video_deny', ['modal_id' => 'modal_video_deny'])
@include('component.modal.request_deny', ['modal_id' => 'modal_request_deny'])
@include('component.modal.resource_download_deny', ['modal_id' => 'modal_resource_download_deny'])
@stop
