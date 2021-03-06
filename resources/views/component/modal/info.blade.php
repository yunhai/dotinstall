<div class="modal fade" id="{{ $modal_id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $modal_id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="border-radius:0;">
            <div class="modal-header" style="background-color: #8e8e8e; border-bottom: 0; border-radius: 0;">
                <div class="modal-title" style="color: #fff;">
                    <h4>{{ $target['title'] }}</h4>
                    <span>{{ $target['post_date_long'] }}</span>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! nl2br(e($target['content'])) !!}
            </div>
        </div>
    </div>
</div>
