@extends('layout.master')
@section('title', 'プログラミングＧＯ')
@push('css')
    <link rel="stylesheet" href="/css/payment.css">
@endpush

@push('js')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var STRIPE_KEY = "{{ env('STRIPE_KEY') }}";
    </script>
    <script src="/js/payment.js"></script>
    @if (session('success'))
    	<script type="text/javascript">
		    $(window).on('load',function(){
		        $('#success').modal('show');
		    });
		</script>
        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="success"  data-keyboard="false" data-backdrop="static">
			<div class="modal-dialog modal-sm">
				<div class="modal-content rounded-0">
					<div class="modal-body">
						<p class="mb-0">ダイヤモンド会員になりました。<br>ありがとうございました！</p>
					</div>
					<div class="modal-footer" style="padding: 0; justify-content:center;">
						<a href="{{ route('top') }}" class="btn">OK</a>
					</div>
				</div>
			</div>
		</div>
    @endif
@endpush
@section('breadcrumbs', Breadcrumbs::render('user.upgrade'))

@section('content')
<div id="content">
    <div class="box ttlCommon mb-0 px-5">マイページ</div>
    <div class="box-user mar_t20 mar_b20 px-5">
        <div class="col-12 mar_b20 px-0">
            <div class="card">
                <div class="card-header text-center">
                    <span><img class="img-fluid" src="/img/charge_diamond.png" width="25px;"></span>
                    <span>ダイヤモンド会員になる</span>
                </div>

                <div class="card-body">
                    <form id='j-payment-form' class="form-c" method="POST" action="{{ route('user.upgrade') }}">
                        @csrf

                        <div class="form-group form-group-stripe">
                            <p>クレジットカード情報を登録<p>
                        </div>
                        <div class="form-group form-group-stripe">
                            <p>お支払い方法	クレジットカード<p>
                            <p>動画は全て見放題となります！動画は毎月増えます！</p>
                            <p>※ 毎月自動的に決済されます。<br>※ 購入後、設定変更画面から自動更新を停止することもできます。</p>
                        </div>
                        <div class="form-group form-group-stripe mb-0 border-bottom-0">
                            <div class="form-group row">
                                <p class="col-md-4 col-form-label text-md-left">ダイヤモンド会員、月額/980円（税別）<p>
                            </div>
                            <div class="form-group row">
                                <label for="card_number" class="col-md-4 col-form-label text-md-right">クレジットカード番号</label>

                                <div class="col-md-6">
                                    <div id="card-element"></div>
                                    <div id="card-errors" role="alert" style="margin-top: .25rem; color: #dc3545;"></div>

                                    @if (!empty(session('error')))
                                        @foreach (session('error') as $error)
                                            <div id="card-errors" role="alert" style="margin-top: .25rem; color: #dc3545;">{{ $error }}</div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right"></label>

                                <div class="col-md-6">
                                    <span id='j-submit' type="btn" class="p-0" style="cursor: pointer;">
                                        <img class="img-fluid" src="/img/btn_charge.png" width="38%">
                                    </span>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <p class="card-text">※ 弊社からクレジットカード会社への請求が行なわれる時期は翌月中旬となります。<br>※ プレミアム会員利用規約に同意されたうえでご登録ください。</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
