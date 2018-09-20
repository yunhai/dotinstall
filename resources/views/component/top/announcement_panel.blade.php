<div id="notice-content">
    <div class="box mb-0">
        <div class="heading">
            <span>【お知らせ】</span>
        </div>
        <div class="notice-content">
            <div class="notice-content--announcement">
                @if ($announcement)
                @foreach ($announcement as $item)
                    <div class='announcement--date'>{{ $item['post_date'] }}&nbsp;</div>
                    <div class="announcement--content" data-toggle="tooltip" data-placement="bottom" title="{{ $item['content'] }}">
                        {{ $item['content'] }}
                    </div>
                @endforeach
                @endif
            </div>
            <div class="notice-content--ad">
                @if ($ad)
                <a href="{{ $ad['link'] }}" title="{{ $ad['name'] }}">
                    @php $path = $ad['media']['path']; @endphp
                    <img src="@media_path($path)" alt="{{ $ad['name'] }}" class="notice-content--ad__img" />
                </a>
                @endif
            </div>
        </div>
    </div>
</div>