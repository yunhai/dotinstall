@extends('layout.master')

@section('title', $target['name'] . ' | プログラミングＧＯ')
@section('meta_description', $target['name'])
@section('meta')
<meta name="robots" content="noindex">
<meta name="googlebot" content="noindex">
@stop
@php
    $page_intro = "【{$filter_form['difficulty'][$lessons['difficulty']]}】{$lessons['name']}　{$lessons['video_count']}本の動画で提供中";
@endphp
@section('breadcrumbs', Breadcrumbs::render('lesson_detail', $target, $page_intro))
@php $time = time(); @endphp
@push('css')
    <link rel="stylesheet" href="/css/lesson/lesson_detail/detail.css?{{ $time }}">
    @pc
        <link rel="stylesheet" href="https://cdn.plyr.io/3.3.20/plyr.css">
    @endpc
@endpush

@push('js')
@pc
    <script src="https://cdn.plyr.io/3.3.20/plyr.js"></script>
    @diamond_user
        <script type="text/javascript" src="/js/video.diamond.js?{{ $time }}"></script>
    @else
        <script type="text/javascript" src="/js/video.normal.js?{{ $time }}"></script>
    @enddiamond_user
@else
    <script src="https://player.vimeo.com/api/player.js"></script>
@endpc
    <script src='https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/ace.js'></script>
    <script type="text/javascript" src="/js/ace.js"></script>
    <script type="text/javascript" src="/js/lesson/lesson_detail/lesson_detail.js"></script>
    <script type="text/javascript" src="/js/vimeo.js"></script>
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
    <div class="box px-5 mb-0 mar_t20">
        @if ($target['url'])
        <div class="@sp player @endsp @pc player-yt @endpc">
            @php
                $video_css_class = 'j-video_deny';
                if ($allow_access) {
                    $video_css_class = 'j-video_allow';
                }

                $poster = array_shift($target['posters']);
                $poster_path = $poster['path'];
            @endphp

            @pc
                @if ($target['url'])
                <div class='j-maleContainer'>
                    <div id="j-player"
                        data-plyr-provider="vimeo"
                        data-plyr-embed-id="{{ $target['url'] }}"
                        class='{{ $video_css_class }}'>
                    </div>
                </div>
                @endif
                @if ($target['url_female'])
                <div class='j-femaleContainer hidden'>
                    <div id="j-playerFemale"
                        data-plyr-provider="vimeo"
                        data-plyr-embed-id="{{ $target['url_female'] }}"
                        class='{{ $video_css_class }}'>
                    </div>
                </div>
                @endif
            @else
                @if ($target['url'])
                <div class='j-maleContainer'>
                    <div id="j-vimeo_player"
                        data-vimeo-url="{{ $target['url'] }}"
                        data-vimeo-title="0"
                        data-vimeo-portrait="0"
                        data-vimeo-byline="0"
                        data-vimeo-responsive="1"
                        class='{{ $video_css_class }}'>
                    </div>
                </div>
                @endif
                @if ($target['url_female'])
                <div class='j-femaleContainer hidden'>
                    <div id="j-vimeo_player_female"
                        data-vimeo-url="{{ $target['url_female'] }}"
                        data-vimeo-title="0"
                        data-vimeo-portrait="0"
                        data-vimeo-byline="0"
                        data-vimeo-responsive="1"
                        class='{{ $video_css_class }}'>
                    </div>
                </div>
                @endif
            @endpc
            <div class="container-fluid">
                <div class="row box-request" @if (count($lesson_details) == 0) style="border-bottom: 0;" @endif>
                    @pc
                        @include('component.lesson.lesson_detail.pc.video_control',
                            [
                                'target' => $target,
                                'prev_video' => $prev_video,
                                'next_video' => $next_video,
                                'allow_access' => $allow_access
                            ]
                        )
                    @endpc
                    @sp
                        @include('component.lesson.lesson_detail.sp.video_control',
                            [
                                'target' => $target,
                                'prev_video' => $prev_video,
                                'next_video' => $next_video,
                                'allow_access' => $allow_access
                            ]
                        )
                    @endsp
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="box">
        <div class="row">
            @pc
                @include('component.lesson.lesson_detail.pc.detail_info', ['resources' => $target['resources'], 'resources_item' => $target['resources_item'] ?? [], 'content' => $target['source_code_contents'], 'lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id'], 'allow_access' => $allow_access])
            @endpc
            @sp
                @include('component.lesson.lesson_detail.sp.detail_info', ['resources' => $target['resources'], 'resources_item' => $target['resources_item'] ?? [], 'content' => $target['source_code_contents'], 'lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id'], 'allow_access' => $allow_access])
            @endsp
        </div>
    </div>
</div>
@include('component.modal.video_speed', ['modal_id' => 'modal_diamond_user'])
@include('component.modal.video_deny', ['modal_id' => 'modal_video_deny'])
@include('component.modal.request_deny', ['modal_id' => 'modal_request_deny'])
@include('component.modal.resource_download_deny', ['modal_id' => 'modal_resource_download_deny'])
@include('component.modal.request_female_voice', ['modal_id' => 'modal_request_female_voice'])

@stop
