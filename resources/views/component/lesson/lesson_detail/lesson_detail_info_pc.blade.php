<div class="col-9 pr-0" style="border-right: 1px solid #bca9af;">
	@php $padding_0 = ''; @endphp
	@if (empty($resources_item))
		@php
			$padding_0 = 'pt-0';
		@endphp
	@endif
	<div class="tab-content tab-content-resource {{ $padding_0 }}" id="{{ $modal_id }}">
		@if ($allow_access)
			@if (!empty($resources_item))
				<div class="row-resource pt-0" style="border-bottom: 1px solid #bca9af;">
					<div class="col">
						<a href="{{ route('lesson_detail.resource.download', compact('lesson_id', 'lesson_detail_id')) }}" class="btn btn-download-resource">素材を一括ダウンロードする</a>
					</div>
				</div>
				<div class="container-fluid">
					<div class="row row-resource px-5" @if (empty($content)) style="padding-bottom: 0px;" @endif>
						@foreach($resources_item as $res)
							@php
			            		$media_id = $res['id']; 
			            		$path = $res['path'];
			            	@endphp
							<div class="col-thumbnail-2">
								<div class="card">
									<img class="img-thumbnail" src="@media_path($path)" style="height: 78px">
									<div class="card-body pl-1 pr-1 pt-1 pb-1">
										<p class="card-text text-center"><a href="{{ route('media.download', $media_id) }}">ダウンロード</a></p>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			@endif
		@else
			<div class="row-resource">
				<div class="col">
					<a href="javascript:;" class="btn btn-download-resource">素材を一括ダウンロードする</a>（有料会員になるとダウンロードできます。）
				</div>
			</div>
		@endif
		@if ($allow_access)
			@if ($content)
				@foreach($content as $item)
					<div class="tab-pane-resource">
						<div class="resource-primary">{{ $item['filename'] }}</div>
						<div class="tab-pane fade show active" id="{{ $item['id'] }}" role="tabpanel">
							<div class="modal-body" style="height: 500px;">
				                <div class='ace__item'>
				                    <div class='ace__item--body' data-id='ace_edit_{{ $item['id'] }}' data-language='{{ $item['language'] }}'>
				                        <div id='ace_edit_{{ $item['id'] }}' class='ace__item--editor'>{!! ($item['content']) !!}</div>
				                    </div>
				                </div>
				            </div>
						</div>
					</div>
				@endforeach
			@else
				<div class="tab-pane-resource" style="border-top: 1px solid #bca9af; margin-top: 20px;">
					<div class="tab-pane fade show active" role="tabpanel">
						<div class="modal-body">
			                <p class="text-center">このレッスンにはソースコードありません</p>
			            </div>
					</div>
				</div>
			@endif
		@else
			<div class="tab-pane-resource">
				<div class="resource-primary">ソースコード</div>
				<div class="tab-pane fade show active" role="tabpanel">
					<div class="modal-body">
		                <p>ソースコードは有料会員になると表示されます。</p>
		                <p>
			                <a href="{{ route('register.diamond') }}">有料会員になる</a>
		                </p>
		            </div>
				</div>
			</div>
		@endif
	</div>
</div>
<div class="col-3 pl-0">
    <div class="card">
	    <div class="card-header text-center">レッスン一覧</div>
	    <div class="card-body">
	        @foreach ($lesson_details as $target)
	            <div class="col-lesson mt-0 @sp col-sm-6 @endsp">
	                <div class="card">
	                    @if ($target['free_mode'] == constant('LESSON_DETAIL_FREE_MODE_FREE'))
	                        <span class="pickup">無料</span>
	                    @endif
	                    @php $path = $target['posters'][0]['path'] ?? ''; @endphp
	                    <a href="{{ route('lesson_detail.detail', ['lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']]) }}" title="{{ $target['name'] }}" class="lesson_href">
	                    @if ($path)
	                        <img class="card-img-top card-img-video" src="@media_path($path)">
	                        <span class="play-btn">
	                            <svg height="100%" version="1.1" viewBox="0 0 68 48" width="100%"><path class="ytp-large-play-button-bg" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z" fill="#212121" fill-opacity="0.8"></path><path d="M 45,24 27,14 27,34" fill="#fff"></path></svg>
	                        </span>
	                    @else
	                        @php
	                            $path = '';
	                            if (!empty($target['videos'])) {
	                                $path = current($target['videos'])['path'];
	                            }
	                        @endphp
	                        @if ($path)
	                        <span class='j-captureVideo' data-url="@media_path($path)"></span>
	                        @endif
	                    @endif
	                    </a>
	                    <div class="card-body text-center pl-0 pr-0 pb-0" style="padding-top:10px;">
	                        <p class="card-text card-text-name @pc mb-0 @endpc text-left">{{ $target['name'] }}</p>
	
	                        @if (empty($path))
	                            <p class="card-text mb-0">レッスンはまだありません。しばらくお待ちください。</p>
	                        @endif
	                    </div>
	                </div>
	            </div>
	        @endforeach
	    </div>
	</div>
</div>