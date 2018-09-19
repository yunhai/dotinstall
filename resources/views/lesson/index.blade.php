@extends('layout.master')
@section('title', 'レッスン一覧')
@section('content')
@section('breadcrumbs', Breadcrumbs::render('lesson'))

@push('js')
    <script type="text/javascript" src="/js/lesson/filter.js"></script>
@endpush

<div id="content">
    @foreach ($lessons as $lesson)
        @if (!empty($lesson['lesson_details']))
            <div class="box">
                <div class="card">
                    <div class="lession-heading lession-header w-100 px-5">
                        <img class="img-fluid" src="/img/img_flash.png" />
                        <div class="@pc col-8 @endpc @sp col-12 @endsp pr-10 pad_l5 font-weight-bold">
                            <span>【{{ $filter_form['difficulty'][$lesson['difficulty']] }}】{{ $lesson['name'] }}（全{{ $lesson['video_count'] }}回）</span>
                        </div>
                    </div>
                </div>
                <div class="card card-video-list" @sp style="padding-left: 10px !important; padding-right: 10px !important;" @endsp>
                    <div class="container-fluid px-5">
                        @include('component.lesson.item', ['lesson_details' => $lesson['lesson_details']])
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>
<!--
<div class="box mb-0">
    <div class="card-lesson-total text-center">
        <p class="card-text">
            <a href="{{ route('lesson') }}">全てのレッスンを見る（{{ $global_total_lessons }}）</a>
        </p>
    </div>
</div>
-->
@stop
