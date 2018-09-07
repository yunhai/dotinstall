@pc
    @include('component.layout.panel_youtube_pc')
@endpc
@sp
    @include('component.layout.panel_youtube_sp')
@endsp
@sp
    @if (!empty($youtube_link))
        <div class="box box-yt mb-0">
            @if ($youtube_link['type'] == YOUTUBE_TYPE_VIDEO)
                <iframe width="100%" height="211px" src="https://www.youtube.com/embed/{{ $youtube_link['youtube_id'] }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            @elseif ($youtube_link['type'] == YOUTUBE_TYPE_IMAGE)
                <div id="youtube_link_slideshow" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators carousel-indicators--round">
                    @foreach($youtube_link['slideshow'] as $index => $item)
                        <li data-target="#youtube_link_slideshow" data-slide-to="{{ $index }}" class="@if ($index === 0) active @endif"></li>
                    @endforeach
                  </ol>
                  <div class="carousel-inner">
                    @foreach($youtube_link['slideshow'] as $index => $item)
                    <div class="carousel-item @if ($index === 0) active @endif">
                        @php $path = $item['path'] ?? ''; @endphp
                        <a href='{{ $item['url'] }}'>
                            <img src="@media_path($path)" width="100%" height="211" />
                        </a>
                    </div>
                    @endforeach
                  </div>
                </div>
            @endif
        </div>
    @endif
@endsp
@pc
    @if (Auth::check() == false)
        @include('component.layout.panel_language_pc')
    @endif
    @normal_user
        @include('component.layout.panel_language_pc')
    @endnormal_user
@endpc
@sp
    @if (Auth::check() == false)
        @include('component.layout.panel_language_sp')
    @endif
    @normal_user
        @include('component.layout.panel_language_sp')
    @endnormal_user
@endsp