<div class="box">
    <form method="GET" action="">
        @php
            $diff = array_get($filter_form, 'input_value.difficulty');
            $cate = array_get($filter_form, 'input_value.category');
            $keyword = array_get($filter_form, 'input_value.keyword');
        @endphp
        <div class="form-group form-group-search-lesson row justify-content-center">
            <div class="@pc col-3 @endpc @sp col-12 @endsp">
                <div class="input-group input-group-difficulty">
                    <label for="level" class="col-3 col-form-label px-0">段階</label>
                    <select name="difficulty" class="@pc col-7 @endpc @sp col-9 @endsp">
                        <option value="" @if (empty($diff)) selected @endif>選択なし</option>
                        @foreach ($filter_form['difficulty'] as $difficulty_id => $difficulty)
                            <option value="{{ $difficulty_id }}" @if ($diff == $difficulty_id) selected @endif>{{ $difficulty }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="@pc col-3 @endpc @sp col-12 @endsp">
                <div class="input-group input-group-category">
                    <label for="level" class="col-3 col-form-label px-0">カテゴリ</label>
                    <select name="category" class="@pc col-7 @endpc @sp col-9 @endsp">
                        <option value="" @if (empty($cate)) selected @endif>選択なし</option>
                        @foreach ($filter_form['category'] as $cat_id => $cat)
                            <option value="{{ $cat_id }}" @if ($cate == $cat_id) selected @endif>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="@pc col-3 @endpc @sp col-12 @endsp">
                <div class="input-group">
                    <input type="text" class="form-control form-control-search" name="keyword" value="@if (!empty($keyword)) {{ $keyword }} @endif" placeholder="動画検索">
                    <button class="btn-search">検索</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="box mb-0">
    <div class="card">
        <div class="lession-nar w-100 px-5 d-flex align-items-center">
            <div class="col-5 pl-0 pr-0">
                <span>簡単な実戦でプログラムを覚えよう！</span>
            </div>
            <div class="col-7 pr-0 text-right">
                <span>レッスン一覧 〇〇レッスン　〇〇本の動画で提供中</span>
            </div>
        </div>
    </div>
</div>
<div class="box mb-0">
    @foreach ($lessons as $level => $category_list)
        @foreach ($category_list as $categoy_id => $lesson_item)
            <div class="card">
                <div class="lession-heading lession-header w-100 px-5">
                    <img class="img-fluid" src="/img/img_flash.png" />
                    <div class="col-8 pr-0 pad_l5 font-weight-bold">
                        <span>{{ $filter_form['difficulty'][$level] }}　{{ $filter_form['category'][$categoy_id] }}</span>
                    </div>
                    <div class="col-4">
                        <a href="javascript:;" class="lession-heading-url float-right">レッスン一覧</a>
                    </div>
                </div>
            </div>
            <div class="px-5">
                <ul class="list-group w-100">
                    @foreach ($lesson_item as $lesson)
                        <li class="list-group-item list-group-item-lesson px-0">
                            <div class="@pc col-9 float-left @endpc @sp col-12 @endsp px-0">
                              <a href="{{ route('lesson.detail', ['lesson_id' => $lesson['id']] ) }}" class="d-flex align-items-center">
                                  <span>【{{ $filter_form['difficulty'][$level] }}】【＃{{ $lesson['id'] }}】{{ $lesson['name'] }}</span>
                              </a>
                            </div>
                            <div class="@pc col-3 text-right float-right d-flex align-items-center justify-content-end @endpc @sp col-12 mar_t10 @endsp px-0">
                              <span class="@if (Auth::check()) mar_r15 @endif">{{ number_format($lesson['lesson_learning_count']) }} 人が学習中</span>
								@if (!empty(Auth::check()))
									@if ($lesson['lesson_detail_close_count'] >= $lesson['video_count'])
										<span class="btn-all-complete">全て完了</span>
									@else
										{{ $lesson['lesson_detail_close_count'] }} / {{ $lesson['video_count'] }}
									@endif
								@endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    @endforeach
</div>
