@php
    $css_class = [
        LESSON_DIFFICULTY_NEWBIE => 'pink',
        LESSON_DIFFICULTY_BEGINNER => 'blue',
        LESSON_DIFFICULTY_INTERMEDIATE => 'pastel-green',
        LESSON_DIFFICULTY_ADVANCE => 'orange',
    ];
@endphp
@foreach($category as $list)
    @foreach($list as $list1)
    <div class="blog-group">
      <div class="blog">
          @foreach($list1 as $index => $category_attribute)
          <div class="col-md-6 @if($index === 0) fields-left @else fields-right @endif">
            <div class="blog-content">
                <div class='blog_title category-block {{ $css_class[$category_attribute['level']] }}'>
                    <h2 class="top-category--item__title">
                        {{ $filter_form['category'][$category_attribute['ms_category_id']] }}
                    </h2>
                    <span class='top-category--item__level'>
                        {{ $filter_form['difficulty'][$category_attribute['level']] }}コース
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
