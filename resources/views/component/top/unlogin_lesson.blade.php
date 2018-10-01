@sp
    <div class="row title__gray title-gray--50">
        <div @pc class="col-md-6 col-xs-6" @endpc style='margin-top: 3px;'><a href="{{ route('top') }}">トップ / レッスン一覧</a></div>
    </div>
    <div class="form__search row">
        @include('component.top.search_form', ['filter_form' => $filter_form])
    </div>
    <div class="row title__gray title-gray--50" style='margin-bottom: 10px;'>
        <div @pc class="col-md-6 col-xs-6" @endpc style='margin-top: 3px;'>レッスン一覧</div>
    </div>
@endsp

@pc
<div class="row title__gray title-gray--50" style='margin-bottom: 10px;'>
    <div class="col-md-2" style='position:relative; padding-top: 5px;'>レッスン一覧</div>
    <div class="col-md-6" style='margin-left: 20px; flex: 0 0 48%;'>
        <form action="{{ route('top.search') }}" class="top-search">
            <div class="input-group">
                <div class="input-group-prepend" style=''>
                  <div class="input-group-text" style='background: #fff;border: solid 1px #ece8e9;border-top-left-radius: 6px;border-bottom-left-radius: 6px; padding-bottom: 8px;'>
                      <i class="fa fa-search" style="font-size:13px"></i>
                  </div>
                </div>
                <input style='border: solid 1px #ece8e9; border-left: 0;padding-left: 0;padding-top:6px;border-top-right-radius: 6px;border-bottom-right-radius: 6px; font-size: 11px' type="text" class="form-control form-control-search j-lessonFilter" name="keyword" value="@if (!empty($keyword)) {{ $keyword }} @endif" placeholder="動画検索">
                <button class="btn-search" style='padding: 0 10px;border-radius: 8px; border: solid 1px #ece8e9; font-size:12px;'>検索</button>
            </div>
        </form>
    </div>
    <div class="col-md-3 text-right" style='flex: 0 0 33%; max-width:33%; position:relative; padding-top: 5px; '>レッスン一覧 {{ $global_setting['total_enable_lesson'] }}レッスン　{{ $global_setting['total_enable_video'] }}本の動画で提供中</div>
</div>
@endpc

@if ($page === 'search')
    @include('component.top.search')
@else
<div class='row'>
  <div id='j-lessonFilterResult' style='width: 100%; display: block;'>
      @foreach($category as $list)
      @foreach($list as $list1)
      <div class="blog-group">
          <div class="blog">
              @foreach($list1 as $index => $category_attribute)
              <div class="col-md-6 @if($index === 0) fields-left @else fields-right @endif">
                <div class="blog-content">
                    @php $poster = $category_attribute['media']['path'] ?? ''; @endphp
                    <div class='blog_title category-block' style='background: url(@media_path($poster)) no-repeat; background-size: 100% 100%;'>
                        <h2 class="top-category--item__title">
                            {{ $filter_form['category'][$category_attribute['ms_category_id']] }}
                        </h2>
                        <span class='top-category--item__level'>
                            {{ $filter_form['difficulty'][$category_attribute['level']] }}
                        </span>
                    </div>
                    <span class="blog_title_bottom text-center">{{ $category_attribute['caption'] }}</span>
                    <ul class="list-group w-100 list-content">
                        @foreach ($lessons[$category_attribute['ms_category_id']][$category_attribute['level']] as $item)
                        <li class="top-category--item px-0">
                            <div class="px-0" style='padding-top: 5px;'>
                                <a href="{{ route('lesson.detail', ['lesson_id' => $item['id']]) }}" title="{{ $item['name'] }}（全{{ $item['video_count'] }}回)">
                                    {{ $item['name'] }}（全{{ $item['video_count'] }}回）
                                </a>
                            </div>
                            <div class="top-category--item__right @sp col-sm-12 @endsp px-0">
                                @if (!empty(Auth::check()))
                                    @if ($item['is_finished'])
                                        全て完了
                                    @else
                                        完了 / {{ $item['lesson_detail_close_count'] }}
                                    @endif
                                @else
                                    完了 / 0
                                @endif
                            </div>
                            <div class="clearfix"></div>
                        </li>
                        @endforeach
                    </ul>
                </div>
              </div>
              @endforeach
          </div>
      </div>
      @endforeach
      @endforeach
  </div>
</div>
@endif
