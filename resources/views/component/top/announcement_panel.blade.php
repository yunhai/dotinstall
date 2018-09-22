<div id="notice-content">
    <div class="box mb-0">
        <div class="notice-content--announcement">
            <div class="heading">
                <span>[お知らせ]</span>
            </div>
            <div class="content--announcement">
            @if ($announcement)
            @foreach ($announcement as $item)
                <div class='announcement--date'>{{ $item['post_date'] }}&nbsp;</div>
                <div class="announcement--content" data-toggle="tooltip" data-placement="bottom" title="{{ $item['content'] }}">
                    {{ $item['content'] }}
                </div>
            @endforeach
            @endif
            </div>
        </div>
        <div class="notice-content--ad">
            @if ($ad)
                @if ($ad['type'] == constant('AD_TYPE_IMAGE'))
                <a href="{{ $ad['link'] }}" title="{{ $ad['name'] }}">
                    @php $path = $ad['media']['path']; @endphp
                    <img src="@media_path($path)" alt="{{ $ad['name'] }}" class="notice-content--ad__img" />
                </a>
                @else
                    {!! $ad['link'] !!}
                @endif
            @endif
        </div>
        <div class='clearfix'></div>
    </div>
</div>