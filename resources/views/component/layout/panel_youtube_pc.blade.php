<div class="box box-panel mb-0">
    <div class="card">
        <img class="card-img card-img-panel" src="/img/panel.jpg">
        <div class="card-img-overlay px-5">
            <div class="card-body" @pc style="padding-top: .5rem; padding-left: 70px; padding-right: 70px;" @endpc>
                <h5 class="card-text card-text-header text-center font-weight-bold mb-0">{{ $global_setting['slogan'] }}</h5>
                <div class="row @pc align-items-end @endpc">
                    <!-- <div class="pc-card-sign card-sign p-0" id="pc-panel-left">
                        <p class="card-text card-text-sign">無料レッスンもいっぱいご用意！</p>
                        <p class="card-text card-text-sign last">何も考えずに真似して作って見よう！</p>
                        <a href="{{ route('register') }}" class="card-sign-button">新規登録はこちら！</a>
                    </div> 
                id="pc-panel-right"
                    -->
                    <div class="card-video px-0" style='width: 520px; height: 260px ;display: block; margin: auto;'>
                        @if (!empty($youtube_link))
                            <div id="youtube_link_slideshow" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators carousel-indicators--round">
                                @foreach($youtube_link as $index => $item)
                                    <li data-target="#youtube_link_slideshow" data-slide-to="{{ $index }}" class="@if ($index === 0) active @endif"></li>
                                @endforeach
                              </ol>
                              <div class="carousel-inner">
                                @foreach($youtube_link as $index => $item)
                                <div class="carousel-item @if ($index === 0) active @endif">
                                    @if ($item['type'] == YOUTUBE_TYPE_VIDEO)
                                        <iframe width="520" height="260" src="https://www.youtube.com/embed/{{ $item['youtube_id'] }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    @elseif ($item['type'] == YOUTUBE_TYPE_VIMEO)
                                        <iframe width="520" height="260" src="https://player.vimeo.com/video/{{ $item['youtube_id'] }}?autoplay=1&loop=1&autopause=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                    @elseif ($item['type'] == YOUTUBE_TYPE_IMAGE)
                                        @php $path = $item['path'] ?? ''; @endphp
                                        <a href='{{ $item['url'] }}'>
                                            <img src="@media_path($path)" width="520" height="260" />
                                        </a>
                                    @endif
                                </div>
                                @endforeach
                              </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>