<div class="box">
    <form method="GET" action="">
        @php
            $diff = array_get($filter_form, 'input_value.difficulty');
            $cate = array_get($filter_form, 'input_value.category');
            $keyword = array_get($filter_form, 'input_value.keyword');
        @endphp
        @pc
            @php
                $class_form_group = "col-3";
                $class_form_label = "col-3";
                $class_select = "col-9";
                $class_form_difficulty_label = "col-2";
                $class_difficulty_select = "col-10";
            @endphp
        @endpc
        @sp
            @php
                $class_form_group = "col-12";
                $class_form_difficulty_label = $class_form_label = "col-2";
                $class_difficulty_select = $class_select = "col-10";
            @endphp
        @endsp
        <div class="form-group form-group-search-lesson row justify-content-center">
            <div class="{{ $class_form_group }}">
                <div class="input-group input-group-difficulty">
                    <label for="level" class="{{ $class_form_difficulty_label }} col-form-label px-0" style="    text-align: right; padding-right: 10px !important;">段階</label>
                    <select id='filter-difficulty' name="difficulty" class="{{ $class_difficulty_select }} j-lessonFilter" style="padding-left:0px;padding-top: 2px;">
                        <option value="" @if (empty($diff)) selected @endif>全ての動画</option>
                        @foreach ($filter_form['difficulty'] as $difficulty_id => $difficulty)
                            <option value="{{ $difficulty_id }}" @if ($diff == $difficulty_id) selected @endif>{{ $difficulty }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="{{ $class_form_group }}">
                <div class="input-group input-group-category">
                    <label for="level" class="{{ $class_form_label }} col-form-label px-0">カテゴリ</label>
                    <select id='filter-category' name="category" class="{{ $class_select }} j-lessonFilter" style="padding-left:0px;padding-top: 2px;">
                        <option value="" @if (empty($cate)) selected @endif>全ての動画</option>
                        @foreach ($filter_form['category'] as $cat_id => $cat)
                            <option value="{{ $cat_id }}" @if ($cate == $cat_id) selected @endif>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="{{ $class_form_group }}">
                <div class="input-group">
                    <input id='filter-keyword' type="text" class="form-control form-control-search j-lessonFilter" name="keyword" value="@if (!empty($keyword)) {{ $keyword }} @endif" placeholder="動画検索">
                    <button class="btn-search">検索</button>
                </div>
            </div>
        </div>
    </form>
</div>