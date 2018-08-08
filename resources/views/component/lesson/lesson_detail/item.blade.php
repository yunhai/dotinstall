<div class="col-lesson col-lesson-item col-sm-6">
    <div class="card">
        @if ($target['free_mode'] == constant('LESSON_DETAIL_FREE_MODE_FREE'))
          <img class="pickup" src="/img/pickup.png">
        @endif
        @php $path = $target['posters'][0]['path'] ?? ''; @endphp
        @normal_user
            @if ($target['free_mode'] == constant('LESSON_DETAIL_FREE_MODE_FREE'))
                <a href="{{ route('lesson_detail.detail', ['lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']]) }}" title='{{ $target['name'] }}' class="lesson_href">
            @else
                <a href="javascript:;" data-toggle="modal" data-target=".user-upgrade-modal-sm" class="lesson_href">
            @endif
        @else
            <a href="{{ route('lesson_detail.detail', ['lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']]) }}" title='{{ $target['name'] }}' class="lesson_href">
        @endnormal_user
        @if ($path)
            <img class="card-img-top card-img-video" src="@media_path($path)">
            <span class="play-btn"><i class="fa fa-play"></i></span>
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
        <div class="card-body text-center pl-0 pr-0">
            <p class="card-text card-text-name @pc mb-0 @endpc text-left">{{ $target['name'] }}</p>
            @if (empty($path))
                <p class="card-text mb-0">レッスンはまだありません。しばらくお待ちください。</p>
            @endif
            @if (Auth::check() && Auth::user()->role == constant('USER_ROLE_PUBLIC'))
                @if (!empty($target['popup']))
                    @php $model_id = 'modal_' . $target['lesson_id'] . $target['id']; @endphp
                    <p class="card-text mar_b8">
                        <a href="javascript:;" class="btn-sm bg-button-source-confirmation" data-toggle="modal" data-target="#{{ $model_id }}">ソース確認
                        </a>
                    </p>
                @else
                    <p class="card-text mar_b8">
                        <a href="javascript:;" class="btn-sm bg-button-source-confirmation" data-toggle="modal" data-target=".no-lesson-modal-sm">ソース確認
                        </a>
                    </p>
                @endif
                @if (!empty($target['is_closeable']))
                    <a href="{{ route('lesson_detail.close', ['lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']]) }}" class="btn-sm bg-button-to-complete">
                        完了する
                    </a>
                @else
                    <a href="{{ route('lesson_detail.reopen', ['lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']]) }}" class="btn-sm bg-button-complete">
                        完了
                    </a>
                @endif
            @else
                <p class="card-text mar_b8">
                    <a href="{{ route('login') }}" class="btn-sm bg-button-source-confirmation">ソース確認
                    </a>
                </p>
                <a href="{{ route('login') }}" class="btn-sm bg-button-to-complete">完了する
                </a>
            @endif
        </div>
    </div>
</div>
@if($loop->iteration % 4 == 0 && $loop->count > 4 && $loop->last != $loop->count )
	<div class="container-fluid container-divider">
		<div class="divider"></div>
	</div>
@endif
@if (Auth::check() && Auth::user()->role == constant('USER_ROLE_PUBLIC'))
    @if (!empty($target['popup']))
        @include('component.modal.ace', ['modal_id' => $model_id, 'resources' => $target['resources'], 'content' => $target['source_code_contents'], 'lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']])
    @endif
@endif
<div class="modal fade no-lesson-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content rounded-0" style="height: auto;">
			<div class="modal-body">
				<p class="mb-0">このレッスンにはソースコードはありません。</p>
			</div>
			<div class="modal-footer" style="padding: 0; justify-content:center;">
				<a href="javascript:;" class="btn" data-dismiss="modal" aria-label="Close">OK</a>
			</div>
		</div>
	</div>
</div>
<div class="modal fade user-upgrade-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content rounded-0" style="height: auto;">
			<div class="modal-body">
				<p class="mb-0">月額会員をなりますか？</p>
			</div>
			<div class="modal-footer" style="padding: 0;">
				<a href="javascript:;" class="btn" data-dismiss="modal" aria-label="Close">閉じる</a>
				<a href="{{ route('user.upgrade') }}" class="btn">OK</a>
			</div>
		</div>
	</div>
</div>