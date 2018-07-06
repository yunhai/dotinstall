<div class="col-lesson col-lg-3 col-md-3 col-sm-6">
    <div class="card">
        @if ($row['free_mode'] == constant('LESSON_DETAIL_FREE_MODE_FREE'))
          <img class="pickup" src="/img/pickup.png">
        @endif
        @php $path = $row['posters'][0]['path'] ?? ''; @endphp
        <a href="{{ route('lesson_detail', ['lesson_id' => $row['lesson_id'], 'lesson_detail_id' => $row['id']]) }}" title='{{ $row['name'] }}'>
        @if ($path)
            <img class="card-img-top card-img-video" src="@media_path($path)">
        @else
            @php
                $path = '';
                if (!empty($row['videos'])) {
                    $path = current($row['videos'])['path'];
                }
            @endphp
            @if ($path)
            <span class='j-captureVideo' data-url="@media_path($path)"></span>
            @endif
        @endif
        </a>
        <div class="card-body text-center pl-0 pr-0">
            <p class="card-text text-left">{{ $row['name'] }}</p>
            <p class="card-text mb-1">
                <a href="#" class="btn btn-sm btn-request">
                    <img class="card-img-top btn-to-complete" src="/img/btn_to_complete.png">
                </a>
            </p>
            <p class="card-text">
                <a href="#" class="btn btn-sm btn-request">
                    <img class="card-img-top btn-sorce-conformation" src="/img/btn_sorce_conformation.png">
                </a>
            </p>
        </div>
    </div>
</div>
