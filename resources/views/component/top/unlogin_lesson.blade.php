<div class="row title__gray title-gray--50">
    <div @pc class="col-md-6 col-xs-6" @endpc style='margin-top: 3px;'><a href="{{ route('top') }}">トップ / レッスン一覧</a></div>
    <div class="col-md-6 col-xs-6 text-right hidden-xs" @pc style='margin-top: 3px;' @endpc><b>レッスン一覧</b> {{ $global_setting['total_enable_lesson'] }}レッスン　{{ $global_setting['total_enable_video'] }}本の動画で提供中</div>
</div>
<div class="form__search row">
    @include('component.top.search_form', ['filter_form' => $filter_form])
</div>
<div class="row title__gray title-gray--50" style='margin-bottom: 10px;'>
    <div @pc class="col-md-6 col-xs-6" @endpc style='margin-top: 3px;'>簡単な実戦でプログラムを覚えよう！</div>
</div>
<div class='row'>

  <div id='j-lessonFilterResult' style='width: 100%; display: block;'>
      <div class="blog-group">
          <div class="blog">
              <div class="col-md-6 fields-left">
                <div class="blog-content">
                    <div class='blog_title pink category-block'>
                      <h2 class="top-category--item__title">
                        swift入門
                      </h2>
                      <span class='top-category--item__level'>小学生コース</span>
                    </div>
                    <span class="blog_title_bottom text-center">swiftを基礎からマスターしよう！子供～大人の方</span>
                    <ul class="list-group w-100 list-content">
                        @foreach ($lessons[LESSON_DIFFICULTY_NEWBIE] as $item)
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
              <div class="col-md-6 fields-right">
                <div class="blog-content">
                    <div class='blog_title blue category-block'>
                      <h2 class="top-category--item__title">
                        swift入門
                      </h2>
                      <span class='top-category--item__level'>初級コース</span>
                    </div>
                    <span class="blog_title_bottom text-center">覚えるまで何度もコードを書いてみよう</span>
                    <ul class="list-group w-100 list-content">
                        @foreach ($lessons[LESSON_DIFFICULTY_BEGINNER] as $item)
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
          </div>
      </div>
      <div class="blog-group">
          <div class="blog">
              <div class="col-md-6 col-sm-6 fields-left">
                <div class="blog-content">
                    <div class='blog_title pastel-green category-block'>
                      <h2 class="top-category--item__title">
                        swift入門
                      </h2>
                      <span class='top-category--item__level'>中級コース</span>
                    </div>
                    <span class="blog_title_bottom text-center">コードを書くのが一番近道！頑張ろう！</span>
                    <ul class="list-group w-100 list-content">
                        @foreach ($lessons[LESSON_DIFFICULTY_INTERMEDIATE] as $item)
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
              <div class="col-md-6 fields-right">
                  <div class="blog-content">
                      <div class='blog_title orange category-block'>
                        <h2 class="top-category--item__title" style=''>
                          swift入門
                        </h2>
                        <span class='top-category--item__level' style=''>上級コース</span>
                      </div>
                      <span class="blog_title_bottom text-center">解らなことはGoogleで検索してみよう！</span>
                      <ul class="list-group w-100 list-content">
                          @foreach ($lessons[LESSON_DIFFICULTY_ADVANCE] as $item)
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
          </div>
      </div>
  </div>
</div>
