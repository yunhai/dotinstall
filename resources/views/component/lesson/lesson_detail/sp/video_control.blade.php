<div class="col-12 pl-0 pr-0">
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
            <a href="javascript:;" class="btn-sm {{ $css_class }}" data-toggle="modal" data-target="#modal_request_deny">
                {{ $text }}
            </a>
        @endif
    @else
        <a href="javascript:;" class="btn-sm bg-button-to-complete" style="opacity: .6;" data-toggle="modal" data-target="#modal_request_deny">完了する</a>
    @endif

    @unlogin
        <a href="{{ route('register.diamond') }}" class="btn-sm bg-button-user-diamond">
            <img class="img-fluid" src="/img/charge_diamond.png" width="16px;">
            <span>月額会員に登録する</span>
        </a>
    @endunlogin
    @normal_user
        <a href="{{ route('user.upgrade') }}" class="btn-sm bg-button-user-diamond">
            <img class="img-fluid" src="/img/charge_diamond.png" width="16px;">
            <span>月額会員に登録する</span>
        </a>
    @endnormal_user

    <a href="javascript:;" id='j-changeMale' class='lesson_detail--voice lesson_detail--voice__male j-switchVoice active'>
        男性ボイス
    </a>

    @if ($target['url_female'])
    <a href="javascript:;" class='lesson_detail--voice lesson_detail--voice__female j-switchVoice'
          @if ($female_voice)
            id='j-changeFemale'
          @else
            data-toggle="modal" data-target="#modal_request_female_voice"
          @endif
     >
        女性ボイス
    </a>
    @endif

    @if ($prev_video)
    <a class="btn-sm bg-button-paginate" href="{{ route('lesson_detail.detail', ['lesson_id' => $prev_video['lesson_id'], 'lesson_detail_id' => $prev_video['id']]) }}" title="{{ $prev_video['name'] }}">
        前の動画
    </a>
    @endif
    @if ($next_video)
    <a class="btn-sm bg-button-paginate" href="{{ route('lesson_detail.detail', ['lesson_id' => $next_video['lesson_id'], 'lesson_detail_id' => $next_video['id']]) }}" title="{{ $next_video['name'] }}">
        次の動画
    </a>
    @endif
</div>