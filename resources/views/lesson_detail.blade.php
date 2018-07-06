@extends('layout.master')
@section('title', 'プログラミングＧＯ')
@section('content')
@section('breadcrumbs', Breadcrumbs::render('lesson_detail'))
<div id="content">
    <h2 class="ttlCommon border-bottom-0 mb-0 pl-0 pr-0">レッスン一覧 〇〇レッスン　〇〇本の動画で提供中</h2>
    <div class="box mb-0">
        <div class="card">
            <div class="lession-nar w-100"><span>ステージ２-2　簡単なメモアプリを作って見よう！</span></div>
        </div>
    </div>
    <div class="box border-top-0">
        <div class="card card-video-list">
            <div class="container-fluid">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                </div>
                <div class="container-fluid">
                    <div class="row box-request">
                        <a href="#" class="btn-request mr-2">
                            <img class="card-img-top btn-to-complete" src="/img/btn_to_complete.png">
                        </a>
                        <a href="#" class="btn-request mr-2">
                            <img class="card-img-top btn-sorce-conformation" src="/img/btn_sorce_conformation.png">
                        </a>
                        <a href="#" class="btn-request">
                            <img class="card-img-top btn-diamond" src="/img/btn_diamond.png">
                        </a>
                    </div>
                </div>
                @foreach (array_chunk($lesson_details, 5) as $key => $lesson_detail)
                    <div class="row" style='@if($key > 0) border-top: 1px solid #bca9af; @endif'>
                        @foreach ($lesson_detail as $row)
                            @php $path = $row['media'][0]['path']; @endphp
                            <div class="col-lesson col-lg-3 col-md-3 col-sm-6">
                                <div class="card">
                                    <img class="pickup" src="/img/pickup.png">
                                    <a href="{{ route('lesson_detail', ['lesson_id' => $lesson_id, 'lesson_detail_id' => $row['id']] ) }}"><img class="card-img-top card-img-video" src="@media_path($path)"></a>
                                    <div class="card-body text-center pl-0 pr-0">
                                        <p class="card-text text-left">{{ $row['name'] }}</p>
                                        <p class="card-text mb-1">
                                            <a href="#" class="btn btn-sm btn-request">
                                                <img class="card-img-top btn-to-complete" src="/img/btn_to_complete.png">
                                            </a>
                                        </p>
                                        <p class="card-text">
                                            <a href="#" class="btn btn-sm btn-request">
                                                <img class="card-img-top btn-sorce-conformation" src="/img/btn_sorce_conformation.png">
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop
