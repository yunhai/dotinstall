@php
    $css_class = [
        LESSON_DIFFICULTY_NEWBIE => 'pink',
        LESSON_DIFFICULTY_BEGINNER => 'blue',
        LESSON_DIFFICULTY_INTERMEDIATE => 'pastel-green',
        LESSON_DIFFICULTY_ADVANCE => 'orange',
    ];
@endphp

@if (!empty($lessons['lesson']))
<div class="row title-resultSearch" style='line-height: normal; border-bottom: 0;'>
    <div class="col-md-12 col-xs-12">レッスンの検索結果</div>
</div>
<div class='top-search--item'>
@foreach($lessons['lesson'] as $item)
    <div class="row">
        <div class="lession--item">
            <div class="i__color__result {{ $css_class[$item['difficulty']] ?? '' }}">
                <span>
                    {{ $filter_form['category'][$item['category_id']] }}<br/>
                    {{ $filter_form['difficulty'][$item['difficulty']] }}編
                </span>
            </div>
            <div class="search-content">
                <a href="{{ route('lesson.detail', ['lesson_id' => $item['id']]) }}" title="{{ $item['name'] }}（全{{ $item['video_count'] }}回）">
                    {{ $item['name'] }}（全{{ $item['video_count'] }}回）
                </a>
            </div>
        </div>
    </div>
@endforeach
</div>
@endif

@if (!empty($lessons['lesson_detail']))
<div class="row title-resultSearch" style='line-height: normal; border-bottom: 0;'>
    <div class="col-md-12 col-xs-12">動画の検索結果</div>
</div>
<div class='top-search--item'>
@foreach($lessons['lesson_detail'] as $item)
    <div class="row">
        <div class="lession--item">
            <div class="i__color__result  {{ $css_class[$item['lesson']['difficulty']] ?? '' }}">
                <span>
                    {{ $filter_form['category'][$item['lesson']['category_id']] }}<br/>
                    {{ $filter_form['difficulty'][$item['lesson']['difficulty']] }}編
                </span>
            </div>
            <div class="search-content">
                <a href="{{ route('lesson.detail', ['lesson_id' => $item['id']]) }}" title="{{ $item['name'] }}">
                    {{ $item['name'] }}
                </a>
            </div>
        </div>
    </div>
@endforeach
</div>
@endif

@if (empty($lessons['lesson']) && empty($lessons['lesson_detail']))
<div class="card" style="text-align: center; padding: 10px 0 20px; border: 0;">
    検索結果はありません
</div>
@endif
