@extends('layout.master')
@section('title', 'レッスン一覧')
@section('content')
@section('breadcrumbs', Breadcrumbs::render('lesson'))
<div id="content">
    <div class="box ttlCommon border-bottom-0 mb-0 pl-5 pr-5">レッスン一覧 〇〇レッスン　〇〇本の動画で提供中</div>
    <div class="box mb-0">
        <div class="card">
            <div class="lession-nar w-100 pl-5 pr-5"><span>簡単な実戦でプログラムを覚えよう！</span></div>
        </div>
    </div>
    <div class="box box-lesson">
        <div class="pl-5 pr-5">
              <ul class="list-group w-100">
                  @foreach ($lessons as $lesson)
                  <li class="list-group-item">
                      <div class="col-6 float-left">
                          <a href="{{ route('lesson.detail', ['lesson_id' => $lesson['id']] ) }}">
                              <img class="img-fluid" src="/img/play_button.png">
                              <span>【{{ $lesson['ms_categories']['name'] }}】{{ $lesson['name'] }}</span>
                          </a>
                      </div>
                      <div class="col-6 text-right float-right">
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
