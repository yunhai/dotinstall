@php
    $keyword = array_get($search_input, 'keyword');
@endphp
<div class="row title__gray title-gray--50">
    <div @pc class="col-md-6 col-xs-6" @endpc style='margin-top: 3px;'><a href="{{ route('top') }}">トップ / レッスン一覧</a></div>
</div>
<div class="form__search row">
    <form action="{{ route('top.search') }}" class="col-sm-12 top-search">
        <div class="form-group">
            <div id="pg-search-input">
                <div class="input-group col-md-12">
                    <input id='filter-keyword' type="text" name='keyword' class="form-control input-lg top-search--keyword j-lessonFilter" placeholder="ソースコード、レッスン検索" value="@if (!empty($keyword)) {{ $keyword }} @endif"/>
                    <span class="input-group-btn">
                        <button id='j-topSearchBtn' class="btn btn-info btn-lg" type="submit">
                            検索
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="row title__gray title-gray--50" style='margin-bottom: 10px;'>
    <div style='margin-top: 3px;'>レッスン一覧</div>
</div>
