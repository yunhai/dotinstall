<div class="col-lesson col-lg-3 col-md-3 col-sm-6">
    <div class="card">
        @php
        @endphp
        @if ($target['free_mode'] == constant('LESSON_DETAIL_FREE_MODE_FREE'))
          <img class="pickup" src="/img/pickup.png">
        @endif
        @php $path = $target['posters'][0]['path'] ?? ''; @endphp
        @normal_user
            @if ($target['free_mode'] == constant('LESSON_DETAIL_FREE_MODE_FREE'))
                <a href="{{ route('lesson_detail.detail', ['lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']]) }}" title='{{ $target['name'] }}'>
            @else
                <a href="{{ route('user.upgrade') }}" onclick="return confirm('ダイヤモンド会員をなりますか？');">
            @endif
        @else
            <a href="{{ route('lesson_detail.detail', ['lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']]) }}" title='{{ $target['name'] }}'>
        @endnormal_user
        @if ($path)
            <img class="card-img-top card-img-video" src="@media_path($path)">
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
            <p class="card-text card-text-name text-left">{{ $target['name'] }}</p>
            @if (empty($path))
                <p class="card-text">レッスンはまだありません。しばらくお待ちください。</p>
            @endif
            @if (Auth::check() && Auth::user()->role == constant('USER_ROLE_PUBLIC'))
                @if (!empty($target['popup']))
                    @php $model_id = 'modal_' . $target['lesson_id'] . $target['id']; @endphp
                    <p class="card-text mb-1">
                        <a href="javascript:;" class="btn btn-sm btn-request" data-toggle="modal" data-target="#{{ $model_id }}">
                            <img class="card-img-top btn-sorce-conformation" src="/img/btn_sorce_conformation.png">
                        </a>
                    </p>
                @else
                    <p class="card-text mb-1">
                        <a href="" onclick="return confirm('このレッスンにはソースコードはありません。');" class="btn btn-sm btn-request" >
                            <img class="card-img-top btn-sorce-conformation" src="/img/btn_sorce_conformation.png">
                        </a>
                    </p>
                @endif
                @if (!empty($target['is_closeable']))
                    <a href="{{ route('lesson_detail.close', ['lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']]) }}" class="btn btn-sm btn-request">
                        <img class="card-img-top btn-to-complete" src="/img/btn_to_complete.png">
                    </a>
                @else
                    <a href="" class="btn btn-sm btn-request">
                        <img class="card-img-top btn-to-complete" src="/img/btn_completion.png">
                    </a>
                @endif
            @else
                <p class="card-text mb-1">
                    <a href="{{ route('login') }}" class="btn btn-sm btn-request">
                        <img class="card-img-top btn-sorce-conformation" src="/img/btn_sorce_conformation.png">
                    </a>
                </p>
                <a href="{{ route('login') }}" class="btn btn-sm btn-request">
                    <img class="card-img-top btn-to-complete" src="/img/btn_to_complete.png">
                </a>
            @endif
        </div>
    </div>
</div>

@if($loop->iteration % 5 == 0 && $loop->count > 5)
    <div class="container-fluid">
        <div class="divider"></div>
    </div>
@endif

@if (Auth::check() && Auth::user()->role == constant('USER_ROLE_PUBLIC'))
    @if (!empty($target['popup']))
        @include('component.modal.ace', ['modal_id' => $model_id, 'resources' => $target['resources'], 'content' => $target['source_code_contents'], 'lesson_id' => $target['lesson_id'], 'lesson_detail_id' => $target['id']])
    @endif
@endif
