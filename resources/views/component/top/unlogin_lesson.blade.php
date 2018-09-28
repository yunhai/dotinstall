<div class="row title__gray title-gray--50">
    <div class="col-md-6 col-xs-6"><a href="#">トップ　/　レッスン一覧</a></div>
    <div class="col-md-6 col-xs-6 text-right hidden-xs"><b>レッスン一覧</b> {{ $global_setting['total_enable_lesson'] }}レッスン　{{ $global_setting['total_enable_video'] }}本の動画で提供中</div>
</div>
<div class="form__search row">
    <div class="col-md-2 col-sm-1"></div>
    <form class="form-inline">
        <div class="form-group">
            <label for="">段階</label>
            <select class="form-control mx-sm-3" id="inlineFormCustomSelect">
                <option selected>初級編</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">カテゴリ</label>
            <select class="form-control mx-sm-3" id="inlineFormCustomSelect">
                <option selected>ＩＯＳアプリ</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="form-group">
            <div id="pg-search-input">
                <div class="input-group col-md-12">
                    <input type="text" class="form-control input-lg" placeholder="動画検索" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button">
                            検索
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="row title__gray title-gray--50">
    <div class="col-md-6 col-xs-6">簡単な実戦でプログラムを覚えよう！</div>
    <div class="col-md-6 col-xs-6 text-right hidden-xs"></div>
</div>
<div class="blog-group">
    <div class="row blog">
        <div class="col-md-6 fields-left">
            <div class="blog-content">
                <h2 class="blog_title pink text-center">swift入門<br>小学生コース</h2>
                <h2 class="blog_title_bottom pink text-center">swiftを基礎からマスターしよう！子供～大人の方</h2>
                <ul class="list-content">
                    @foreach ($lessons[LESSON_DIFFICULTY_NEWBIE] as $item)
                    <li class="list-group-item list-group-item-lesson px-0">
                        <div class="@pc col-9 float-left @endpc @sp col-12 @endsp px-0">
                            <a href="{{ route('lesson.detail', ['lesson_id' => $item['id']]) }}" title="{{ $item['name'] }}（全{{ $item['video_count'] }}回)">
                                {{ $item['name'] }}（全{{ $item['video_count'] }}回）
                            </a>
                        </div>
                        <div class="@pc col-3 text-right d-flex align-items-center justify-content-end @endpc @sp col-12 @endsp px-0">
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
                <h2 class="blog_title blue text-center">swift入門<br>初級コース</h2>
                <h2 class="blog_title_bottom pink text-center">解らない事があったらGoogleで検索する力も身につけよう</h2>
                <ul class="list-content">
                    @foreach ($lessons[LESSON_DIFFICULTY_BEGINNER] as $item)
                    <li class="list-group-item list-group-item-lesson px-0">
                        <div class="@pc col-9 float-left @endpc @sp col-12 @endsp px-0">
                            <a href="{{ route('lesson.detail', ['lesson_id' => $item['id']]) }}" title="{{ $item['name'] }}（全{{ $item['video_count'] }}回)">
                                {{ $item['name'] }}（全{{ $item['video_count'] }}回）
                            </a>
                        </div>
                        <div class="@pc col-3 text-right d-flex align-items-center justify-content-end @endpc @sp col-12 @endsp px-0" style="padding-right:15px !important;">
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
    <div class="row blog">
        <div class="col-md-6 col-sm-6 fields-left">
            <div class="blog-content">
                <h2 class="blog_title pastel-green text-center">swift入門<br>中級コース</h2>
                <h2 class="blog_title_bottom text-center">swiftを基礎からマスターしよう！子供～大人の方</h2>
                <ul class="list-content">
                    @foreach ($lessons[LESSON_DIFFICULTY_INTERMEDIATE] as $item)
                    <li class="list-group-item list-group-item-lesson px-0">
                        <div class="@pc col-9 float-left @endpc @sp col-12 @endsp px-0">
                            <a href="{{ route('lesson.detail', ['lesson_id' => $item['id']]) }}" title="{{ $item['name'] }}（全{{ $item['video_count'] }}回)">
                                {{ $item['name'] }}（全{{ $item['video_count'] }}回）
                            </a>
                        </div>
                        <div class="@pc col-3 text-right d-flex align-items-center justify-content-end @endpc @sp col-12 @endsp px-0" style="padding-right:15px !important;">
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
                <h2 class="blog_title orange text-center">swift入門<br>上級コース　</h2>
                <h2 class="blog_title_bottom text-center">解らない事があったらGoogleで検索する力も身につけよう</h2>
                <ul class="list-group w-100 list-content">
                    @foreach ($lessons[LESSON_DIFFICULTY_ADVANCE] as $item)
                        <li class="list-group-item list-group-item-lesson px-0">
                            <div class="@pc col-9 float-left @endpc @sp col-12 @endsp px-0">
                                <a href="{{ route('lesson.detail', ['lesson_id' => $item['id']]) }}" title="{{ $item['name'] }}（全{{ $item['video_count'] }}回)">
                                    {{ $item['name'] }}（全{{ $item['video_count'] }}回）
                                </a>
                            </div>
                            <div class="@pc col-3 text-right d-flex align-items-center justify-content-end @endpc @sp col-12 @endsp px-0" style="padding-right:15px !important;">
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
