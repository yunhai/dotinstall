@extends('layout.master')
@section('title', 'プログラミングＧＯ')
@section('content')
<div id="content">
    <h2 class="ttlCommon border-bottom-0 mb-0 pl-0 pr-0">レッスン一覧 〇〇レッスン　〇〇本の動画で提供中</h2>
    <div class="box mb-0">
        <div class="card">
            <div class="lession-nar w-100"><span>簡単な実戦でプログラムを覚えよう！</span></div>
        </div>
    </div>
    <div class="row box-lesson">
        <div class="container">
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
                          <span>28,643 人が学習中です</span>
                      </div>
                  </li>
                  @endforeach
              </ul>
        </div>
    </div>
</div>
@stop
