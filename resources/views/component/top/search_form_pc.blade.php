<div class="row title__gray title-gray--50" style='margin-bottom: 10px;'>
    <div class="col-md-2" style='position:relative; padding-top: 8px;'>レッスン一覧</div>
    <div class="col-md-6" style='margin-left: 20px; flex: 0 0 48%;'>
        <form action="{{ route('top.search') }}" class="top-search">
            <div class="input-group">
                <div class="input-group-prepend" style=''>
                  <div class="input-group-text" style='background: #fff;border: solid 1px #ece8e9;border-top-left-radius: 6px;border-bottom-left-radius: 6px; padding-bottom: 8px;'>
                      <i class="fa fa-search" style="font-size:13px"></i>
                  </div>
                </div>
                <input style='border: solid 1px #ece8e9; border-left: 0;padding-left: 0;padding-top:7px;border-top-right-radius: 6px;border-bottom-right-radius: 6px; font-size: 11px;' type="text" class="form-control form-control-search j-lessonFilter" name="keyword" value="@if (!empty($keyword)) {{ $keyword }} @endif" placeholder="動画検索">
                <button id='j-topSearchBtn' class="btn-search" style='padding: 0 10px;border-radius: 8px; border: solid 1px #ece8e9; font-size:12px; padding-top:2px;' type='button'>検索</button>
            </div>
        </form>
    </div>
    <div class="col-md-3 text-right" style='flex: 0 0 33%; max-width:33%; position:relative; padding-top: 8px;'>レッスン一覧 {{ $global_setting['total_enable_lesson'] }}レッスン　{{ $global_setting['total_enable_video'] }}本の動画で提供中</div>
</div>
