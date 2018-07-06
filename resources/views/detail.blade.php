@extends('layout.master')
@section('title', 'プログラミングＧＯ')
@section('content')
@section('breadcrumbs', Breadcrumbs::render('lesson.detail', $lessons['name']))
<div id="content">
    <div class="box">
        <div class="card">
            <div class="lession-heading w-100">
                <img class="img-fluid" src="/img/light-bulb.png"><span>【{{ $lessons['ms_categories']['name'] }}】{{ $lessons['name'] }}</span>
                <span class="lession-heading-url float-right">28,643 人が学習中です</span>
            </div>
        </div>
        <div class="card card-video-list">
            <div class="container-fluid">
                @foreach (array_chunk($lessons['lesson_details'], 5) as $key => $lesson_detail)
                    <div class="row" style='@if($key > 0) border-top: 1px solid #bca9af; @endif'>
                        @foreach ($lesson_detail as $row)
                            @php $path = $row['media'][0]['path']; @endphp
                            <div class="col-lesson col-lg-3 col-md-3 col-sm-6">
                                <div class="card">
                                    <img class="pickup" src="/img/pickup.png">
                                    <a href="{{ route('lesson_detail', ['lesson_id' => $lessons['id'], 'lesson_detail_id' => $row['id']] ) }}"><img class="card-img-top card-img-video" src="@media_path($path)"></a>
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
