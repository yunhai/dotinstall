<div id="notice-content">
    <div class="box mb-0">
        <div class="notice-content--announcement">
            <div class="heading w-100 d-flex">
                <div class="col-5 text-left">[お知らせ]</div>
                <div class="col-7 text-right">レッスン一覧 {{ $global_setting['total_enable_lesson'] }}レッスン　{{ $global_setting['total_enable_video'] }}本の動画で提供中</div>
            </div>
            <div class="content--announcement">
            @if ($announcement)
            @foreach ($announcement as $item)
                <div style="border-bottom:solid 1px #e9e9e9; margin-top: 8px;">
                    <div class='announcement--date'>{{ $item['post_date'] }}&nbsp;</div>
                    <div class="announcement--content" data-toggle="tooltip" data-placement="bottom" title="{{ $item['content'] }}">
                        {{ $item['content'] }}
                    </div>
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