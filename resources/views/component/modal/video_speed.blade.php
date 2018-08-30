<div class="modal fade user-upgrade-modal-sm" id="{{ $modal_id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content rounded-0" style="height: auto;">
            <div class="modal-body">
                <p class="mb-0">
                    ①無料会員は、速度調整する事ができません。<br/>
                    ②月額会員になるとPCでのみ、速度調整がご利用できます。<br/>
                    ③スマートフォンでは速度調整する事ができませんのお気を付けください。
                </p>
            </div>
            <div class="modal-footer" style="padding: 5px;text-align: center; display: block; width: 100%">
                <a href="javascript:;" class="btn btn-sm btn-secondary mr-0"  data-dismiss="modal" aria-label="Close" style="padding-bottom: 2px;">後で月額会員になる</a>
                <a href="@logined {{ route('user.upgrade') }} @else  {{ route('register.diamond') }} @endlogined"class="btn btn-sm btn-primary" style="padding-bottom: 2px; width: 126px;">月額会員になる</a>
            </div>
        </div>
    </div>
</div>
