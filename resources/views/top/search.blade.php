@extends('layout.master')
@section('title', '子供から大人まで、動画で楽しく学べるプログラミングGO')
@section('meta_description', '「プログラミングは苦手」「子共の将来の為にプログラミングを学ばなさい」と思っている方は、子供から大人まで、動画を見ながらiPhoneアプリの開発ができるプログラミングGO。無料会員ならアプリ開発言語「swift」のレッスン動画も見放題！')

@php $time = time(); @endphp
@push('css')
    <link rel="stylesheet" href="/css/lesson/lesson_detail/detail.css?{{ $time }}">
@endpush

@push('js')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/ace.js'></script>
    <script type="text/javascript" src="/js/lesson/filter.js?{{ $time }}"></script>
    <script type="text/javascript" src="/js/lesson/lesson_detail/lesson_detail.js?{{ $time }}"></script>
    <script type="text/javascript" src="/js/jquery.bcSwipe.min.js"></script>
    <script type="text/javascript" src="/js/top.js?{{ $time }}"></script>
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
	    <div class="col-md-2" style='position:relative; padding-top: 8px;'>レッスン一覧</div>
	    <div class="col-md-6" style='margin-left: 20px; flex: 0 0 48%; margin-top:2px;'>
	        <form action="{{ route('top.search') }}" class="top-search">
	            <div class="input-group">
	                <div class="input-group-prepend" style=''>
	                  <div class="input-group-text" style='background: #fff;border: solid 1px #ece8e9;border-top-left-radius: 6px;border-bottom-left-radius: 6px; padding-bottom: 8px;'>
	                      <i class="fa fa-search" style="font-size:13px"></i>
	                  </div>
	                </div>
	                <input style='border: solid 1px #ece8e9; border-left: 0;padding-left: 0;padding-top:6px;border-top-right-radius: 6px;border-bottom-right-radius: 6px; font-size: 11px' type="text" class="form-control form-control-search j-lessonFilter" name="keyword" value="@if (!empty($keyword)) {{ $keyword }} @endif" placeholder="動画検索">
	                <button class="btn-search" style='padding: 0 10px;border-radius: 8px; padding-top:2px; border: solid 1px #ece8e9; font-size:11px;'>検索</button>
	            </div>
	        </form>
	    </div>
	    <div class="col-md-3 text-right" style='flex: 0 0 33%; max-width:33%; position:relative; padding-top: 8px; '>レッスン一覧 {{ $global_setting['total_enable_lesson'] }}レッスン　{{ $global_setting['total_enable_video'] }}本の動画で提供中</div>
	</div>

    @endpc
    <div class='row blog mar_t10'>
      <div id='j-lessonFilterResult' style='width: 100%; display: block;'>
          @include('component.lesson.filter.result', ['filter_form' => $filter_form, 'lessons' => $lessons])
      </div>
    </div>
@stop
