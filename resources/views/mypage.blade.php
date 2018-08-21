@extends('layout.master')
@section('title', 'マイページ')
@section('content')
@section('breadcrumbs', Breadcrumbs::render('mypage'))
@php
    $user_grade = 'normal';
    if (Auth::user()->grade == USER_GRADE_DIAMOND) {
        $user_grade = 'diamond';
        if (Auth::user()->diamond_ends_at) {
            $user_grade = 'diamond_end_pending';
        }
    }
@endphp
<div id="content">
    <div class="box ttlCommon mb-0 px-5">マイページ</div>
    <div class="box-mypage px-5">
        <div class="row">
            <div class="mar_t20 col-lg-4 col-md-4 col-sm-12">
                <div class="card card-mypage">
                    <div class="card-header">ステータス</div>
                    <div class="card card-body justify-content-center text-center border-0">
                        <h4>
                            @if ($user_grade == 'diamond_end_pending')
                                <p class="card-text" style="font-size: 14px;"> {{ $diamond_ends_at }}まで視聴可能</p>
                            @endif
                            <p class="card-text">
                                @if ($user_grade == 'normal' || $user_grade == 'diamond_end_pending')
                                    <span style="font-size: 13px;">現在：</span>無料会員
                                @elseif ($user_grade == 'diamond')
                                    <span style="font-size: 13px;">現在：</span>月額会員
                                @endif
                            </p>
                        </h4>
                        @if ($user_grade == 'normal' || $user_grade == 'diamond_end_pending')
                            <p class="card-text">月額会員になると、全ての動画見放題となります！月額&yen;{{ constant('MEMBERSHIP_FEE') }}円（税別）</p>
                            <p class="card-text">
                                <a href="javascript:;" data-toggle="modal" data-target=".user-destroy-modal-sm">【退会する】</a>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mar_t20 col-lg-4 col-md-4 col-sm-12">
                <div class="card card-mypage">
                    <div class="card-header">次回課金日/値段</div>
                    <div class="card card-body justify-content-center text-center border-0">
                        @if ($user_grade == 'normal' || $user_grade == 'diamond_end_pending')
                            <p class="card-text">
                                <a href="{{ route('user.upgrade') }}">
                                    <span class="mr-2"><img class="img-fluid" src="img/charge_diamond.png" width="15px;" style="padding-bottom: 2px;"></span>月額会員になる
                                </a>
                            </p>
                            <p class="card-text">月額会員になると、全ての動画見放題となります！月額&yen;{{ constant('MEMBERSHIP_FEE') }}円（税別）</p>
                        @elseif ($user_grade == 'diamond')
                        <h4><p class="card-text" style="padding-top:15px">{{ $next_pay_date }}</p></h4>
                        <h4><p class="card-text">&yen;{{ constant('MEMBERSHIP_FEE') }}円<span style="font-size: 10px;">税別</span></p></h4>
                        <div style="line-height: 10px; text-align: left;padding-left: 80px;padding-top: 8px;">
                            <p>
                                <a href="javascript:;" data-toggle="modal" data-target=".payment-history-modal-sm">【購入履歴】</a>
                            </p>
                            <p>
                                <a href="javascript:;" data-toggle="modal" data-target=".user-downgrade-modal-sm">【課金停止する】</a>
                            </p>
                            <p>
                                <a href="javascript:;" data-toggle="modal" data-target=".user-destroy-modal-sm">【退会する】</a>
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mar_t20 col-lg-4 col-md-4 col-sm-12">
                <div class="card card-mypage">
                    <div class="card-header">お知らせ</div>
                    <div class="card-body text-center">
                        @foreach($notifications as $notification)
                        <p class="card-text text-left mypage--notification">
                            <a href="javascript:;" title='{{ $notification['title'] }}' data-toggle="modal" data-target="#model--notification_{{ $notification['id'] }}">
                                [{{ $notification['post_date_short'] }}]　{{ $notification['title'] }}
                            </a>
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="mar_t20 mar_b20 col-lg-4 col-md-4 col-sm-12">
                <div class="card card-mypage">
                    <div class="card-header">総合完了数</div>
                    <div class="card card-body justify-content-center text-center border-0">
                        <h4><p class="card-text text-center">{{ $stat['closed_lesson_detail_count'] }}</p></h4>
                    </div>
                </div>
            </div>
            <div class="mar_t20 mar_b20 col-lg-4 col-md-4 col-sm-12">
                <div class="card card-mypage">
                    <div class="card-header">学習日数</div>
                    <div class="card card-body justify-content-center text-center border-0">
                        <h4><p class="card-text text-center">{{ $stat['date_count'] }}</p></h4>
                    </div>
                </div>
            </div>
            <div class="mar_t20 mar_b20 col-lg-4 col-md-4 col-sm-12">
                <div class="card card-mypage">
                    <div class="card-header">視聴時間</div>
                    <div class="card card-body justify-content-center text-center border-0">
                        <h4><p class="card-text">{{ $stat['duration'] }}</p></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade payment-history-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0" style="height: auto;">
            <div class="modal-body p-0">
                <table class="table table-borderless mb-0">
                    <thead>
                        <tr>
                            <td scope="col">日付</td>
                            <td scope="col">金額</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payment_history as $history)
                            <tr>
                                <td scope="row">{{ $history['stripe_time'] }}</td>
                                <td>￥{{ $history['stripe_amount'] }}円（税別）</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer" style="padding: 0;">
                <a href="javascript:;" class="btn font_12" data-dismiss="modal" aria-label="Close">閉じる</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade user-downgrade-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content rounded-0" style="height: auto;">
            <div class="modal-body">
                <p class="mb-0">月額会員をストップしますか？</p>
            </div>
            <div class="modal-footer" style="padding: 0;">
                <a href="javascript:;" class="btn font_12" data-dismiss="modal" aria-label="Close">閉じる</a>
                <a href="{{ route('user.downgrade') }}" class="btn font_12">OK</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade user-destroy-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content rounded-0" style="height: auto;">
            <div class="modal-body">
                <p class="mb-0">退会してよろしいでしょうか？</p>
            </div>
            <div class="modal-footer" style="padding: 0;">
                <a href="javascript:;" class="btn font_12" data-dismiss="modal" aria-label="Close">閉じる</a>
                <a href="{{ route('user.destroy') }}" class="btn font_12">OK</a>
            </div>
        </div>
    </div>
</div>
@foreach($notifications as $notification)
    @include('component.modal.info', ['modal_id' => 'model--notification_' . $notification['id'], 'target' => $notification])
@endforeach
@stop
