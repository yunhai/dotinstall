@extends('layout.master')
@section('title', 'プログラミングＧＯ')
@push('css')
    <link rel="stylesheet" href="/css/payment.css">
@endpush

@push('js')
    <script src="https://js.stripe.com/v3/"></script>
    <script>var STRIPE_KEY = "{{ config('services.stripe.key') }}";</script>
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
                          <p class="mb-0">月額会員になりました。<br>ありがとうございました！</p>
                      </div>
                      <div class="modal-footer" style="padding: 0; justify-content:center;">
                          <a href="{{ route('top') }}" class="btn">OK</a>
                      </div>
                  </div>
              </div>
        </div>
    @endif
    <script type="text/javascript">
		$('#agree').change(function() {
	        if ($(this).is(":checked")) {
	            $("#j-submit").css("cursor", "pointer");
	            $("#j-submit").css("opacity", "1");
	        } else {
		        $("#j-submit").css("cursor", "auto");
	            $("#j-submit").css("opacity", "0.6");
	        }    
	    });
    </script>
@endpush
@section('breadcrumbs', Breadcrumbs::render('user.upgrade'))

@section('content')
<div id="content">
    <div class="box ttlCommon mb-0 px-5">マイページ</div>
    <div class="box-user mar_t20 mar_b20 px-5">
        <div class="col-12 mar_b20 px-0">
            <div class="card">
                <div class="card-header card-header-upgrade">
                    <span class="mr-1 text-center"><img class="img-fluid" src="/img/charge_diamond.png" width="25px;"></span>
                    <span style="margin-bottom: -3px;">月額会員になる</span>
                </div>

                <div class="card-body">
                    <form id='j-payment-form' class="form-c" method="POST" action="{{ route('user.upgrade') }}">
                        @csrf

                        <div class="form-group form-group-stripe">
                            <p>クレジットカード情報を登録<p>
                        </div>
                        <div class="form-group form-group-stripe">
                            <p>お支払い方法    クレジットカード<p>
                            <p>動画は全て見放題となります！</p>
                            <p>※ 毎月自動的に決済されます。<br>※ 購入後、設定変更画面から自動更新を停止することもできます。</p>
                        </div>
                        <div class="row border-bottom-0 justify-content-center @pc mx-auto @endpc mb-0">
                            <div class="@pc col-8 @endpc @sp col-12 px-0 @endsp">
                                <label for="card_number" class="col col-form-label">クレジットカード番号</label>

                                <div class="col">
                                    <div class='container' id='card-holder'>
                                        <div class='row' @sp style="padding-bottom:2px" @endsp>
                                            <div id="card-number" class='@pc col-5 @endpc @sp col-7 @endsp card-element' @sp style="flex:0 0 60%; max-width:60%;" @endsp></div>
                                            <div id="card-expiry" class='col-3 card-element'></div>
                                            <div id="card-cvc" class='col card-element' @pc style="max-width:90%; padding-left: 55px;" @endpc @sp style="padding-right:5px;padding-left: 3px;" @endsp></div>
                                        </div>
                                    </div>
                                    <div id="card-errors" role="alert" style="margin-top: .25rem; color: #dc3545;"></div>
                                    @if (!empty(session('error')))
                                        @foreach (session('error') as $error)
                                            <div id="card-errors" role="alert" style="margin-top: .25rem; color: #dc3545;">{{ $error }}</div>
                                        @endforeach
                                    @endif
                                </div>
                                <label for="card_number" class="col col-form-label">※ 半角数字で入力</label>
                            </div>
                            <div class="row @pc col-8 @endpc @sp col-12 @endsp justify-content-center mx-auto">
                                <div class="@pc col-5 @endpc @sp col-8 @endsp">
                                    <img class="img-fluid" src="/img/charge.png" width="100%">
                                </div>
                            </div>
                            <div class="row @pc col-8 @endpc @sp col-12 @endsp justify-content-center mx-auto">
                                <div class="@pc col-5 @endpc @sp col-12 text-center @endsp">
                                    ※ デビットカードご利用可能です。
                                </div>
                            </div>
                            <div class="row @pc col-8 @endpc @sp col-12 @endsp justify-content-center mx-auto mar_t10">
                                <div class="col text-center">
                                     ※ 有料会員利用規約に同意されたうえでご登録ください。
                                </div>
                            </div>
                            <div class="row @pc col-8 @endpc @sp col-12 @endsp justify-content-center mx-auto mar_t10 mar_b20">
                                <div class="col text-center">
									 	<div class="form-check">
									    	<input type="checkbox" class="form-check-input" id="agree">
											<label class="form-check-label" for="agree">有料会員利用規約<a target="_blank" href="{{ route('terms') }}">に同意</a></label>
									  </div>
                                </div>
                            </div>
                            <div class="row @pc col-8 @endpc @sp col-12 @endsp justify-content-center mx-auto">
                                <div class="@pc col-5 @endpc @sp col-8 @endsp text-center">
                                    <span id='j-submit' type="btn" class="p-0" style="opacity: 0.6">
                                        <img class="img-fluid" src="/img/bg_button_charge.png" width="100%">
                                        <span class="button-charge centered">月額会員に登録する</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
