<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="height: 100%;">
        <div class="modal-content" style="height: auto;">
            <div class="modal-header">
                <button type="button" class="close mr-auto" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">閉じる</span>
                </button>
				<span class="modal-title mr-auto text-white">題名</span>
            </div>
			<div class="modal-body">
				素材ダウンロード<button type="button" class="btn btn-sm btn-download ml-5">素材ダウンロードする</button>
				<hr style="border-color: #837f80;">
			</div>
			<ul class="nav nav-tabs border-bottom-0" id="myTabSource" role="tablist">
			@foreach($content as $item)
				<li class="nav-item mb-0">
					<a class="nav-link @if ($loop->first) active @endif" id="source-{{ $item['id'] }}-tab" data-toggle="tab" href="#{{ $item['id'] }}" role="tab" aria-controls="home" aria-selected="true">{{ $item['filename'] }}</a>
				</li>
			@endforeach  
			</ul>
			<div class="tab-content" id="myTabSourceContent">
				@foreach($content as $item)
					<div class="tab-pane fade show @if ($loop->first) active @endif" id="{{ $item['id'] }}" role="tabpanel" aria-labelledby="source-{{ $item['id'] }}-tab">
						<div class="modal-body" style="height: 480px;">
							<div class='ace__item'>
								<div class='ace__item--body' data-id='ace_edit_{{ $item['id'] }}' data-language='{{ $item['language'] }}'>
									<div id='ace_edit_{{ $item['id'] }}' class='ace__item--editor'>
										{!! $item['content'] !!}
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach  
			</div>
        </div>
    </div>
</div>