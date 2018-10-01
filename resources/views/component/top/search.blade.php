<div class="row title-resultSearch">
    <div class="col-md-12 col-xs-12">検索結果</div>
</div>
<div id='j-lessonFilterResult11111111' class="result-search" style='padding: 0'>
    @foreach($lessons as $item)
    <div class="row">
        <div class="lession--item">
            <div class="i__color__result pastel-green">
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
    <!-- <div class="row">
        <div class="lession--item">
            <div class="i__color__result blue">
                <span>swift<br>小学生</span>
            </div>
            <div class="search-content"><a href="#"> ステージ１　xcode説明と使い方（全１０）</a></div>
        </div>
    </div>
    <div class="row">
        <div class="lession--item">
            <div class="i__color__result pastel-green">
                <span>swift<br>中級編</span>
            </div>
            <div class="search-content"><a href="#"> ステージ１　xcode説明と使い方（全１０）</a></div>
        </div>
    </div>
    <div class="row">
        <div class="lession--item">
            <div class="i__color__result orange">
                <span>swift<br>上級編</span>
            </div>
            <div class="search-content"><a href="#"> ステージ１　xcode説明と使い方（全１０）</a></div>
        </div>
    </div> -->
</div>
