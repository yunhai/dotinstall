@extends('layout.master')
@section('title', '子供から大人まで、動画で楽しく学べるプログラミングGO')
@section('meta_description', '「プログラミングは苦手」「子共の将来の為にプログラミングを学ばなさい」と思っている方は、子供から大人まで、動画を見ながらiPhoneアプリの開発ができるプログラミングGO。無料会員ならアプリ開発言語「swift」のレッスン動画も見放題！')
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
    @include('component.top.panel', ['youtube_link' => $youtube_link])
    @pc 
        @include('component.top.announcement_panel', ['announcement' => $announcement, 'ad' => $ad])
    @endpc
    <div id='j-lessonList'>
        @include('component.top.unlogin_lesson', ['lessons' => $lessons])
    </div>
    @if($lessons['last_page'])
    <div class="box mb-0" id='j-lessonListPaginator'>
        <div class="card-lesson-total text-center">
            <p class="card-text">
                <a href="javascript:;"
                    rel="nofollow" 
                    class='j-paginate'
                    data-current_page='{{ $lessons['current_page'] }}'
                    data-last_page='{{ $lessons['last_page'] }}'
                    data-url='{{ route('ajax.top.lesson') }}'>
                    全てのレッスンを見る（５０）
                </a>
            </p>
        </div>
    </div>
    @endif

    @include('component.modal.request_login', ['modal_id' => 'modal_request_login'])
    @include('component.modal.request_deny', ['modal_id' => 'modal_request_deny'])
@stop
