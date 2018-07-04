@extends('layout.master')
@section('title', 'プログラミングＧＯ')
@section('content')
<div id="content">
    <h2 class="ttlCommon pl-0 pr-0">レッスン一覧 〇〇レッスン　〇〇本の動画で提供中</h2>
    <div class="box">
        <div class="card">
            <div class="lession-heading w-100"><span>簡単な実戦でプログラムを覚えよう！</span></div>
        </div>
    </div>
    <div class="row">
        <ul class="list-group w-100">
            @foreach ($lessons as $lesson)
            <li class="list-group-item"><a href="{{ route('lesson.detail', ['lesson_id' => $lesson['id']] ) }}">{{ $lesson['name'] }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
@stop
