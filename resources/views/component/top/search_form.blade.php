<form action="{{ route('top.search') }}" class="@pc offset-md-2 form-inline @endpc @sp col-sm-12 @endsp top-search">
  @pc
    @php
        $diff = array_get($filter_form, 'input_value.difficulty');
        $cate = array_get($filter_form, 'input_value.category');
        $keyword = array_get($filter_form, 'input_value.keyword');
    @endphp
    <div class="form-group">
        <label for="filter-difficulty">段階</label>
        <select id='filter-difficulty' name="difficulty" class="form-control mx-sm-3 j-lessonFilter" style="padding-left:0px;padding-top: 2px;">
            <option value="" @if (empty($diff)) selected @endif>全ての動画</option>
            @foreach ($filter_form['difficulty'] as $difficulty_id => $difficulty)
                <option value="{{ $difficulty_id }}" @if ($diff == $difficulty_id) selected @endif>{{ $difficulty }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="filter-category">カテゴリ</label>
        <select id='filter-category' name="category" class="form-control mx-sm-3 j-lessonFilter" style="padding-left:0px;padding-top: 2px;">
            <option value="" @if (empty($cate)) selected @endif>全ての動画</option>
            @foreach ($filter_form['category'] as $cat_id => $cat)
                <option value="{{ $cat_id }}" @if ($cate == $cat_id) selected @endif>{{ $cat }}</option>
            @endforeach
        </select>
    </div>
    @endpc
    <div class="form-group">
        <div id="pg-search-input">
            <div class="input-group col-md-12">
                <input type="text" name='keyword' class="form-control input-lg top-search--keyword j-lessonFilter" placeholder="動画検索" value="@if (!empty($keyword)) {{ $keyword }} @endif"/>
                <span class="input-group-btn">
                    <button class="btn btn-info btn-lg" type="submit">
                        検索
                    </button>
                </span>
            </div>
        </div>
    </div>
</form>
