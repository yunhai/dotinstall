@extends('layout.master')
@section('title', '子供から大人まで、動画で楽しく学べるプログラミングGO')
@section('meta_description', '「プログラミングは苦手」「子共の将来の為にプログラミングを学ばなさい」と思っている方は、子供から大人まで、動画を見ながらiPhoneアプリの開発ができるプログラミングGO。無料会員ならアプリ開発言語「swift」のレッスン動画も見放題！')

@php $time = time(); @endphp
@push('css')
    <link rel="stylesheet" href="/css/lesson/lesson_detail/detail.css?{{ $time }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@push('js')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/ace.js'></script>
    <script type="text/javascript" src="/js/ace.js?{{ $time }}"></script>
    <script type="text/javascript" src="/js/jquery.bcSwipe.min.js?{{ $time }}"></script>
    <script type="text/javascript" src="/js/top.js?{{ $time }}"></script>
    <script src="https://player.vimeo.com/api/player.js"></script>
    @if ($page === 'search')
        <script type="text/javascript" src="/js/top-search.js?{{ $time }}"></script>
    @endif
@endpush

@section('content')
    @include('component.top.panel', ['youtube_link' => $youtube_link])

    @sp
        @include('component.top.search_form_sp', ['filter_form' => $filter_form])
    @endsp

    @pc
        @include('component.top.announcement_panel', ['announcement' => $announcement, 'ad' => $ad])
        @include('component.top.search_form_pc', ['filter_form' => $filter_form])
    @endpc

    <div class='row'>
        @if ($page === 'top')
        <div id='j-topPage' style='width: 100%; display: block;'>
            @include('component.top.top', ['lessons' => $lessons])
        </div>
        @endif
        <div id='j-lessonFilterResult' class="result-search" style='padding: 0;width: 100%; display: block;'>
            @if ($page === 'search')
                @include('component.top.search')
            @endif
        </div>
    </div>
    @include('component.modal.request_deny', ['modal_id' => 'modal_request_deny'])
@stop
