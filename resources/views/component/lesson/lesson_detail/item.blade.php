@php
$allow_access = $target['free_mode'] == constant('LESSON_DETAIL_FREE_MODE_FREE') || 
                (Auth::check() && Auth::user()->grade == USER_GRADE_DIAMOND);
@endphp
<div class="col-lesson col-lesson-item col-sm-6">
    <div class="card">
        @if ($target['free_mode'] == constant('LESSON_DETAIL_FREE_MODE_FREE'))
          <img class="pickup" src="/img/pickup.png">
        @endif
        @php $path = $target['posters'][0]['path'] ?? ''; @endphp
        <a href="{{ route('lesson_detail.detail', ['lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']]) }}" title='{{ $target['name'] }}' class="lesson_href">
        @if ($path)
            <img class="card-img-top card-img-video" src="@media_path($path)">
            <img class="play-btn" src="/img/play_mark.png">
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
            @if (Auth::check())
                <p class="card-text">
                    @if ($allow_access)
                        @if (!empty($target['popup']))
                            @php $model_id = 'modal_' . $target['lesson_id'] . $target['id']; @endphp
                            <a href="javascript:;" class="btn-sm bg-button-source-confirmation" data-toggle="modal" data-target="#{{ $model_id }}">ソース確認</a>
                        @else
                            <a href="javascript:;" class="btn-sm bg-button-source-confirmation" data-toggle="modal" data-target=".no-lesson-modal-sm" style="opacity: .6;">ソース確認</a>
                        @endif
                    @else
                        <a href="{{ route('user.upgrade') }}" class="btn-sm bg-button-source-confirmation">ソース確認</a>
                    @endif

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
                        <a href="{{ route('user.upgrade') }}" class="btn-sm {{ $css_class }} ">
                            {{ $text }}
                        </a>
                    @endif
                </p>
            @else
                <p class="card-text">
                    <a href="{{ route('login') }}" class="btn-sm bg-button-source-confirmation">ソース確認</a>
                    <a href="{{ route('login') }}" class="btn-sm bg-button-to-complete">完了する</a>
                </p>
            @endif
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
@if (Auth::check() && $allow_access)
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
