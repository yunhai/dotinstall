<div class="tab-content">
	@if (!empty($resources_item))
		<div class="row row-resource">
			<div class="col">
				<a href="{{ route('lesson_detail.resource.download', compact('lesson_id', 'lesson_detail_id')) }}" class="btn btn-sm btn-download btn--resource">素材を一括ダウンロードする</a>
			</div>
		</div>
		<div class="container-fluid" style="border-top: 1px solid #bca9af;"></div>
		<div class="row row-resource">
			@foreach($resources_item as $res)
				@php
            		$media_id = $res['id']; 
            		$path = $res['path'];
            	@endphp
				<div class="col-2">
					<div class="card">
						<img class="img-thumbnail" src="@media_path($path)" style="height: 78px;">
						<div class="card-body pl-1 pr-1 pt-0 pb-0">
							<p class="card-text text-center"><a href="{{ route('media.download', $media_id) }}">ダウンロード</a></p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	@endif
	@if ($content)
		@foreach($content as $item)
			<div class="resource-primary">{{ $item['filename'] }}</div>
			<div class="tab-pane fade show  active " id="{{ $item['id'] }}" role="tabpanel">
				<div class="modal-body" style="height: 480px;">
	                <div class='ace__item'>
	                    <div class='ace__item--body' data-id='ace_edit_{{ $item['id'] }}' data-language='{{ $item['language'] }}'>
	                        <div id='ace_edit_{{ $item['id'] }}' class='ace__item--editor'>{!! ($item['content']) !!}</div>
	                    </div>
	                </div>
	            </div>
			</div>
		@endforeach
	@endif
</div>