@php
    $css_class = [
        LESSON_DIFFICULTY_NEWBIE => 'pink',
        LESSON_DIFFICULTY_BEGINNER => 'blue',
        LESSON_DIFFICULTY_INTERMEDIATE => 'pastel-green',
        LESSON_DIFFICULTY_ADVANCE => 'orange',
    ];
@endphp

@if (!empty($lessons['lesson']))
<div class="title-resultSearch" style='line-height: normal; border-bottom: 0; padding: 20px 0;'>
    レッスンの検索結果
</div>
<div class='top-search--item'>
    <ul class="list-group w-100">
        @foreach($lessons['lesson'] as $lesson)
            @php
                $first_lesson_detail = $lesson['lesson_details'][0] ?? ['free_mode' => 0, 'new_mode' => 0];
                if ($first_lesson_detail) {
                    $poster = $first_lesson_detail['posters'][0]['path'] ?? '';
                    $caption = $first_lesson_detail['caption'] ?? '';
                }
            @endphp
            <li class="list-group-item list-group-item-lesson px-0">
                <div class="@pc col-9 float-left @endpc @sp col-12 @endsp px-0">
                    <div class='lession--item'>
                        <div style='margin-right: 20px;width: 70px;'>
                            <div class="i__color__result {{ $css_class[$lesson['difficulty']] ?? '' }}">
                                <span>
                                    {{ $filter_form['category'][$lesson['category_id']] }}<br/>
                                    {{ $filter_form['difficulty'][$lesson['difficulty']] }}編
                                </span>
                            </div>
                        </div>
                        @sp
                            <div class='lesson--item__content'>
                                <a href="{{ route('lesson.detail', ['lesson_id' => $lesson['id']]) }}" >
                                    <span>{{ $lesson['name'] }}（全{{ $lesson['video_count'] }}回）</span>
                                </a>
                            </div>
                        @endsp
                        @pc
                        <div class='lesson--item__caption'>
                            <a href="{{ route('lesson.detail', ['lesson_id' => $lesson['id']]) }}" title="{{ $lesson['name'] }}（全{{ $lesson['video_count'] }}回)">
                                <span>{{ $lesson['name'] }}（全{{ $lesson['video_count'] }}回）</span>
                            </a>
                            <div class='lesson--item__caption-content'>
                                {{ $caption }}
                            </div>
                        </div>
                        @endpc
                    </div>
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
                        @if ($lesson['is_finished'])
                            全て完了
                        @else
                            完了 / {{ $lesson['lesson_detail_close_count'] }}
                        @endif
                    @else
                        完了 / 0
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endif

@if (!empty($lessons['lesson_detail']))
<div class="title-resultSearch" style='line-height: normal; border-bottom: 0; padding: 20px 0;'>
    <div class="col-md-12 col-xs-12">動画の検索結果</div>
</div>
<div class='top-search--item'>
    <ul class="list-group w-100">
        @foreach($lessons['lesson_detail'] as $lesson)
            <li class="list-group-item list-group-item-lesson px-0">
                <div class="@pc col-9 float-left @endpc @sp col-12 @endsp px-0">
                    <div class='lession--item'>
                        <div style='margin-right: 20px; width: 70px;'>
                            <div class="i__color__result {{ $css_class[$lesson['lesson']['difficulty']] ?? '' }}">
                                <span>
                                    {{ $filter_form['category'][$lesson['lesson']['category_id']] }}<br/>
                                    {{ $filter_form['difficulty'][$lesson['lesson']['difficulty']] }}編
                                </span>
                            </div>
                        </div>
                        @sp
                            <div class='lesson--item__content'>
                                <a href="{{ route('lesson_detail.detail', ['lesson_id' => $lesson['lesson']['id'], 'lesson_detail_id' => $lesson['id']]) }}" >
                                    <span>{{ $lesson['name'] }}</span>
                                </a>
                            </div>
                        @endsp
                        @pc
                        <div class='lesson--item__caption'>
                            <a href="{{ route('lesson_detail.detail', ['lesson_id' => $lesson['lesson']['id'], 'lesson_detail_id' => $lesson['id']]) }}" title="{{ $lesson['name'] }}">
                                <span>{{ $lesson['name'] }}</span>
                            </a>
                            <div class='lesson--item__caption-content'>
                                {{ $lesson['caption'] }}
                            </div>
                        </div>
                        @endpc
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="lesson--item__my_styding @pc col-3 text-right float-right d-flex align-items-center justify-content-end @endpc @sp col-12 @endsp px-0" style="padding-right:15px !important;">
                    <div class='lesson--item__my_styding_finish'>
                    @if ($lesson['is_finished'])
                        完了
                    @else
                        未完了
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endif

@if (empty($lessons['lesson']) && empty($lessons['lesson_detail']))
<div class="card" style="text-align: center; padding: 10px 0 20px; border: 0;">
    検索結果はありません
</div>
@endif

<div style='line-height: normal; border-bottom: 0; padding: 20px 0;text-align: center;'>
    <a href="{{ route('top') }}">トップページ</a>
</div>
