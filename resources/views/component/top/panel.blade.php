@pc
    @include('component.layout.panel_youtube_pc')
@endpc
@sp
    @include('component.layout.panel_youtube_sp')
@endsp
@sp
    @if (!empty($youtube_link))
        <div class="box box-yt mb-0">
            @if (!empty($youtube_link))
                <div id="youtube_link_slideshow" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators carousel-indicators--round">
                    @foreach($youtube_link as $index => $item)
                        <li data-target="#youtube_link_slideshow" data-slide-to="{{ $index }}" class="@if ($index === 0) active @endif"></li>
                    @endforeach
                  </ol>
                  <div class="carousel-inner">
                    @foreach($youtube_link as $index => $item)
                    <div class="carousel-item @if ($index === 0) active @endif" https://player.vimeo.com/video/286278638>
                        @if ($item['type'] == YOUTUBE_TYPE_VIDEO)
                            <iframe class='youtube-video' width="100%" height="211" src="https://www.youtube.com/embed/{{ $item['youtube_id'] }}?enablejsapi=1&version=3&playerapiid=ytplayer" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        @elseif ($item['type'] == YOUTUBE_TYPE_VIMEO)
                            <iframe class='vimeo-video' src="https://player.vimeo.com/video/{{ $item['youtube_id'] }}?autoplay=1&loop=1&autopause=0&api=1&playsinline=0" width="100%" height="211" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        @elseif ($item['type'] == YOUTUBE_TYPE_IMAGE)
                            @php $path = $item['path'] ?? ''; @endphp
                            <a href='{{ $item['url'] }}'>
                                <img src="@media_path($path)" width="100%" height="211" />
                            </a>
                        @endif
                    </div>
                    @endforeach
                  </div>
                </div>
            @endif
        </div>
    @endif
@endsp

