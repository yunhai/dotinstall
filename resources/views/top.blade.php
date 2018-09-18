@extends('layout.master')
@section('title', 'プログラミングＧＯ')
@push('css')
    <link rel="stylesheet" href="/css/lesson/lesson_detail/detail.css">
@endpush

@push('js')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/ace.js'></script>
    <script type="text/javascript" src="/js/lesson/filter.js"></script>
    <script type="text/javascript" src="/js/ace.js"></script>
    <script type="text/javascript" src="/js/lesson/lesson_detail/lesson_detail.js"></script>
    <script type="text/javascript" src="/js/jquery.bcSwipe.min.js"></script>
    <script type="text/javascript" src="/js/top.js"></script>
    <script src="https://player.vimeo.com/api/player.js"></script>
@endpush

@section('content')
    @if (Auth::check())
        @include('component.top.logedin_lesson', ['lessons' => $lessons])
    @else
        @include('component.top.panel', ['youtube_link' => $youtube_link])
        <div id="notice-content">
            <div class="box mb-0">
                <div class="heading">
                    <span>【お知らせ】</span>
                </div>
                <div class="row noitce-content">
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-2">2019/03/26</div>
                            <div class="col-sm-9">本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">2019/03/26</div>
                            <div class="col-sm-9">本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">2019/03/26</div>
                            <div class="col-sm-9">本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">2019/03/26</div>
                            <div class="col-sm-9">本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文</div>
                        </div>
                    </div>
                    <div class="col-sm-3 right">
                        <p>
                        広告<br>
                        無い場合は空白<br>
                        アドセンス<br>
                        画像＋ＵＲＬ<br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div id='j-lessonList'>
            @include('component.top.unlogin_lesson', ['lessons' => $lessons])
        </div>
        @if($lessons['last_page'])
        <div class="box mb-0" id='j-lessonListPaginator'>
            <div class="card-lesson-total text-center">
                <p class="card-text">
                    <a href="javascript:;"
                        class='j-paginate'
                        data-current_page='{{ $lessons['current_page'] }}'
                        data-last_page='{{ $lessons['last_page'] }}'
                        data-url='{{ route('ajax.top.lesson') }}'>
                        もっと見る
                    </a>
                </p>
            </div>
        </div>
        @endif
    @endif

    @include('component.modal.request_login', ['modal_id' => 'modal_request_login'])
    @include('component.modal.request_deny', ['modal_id' => 'modal_request_deny'])
@stop
