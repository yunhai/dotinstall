<div class="card">
	<div class="card-header text-center">次のレッスン</div>
	<div class="card-body">
		@foreach ($lesson_details as $target)
			<div class="@sp col-sm-6 @endsp">
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
			        <div class="card-body text-center">
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