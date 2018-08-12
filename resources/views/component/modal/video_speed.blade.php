<div class="modal fade user-upgrade-modal-sm" id="{{ $modal_id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content rounded-0" style="height: auto;">
            <div class="modal-body">
                <p class="mb-0">無料動画は、速度調整できません。<br/>月額会員になるとご利用できます。</p>
            </div>
            <div class="modal-footer" style="padding: 5px;text-align: center; display: block; width: 100%">
                <a href="javascript:;" class="btn btn-sm btn-secondary mr-0"  data-dismiss="modal" aria-label="Close" style="padding-bottom: 2px;">後で月額会員になる</a>
                <a href="@logined {{ route('user.upgrade') }} @else  {{ route('register.diamond') }} @endlogined"class="btn btn-sm btn-primary" style="padding-bottom: 2px; width: 126px;">月額会員になる</a>
            </div>
        </div>
    </div>
</div>
