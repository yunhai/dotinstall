@extends('layout.master')
@section('title', '子供から大人まで、動画で楽しく学べるプログラミングGO')
@section('meta_description', '「プログラミングは苦手」「子共の将来の為にプログラミングを学ばなさい」と思っている方は、子供から大人まで、動画を見ながらiPhoneアプリの開発ができるプログラミングGO。無料会員ならアプリ開発言語「swift」のレッスン動画も見放題！')
@push('css')
    <link rel="stylesheet" href="/css/lesson/lesson_detail/detail.css">
@endpush

@push('js')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/ace.js'></script>
    <script type="text/javascript" src="/js/lesson/filter.js"></script>
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

    @sp
    <div class="row title__gray title-gray--50">
        <div style='margin-top: 3px;'><a href="{{ route('top') }}">トップ / レッスン一覧</a></div>
    </div>
    <div class="form__search row">
        @include('component.top.search_form', ['filter_form' => $filter_form])
    </div>
    <div class="row title__gray title-gray--50" style='margin-bottom: 10px;'>
        <div @pc class="col-md-6 col-xs-6" @endpc style='margin-top: 3px;'>レッスン一覧</div>
    </div>
    @endsp

    @pc
    <div class="row title__gray title-gray--50" style='margin-bottom: 10px;'>
        <div class="col-md-3" style='height: 30px; line-height: 30px;'>レッスン一覧</div>
        <div class="col-md-6" style='margin-left: 20px;'>
            <form action="{{ route('top.search') }}" class="top-search">
                <div class="input-group">
                    <div class="input-group-prepend" style=''>
                      <div class="input-group-text" style='background: #fff;border: solid 1px #ece8e9;border-top-left-radius: 6px;border-bottom-left-radius: 6px;'>
                          <i class="fa fa-search"></i>
                      </div>
                    </div>
                    <input style='border: solid 1px #ece8e9; border-left: 0;padding-left: 0;padding-top:6px;border-top-right-radius: 6px;border-bottom-right-radius: 6px;' type="text" class="form-control form-control-search j-lessonFilter" name="keyword" value="@if (!empty($keyword)) {{ $keyword }} @endif" placeholder="動画検索">
                    <button class="btn-search" style='padding: 0 15px;border-radius: 8px;'>検索</button>
                </div>
            </form>
        </div>
    </div>
    @endpc
    <div class='row blog mar_t10'>
      <div id='j-lessonFilterResult' style='width: 100%; display: block;'>
          @include('component.lesson.filter.result', ['filter_form' => $filter_form, 'lessons' => $lessons])
      </div>
    </div>
@stop
