@extends('layout.master')
@section('title', 'レッスン一覧')
@section('content')
@section('breadcrumbs', Breadcrumbs::render('lesson'))
<div id="content">
    <div class="box mb-0" style="border-top: 1px solid #bca9af;">
        <div class="card">
            <div class="lession-nar w-100 px-5"><span>簡単な実戦でプログラムを覚えよう！</span></div>
        </div>
    </div>
    <div class="content box box-lesson mb-0 ">
        <div class="px-5">
              <ul class="list-group w-100">
                  @foreach ($lessons as $lesson)
                  <li class="list-group-item">
                      <div class="col-8 float-left">
                          <a href="{{ route('lesson.detail', ['lesson_id' => $lesson['id']] ) }}" class="d-flex align-items-center">
                              <img class="img-fluid img-lesson-btn-play" src="/img/play_button.png">
                              <span>【{{ $lesson['ms_categories']['name'] }}】{{ $lesson['name'] }}@if (!empty($lesson['video_count'])) (全{{ $lesson['video_count'] }}回) @endif</span>
                          </a>
                      </div>
                      <div class="col-4 text-right float-right d-flex align-items-center justify-content-end">
                          <img class="img-fluid img-lesson-avatar" src="/img/avatar_1.png">
                          <img class="img-fluid img-lesson-avatar" src="/img/avatar.png">
                          @php
                              $count = 0;
                              if (!empty($stat[$lesson['id']])) {
                                  $count = number_format($stat[$lesson['id']]);
                              }
                          @endphp
                          <span>{{ $count }} 人が学習中です</span>
                      </div>
                  </li>
                  @endforeach
              </ul>
        </div>
    </div>
</div>
@stop
