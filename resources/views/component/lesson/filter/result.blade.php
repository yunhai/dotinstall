@pc
    @php
        $class_lession_header_info = "col-8";
    @endphp
@endpc
@sp
    @php
        $class_lession_header_info = "col-12";
    @endphp
@endsp

@if ($lessons)
    @foreach ($lessons as $level => $category_list)
        @foreach ($category_list as $categoy_id => $lesson_item)
            <div class="card">
                <div class="lession-heading lession-header w-100 px-5">
                    <img class="img-fluid" src="/img/img_flash.png" />
                    <div class="{{ $class_lession_header_info }} pr-0 pad_l5 font-weight-bold">
                        <span>{{ $filter_form['difficulty'][$level] }}　{{ $filter_form['category'][$categoy_id] }}</span>
                    </div>
                    @pc
                        <div class="col-4">
                            <span class="lession-heading-url float-right">レッスン一覧</span>
                        </div>
                    @endpc
                </div>
            </div>
            <div>
                <ul class="list-group w-100">
                    @foreach ($lesson_item as $lesson)
                        <li class="list-group-item list-group-item-lesson px-0">
                            @php
                                $first_lesson_detail = $lesson['lesson_details'][0] ?? ['free_mode' => 0, 'new_mode' => 0];
                                if ($first_lesson_detail) {
                                    $poster = $first_lesson_detail['posters'][0]['path'] ?? '';
                                    $caption = $first_lesson_detail['caption'] ?? '';
                                }
                            @endphp
                            <div class="@pc col-9 float-left @endpc @sp col-12 @endsp px-0">
                                @if ($first_lesson_detail['free_mode'] == constant('LESSON_DETAIL_FREE_MODE_FREE') ||
                                    $first_lesson_detail['new_mode'] == constant('LESSON_DETAIL_NEW_MODE_NEW')
                                )
                                <div class='new_free_info'>
                                    <a href="{{ route('lesson.detail', ['lesson_id' => $lesson['id']] ) }}">
                                        @if ($first_lesson_detail['free_mode'] == constant('LESSON_DETAIL_FREE_MODE_FREE'))
                                        <img src='{{ asset('img/free.png') }}' width='@pc 40 @endpc @sp 45 @endsp' alt="無料" />
                                        @endif
                                        @if ($first_lesson_detail['new_mode'] == constant('LESSON_DETAIL_NEW_MODE_NEW'))
                                        <img src='{{ asset('img/new.png') }}' width='@pc 40 @endpc @sp 45 @endsp' alt="NEW" />
                                        @endif
                                    </a>
                                </div>
                                @endif
                                <div class='lession--item'>
                                    <div class="lession--item__image">
                                        <a href="{{ route('lesson.detail', ['lesson_id' => $lesson['id']]) }}" >
                                            <img src='@media_path($poster)' width='@pc 140 @endpc @sp 120 @endsp' alt="{{ $lesson['name_alias'] ?: $lesson['name'] }}"/>
                                        </a>
                                    </div>
                                    @sp
                                        <div class='lesson--item__content'>
                                            <a href="{{ route('lesson.detail', ['lesson_id' => $lesson['id']]) }}" >
                                                @php $is_all_finish = ($lesson['lesson_detail_close_count'] >= $lesson['video_count']) ; @endphp
                                                <span @if($is_all_finish) style='text-decoration: line-through' @endif>{{ $lesson['name'] }}（全{{ $lesson['video_count'] }}回）</span>
                                            </a>
                                        </div>
                                    @endsp
                                    @pc
                                    <div class='lesson--item__caption'>
                                        <a href="{{ route('lesson.detail', ['lesson_id' => $lesson['id']]) }}" title="{{ $lesson['name'] }}（全{{ $lesson['video_count'] }}回)">
                                            @php $is_all_finish = ($lesson['lesson_detail_close_count'] >= $lesson['video_count']) ; @endphp
                                            <span @if($is_all_finish) style='text-decoration: line-through' @endif>{{ $lesson['name'] }}（全{{ $lesson['video_count'] }}回）</span>
                                        </a>
                                        <div class='lesson--item__caption-content'>
                                            {{ $caption }}
                                        </div>
                                    </div>
                                    @endpc
                                </div>
                                @pc
                                <span class='lesson--item__learning_count'>
                                    {{ number_format(($lesson['lesson_learning_count']) + 381) }} 人が学習中
                                </span>
                                @endpc
                                <div class="clearfix"></div>
                            </div>
                            <div class="lesson--item__my_styding @pc col-3 text-right float-right d-flex align-items-center justify-content-end @endpc @sp col-12 @endsp px-0" style="padding-right:15px !important;">
                                @sp
                                <div class='lesson--item__learning_count'>
                                    {{ number_format(($lesson['lesson_learning_count']) + 381) }} 人が学習中
                                </div>
                                @endsp
                                <div class='lesson--item__my_styding_finish'>
                                @if (!empty(Auth::check()))
                                    @if ($is_all_finish)
                                        <span class="btn-all-complete">全て完了</span>
                                    @else
                                        完了 / {{ $lesson['lesson_detail_close_count'] }}
                                    @endif
                                @else
                                    完了 / 0
                                @endif
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    @endforeach
@else
    <div class="card" style='text-align: -webkit-center; padding-top:20px; padding-bottom: 20px;'>
        検索結果はありません
    </div>
@endif
