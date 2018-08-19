<div class="modal fade user-login-modal-sm" id="{{ $modal_id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0" style="height: auto;">
            <div class="modal-body">
                <p class="mb-0">有料会員になるとソースコードを見るようになります</p>
            </div>
            <div class="modal-footer" style="padding: 5px;text-align: center; display: block; width: 100%">
                <a href="javascript:;" class="btn btn-sm btn-secondary"  data-dismiss="modal" aria-label="Close" style="padding-bottom: 2px;">キャンセル</a>
                <a href="@logined {{ route('user.upgrade') }} @else  {{ route('login') }} @endlogined" class="btn btn-sm btn-primary" style="padding-bottom: 2px;">今すぐはじめる</a>
            </div>
        </div>
    </div>
</div>
