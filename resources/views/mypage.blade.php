@extends('layout.master')
@section('title', 'マイページ')
@section('content')
@section('breadcrumbs', Breadcrumbs::render('mypage'))
<div id="content">
    <div class="box ttlCommon mb-0 px-5">マイページ</div>
    <div class="box-mypage px-5">
        <div class="row">
            <div class="mar_t30 col-lg-4 col-md-4 col-sm-12">
                <div class="card card-mypage">
                    <div class="card-header">ステータス</div>
                    <div class="card-body text-center">
                        <h3>
                            <p class="card-text">
                                @normal_user
                                    無料会員
                                @else
                                    ダイヤモンド会員
                                @endnormal_user
                            </p>
                        </h3>
                        @normal_user
                            <p class="card-text">
                                <a href="{{ route('user.upgrade') }}">
                                    <span class="mr-2"><img class="img-fluid" src="img/charge_diamond.png" width="15px;"></span>ダイヤモンド会員になる
                                </a>
                            </p>
                            <p class="card-text">ダイヤモンド会員になると、全ての動画見放題となります！月額\{{ constant('MEMBERSHIP_FEE') }}円（税別）</p>
                        @endnormal_user
                    </div>
                </div>
            </div>
            <div class="mar_t30 col-lg-4 col-md-4 col-sm-12">
                <div class="card card-mypage">
                    <div class="card-header">次回課金日/値段</div>
                    <div class="card-body text-center">
                        <h3><p class="card-text">2015/9月14日</p></h3>
                        <h3><p class="card-text">\{{ constant('MEMBERSHIP_FEE') }}円</p></h3>
                        <p class="card-text">
                            <a href="{{ route('user.downgrade') }}">
                                【ダイヤモンド会員を止める】
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="mar_t30 col-lg-4 col-md-4 col-sm-12">
                <div class="card card-mypage">
                    <div class="card-header">お知らせ</div>
                    <div class="card-body text-center">
                        <p class="card-text text-left"><a href="">06/14	『textlint入門』を追加しました</a></p>
                    </div>
                </div>
            </div>
            <div class="mar_t30 col-lg-4 col-md-4 col-sm-12">
                <div class="card card-mypage">
                    <div class="card-header">総合完了数</div>
                    <div class="card-body text-center">
                        <h3><p class="card-text">{{ $stat['closed_lesson_detail_count'] }}</p></h3>
                    </div>
                </div>
            </div>
            <div class="mar_t30 col-lg-4 col-md-4 col-sm-12">
                <div class="card card-mypage">
                    <div class="card-header">学習日数</div>
                    <div class="card-body text-center">
                        <h3><p class="card-text">{{ $stat['date_count'] }}</p></h3>
                    </div>
                </div>
            </div>
            <div class="mar_t30 col-lg-4 col-md-4 col-sm-12">
                <div class="card card-mypage">
                    <div class="card-header">視聴時間</div>
                    <div class="card-body text-center">
                        <h3><p class="card-text">{{ $stat['duration'] }}</p></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
