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
        <div class='new_free_info'>
            <a href="{{ route('lesson_detail.detail', ['lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']]) }}" title="{{ $target['name'] }}" class="lesson_href">
                @if ($target['free_mode'] == constant('LESSON_DETAIL_FREE_MODE_FREE'))
                <img src='{{ asset('img/free.png') }}' width='40px' alt="無料" />
                @endif
                @if ($target['new_mode'] == constant('LESSON_DETAIL_NEW_MODE_NEW'))
                <img src='{{ asset('img/new.png') }}' width='40px' alt="NEW" />
                @endif
            </a>
        </div>
        @php $path = $target['posters'][0]['path'] ?? ''; @endphp
        <a href="{{ route('lesson_detail.detail', ['lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']]) }}" title="{{ $target['name'] }}" class="lesson_href" title="{{ $target['name'] }}" rel="nofollow">
        @if ($path)
            <img class="card-img-top card-img-video" src="@media_path($path)" alt="{{ $target['name'] }}">
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
            <p class="card-text card-text-name @pc mb-0 @endpc text-left">
                <a href="{{ route('lesson_detail.detail', ['lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']]) }}" title="{{ $target['name'] }}">{{ $target['name'] }}</a>
            </p>
            @pc
                <p class="card-text card-text-caption text-left">
                    {{ $target['caption'] }}
                </p>
            @endpc

            @if (empty($path))
                <p class="card-text mb-0">レッスンはまだありません。しばらくお待ちください。</p>
            @endif

            <p class="card-text">
                @if ($allow_access)
                    @if (!empty($target['popup']))
                        @php $model_id = 'modal_' . $target['lesson_id'] . $target['id']; @endphp
                        <a href="javascript:;" rel="nofollow" class="btn-sm bg-button-source-confirmation" data-toggle="modal" data-target="#{{ $model_id }}">ソース/素材</a>
                    @else
                        <a href="javascript:;" rel="nofollow" class="btn-sm bg-button-source-confirmation" data-toggle="modal" data-target=".no-lesson-modal-sm" style="opacity: .6;">ソース/素材</a>
                    @endif
                @else
                    <a href="javascript:;" rel="nofollow" class="btn-sm bg-button-source-confirmation" data-toggle="modal" data-target="#modal_request_login"  style="opacity: 0.6;">ソース/素材</a>
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
                        <a href="javascript:;" rel="nofollow" class="btn-sm {{ $css_class }}  j-lessonDetailCloseReopen"
                           data-href-close='{{ route('lesson_detail.close', ['lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']]) }}'
                           data-href-reopen='{{ route('lesson_detail.reopen', ['lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']]) }}'
                           data-action='{{ $target['is_closeable'] ? 'close' : 'reopen' }}'
                         >
                            {{ $text }}
                        </a>
                    @else
                        <a href="javascript:;" rel="nofollow" class="btn-sm {{ $css_class }}" style="opacity: .6;" data-toggle="modal" data-target="#modal_request_deny">
                            {{ $text }}
                        </a>
                    @endif
                @else
                    <a href="javascript:;" rel="nofollow" class="btn-sm bg-button-to-complete" style="opacity: .6;" data-toggle="modal" data-target="#modal_request_deny">完了する</a>
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
