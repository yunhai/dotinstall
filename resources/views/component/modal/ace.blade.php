<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($content as $item)
                    <div class='ace__item'>
                        <div class='ace__item--header'>
                            {{ $item['filename'] }}
                        </div>
                        <div class='ace__item--body' data-id='ace_edit_{{ $item['id'] }}' data-language='{{ $item['language'] }}'>
<div id='ace_edit_{{ $item['id'] }}' class='ace__item--editor'>
    {!! $item['content'] !!}
</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>