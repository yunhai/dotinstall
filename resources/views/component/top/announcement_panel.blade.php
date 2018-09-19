<div id="notice-content">
    <div class="box mb-0">
        <div class="heading">
            <span>【お知らせ】</span>
        </div>
        <div class="row noitce-content">
            <div class="col-sm-8">
                @if ($announcement)
                @foreach ($announcement as $item)
                <div class="row">
                    <div class="col-sm-2">
                        @php
                            echo Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item['post_date'])
                                    ->format('Y/m/d');
                        @endphp
                    </div>
                    <div class="col-sm-9 announcement--content" data-toggle="tooltip" data-placement="bottom" title="{{ $item['content'] }}">
                        {{ $item['content'] }}
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="col-sm-4 right">
                @if ($ad)
                <a href="{{ $ad['link'] }}" title="{{ $ad['name'] }}">
                    @php $path = $ad['media']['path']; @endphp
                    <img src="@media_path($path)" alt="{{ $ad['name'] }}" width="100%" />
                </a>
                @endif
            </div>
        </div>
    </div>
</div>