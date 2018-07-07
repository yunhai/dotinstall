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
                <div class="embed-responsive embed-responsive-16by9">
                    <video id="j-video" playsinline controls>
                        @php $video_path = $video['path']; @endphp
                        <source src="@media_path($video_path)" type="video/mp4">
                    </video>
                </div>
                @endif
                <div class="container-fluid">
                    <div class="row box-request">
                        <a href="#" class="btn-request mr-2">
                            <img class="card-img-top btn-to-complete" src="/img/btn_to_complete.png">
                        </a>
                        <a href="#" class="btn-request mr-2">
                            <img class="card-img-top btn-sorce-conformation" src="/img/btn_sorce_conformation.png">
                        </a>
                        <a href="#" class="btn-request">
                            <img class="card-img-top btn-diamond" src="/img/btn_diamond.png">
                        </a>
                    </div>
                </div>
                @include('component.lesson.item', ['lesson_details' => $lesson_details])
            </div>
        </div>
    </div>
</div>
@stop
