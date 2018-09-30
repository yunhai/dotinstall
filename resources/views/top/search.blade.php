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
    <div class="row title__gray title-gray--50">
        <div @pc class="col-md-6 col-xs-6" @endpc style='margin-top: 3px;'><a href="{{ route('top') }}">トップ / レッスン一覧</a></div>
        <div class="col-md-6 col-xs-6 text-right hidden-xs" @pc style='margin-top: 3px;' @endpc><b>レッスン一覧</b> {{ $global_setting['total_enable_lesson'] }}レッスン　{{ $global_setting['total_enable_video'] }}本の動画で提供中</div>
    </div>
    <div class="form__search row">
        @include('component.top.search_form', ['filter_form' => $filter_form])
    </div>
    <div class="row title__gray title-gray--50">
        <div @pc class="col-md-6 col-xs-6" @endpc style='margin-top: 3px;'>簡単な実戦でプログラムを覚えよう！</div>
    </div>
    <div class='row blog mar_t20'>
      <div id='j-lessonFilterResult' style='width: 100%; display: block;'>
          @include('component.lesson.filter.result', ['filter_form' => $filter_form, 'lessons' => $lessons])
      </div>
    </div>
@stop
