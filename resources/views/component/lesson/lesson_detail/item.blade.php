@php
    $allow_access = $target['free_mode'] == constant('LESSON_DETAIL_FREE_MODE_FREE') ||
                    (Auth::check() && Auth::user()->grade == USER_GRADE_DIAMOND);
    $redirect = route('login');
    if (Auth::check()) {
        if (Auth::user()->grade == USER_GRADE_NORMAL) {
            $redirect = route('user.upgrade');
        }
    }
@endphp
<div class="col-lesson col-lesson-item col-sm-6">
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
        <div class="card-body text-center pl-0 pr-0">
            <p class="card-text card-text-name @pc mb-0 @endpc text-left">{{ $target['name'] }}</p>

            @if (empty($path))
                <p class="card-text mb-0">レッスンはまだありません。しばらくお待ちください。</p>
            @endif

            <p class="card-text">
                @if ($allow_access)
                    @if (!empty($target['popup']))
                        @php $model_id = 'modal_' . $target['lesson_id'] . $target['id']; @endphp
                        <a href="javascript:;" class="btn-sm bg-button-source-confirmation" data-toggle="modal" data-target="#{{ $model_id }}">ソース/素材</a>
                    @else
                        <a href="javascript:;" class="btn-sm bg-button-source-confirmation" data-toggle="modal" data-target=".no-lesson-modal-sm" style="opacity: .6;">ソース/素材</a>
                    @endif
                @else
                    <!--<a href="{{ $redirect }}" class="btn-sm bg-button-source-confirmation">ソース/素材</a>-->
                    <a href="javascript:;" id="modal_request_login" class="btn-sm bg-button-source-confirmation" data-toggle="modal" data-target=".user-login-modal-sm">ソース/素材</a>
                @endif

                @if (Auth::check())
                    @php
                        if ($target['is_closeable']) {
                            $text = '完了する';
                            $css_class = 'bg-button-to-complete';
                        } else {
                            $text = '完了';
                            $css_class = 'bg-button-complete';
                        }
                    @endphp
                    @if ($allow_access)
                        <a href="javascript:;" class="btn-sm {{ $css_class }}  j-lessonDetailCloseReopen"
                           data-href-close='{{ route('lesson_detail.close', ['lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']]) }}'
                           data-href-reopen='{{ route('lesson_detail.reopen', ['lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']]) }}'
                           data-action='{{ $target['is_closeable'] ? 'close' : 'reopen' }}'
                         >
                            {{ $text }}
                        </a>
                    @else
                        <a href="{{ $redirect }}" class="btn-sm {{ $css_class }}">
                            {{ $text }}
                        </a>
                    @endif
                @else
                    <a href="javascript:;" id="modal_video_deny" class="btn-sm bg-button-to-complete" style="opacity: .6;" data-toggle="modal" data-target=".user-upgrade-modal-sm">完了する</a>
                @endif
            </p>
        </div>
    </div>
</div>
@pc
    @if($loop->iteration % 4 == 0 && $loop->count > 4 && $loop->last != $loop->count )
        <div class="container-fluid container-divider">
            <div class="divider"></div>
        </div>
    @endif
@endpc
@if ($allow_access)
    @if (!empty($target['popup']))
        @include('component.modal.ace', ['modal_id' => $model_id, 'resources' => $target['resources'], 'resources_item' => $target['resources_item'] ?? [],  'content' => $target['source_code_contents'], 'lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']])
    @endif
@endif
@if (empty(Auth::check()))
    @include('component.modal.video_deny', ['modal_id' => 'modal_video_deny'])
    @include('component.modal.request_login', ['modal_id' => 'modal_request_login'])
@endif
