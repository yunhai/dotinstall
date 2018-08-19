@pc
    @include('component.layout.panel_youtube_pc')
@endpc
@sp
    @include('component.layout.panel_youtube_sp')
@endsp
@sp
    @if (!empty($youtube_link))
		<div class="box box-yt mb-0">
			<iframe width="100%" height="211px" src="https://www.youtube.com/embed/{{ $youtube_link['youtube_id'] }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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
@include('component.modal.request_deny', ['modal_id' => 'modal_request_deny'])