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
            <div class="px-5">
                <ul class="list-group w-100">
                    @foreach ($lesson_item as $lesson)
                        <li class="list-group-item list-group-item-lesson px-0">
                            <div class="@pc col-9 float-left @endpc @sp col-12 @endsp px-0">
                              <a href="{{ route('lesson.detail', ['lesson_id' => $lesson['id']] ) }}" class="d-flex align-items-center">
                                  @php $is_all_finish = ($lesson['lesson_detail_close_count'] >= $lesson['video_count']) ; @endphp
                                  <span @if($is_all_finish) style='text-decoration: line-through' @endif>{{ $lesson['name'] }}（全{{ $lesson['video_count'] }}回）</span>
                              </a>
                            </div>
                            <div class="@pc col-3 text-right float-right d-flex align-items-center justify-content-end @endpc @sp col-12 text-right mar_t10 @endsp px-0">
                                <span class="@if (Auth::check()) mar_r15 @endif">{{ number_format($lesson['lesson_learning_count']) }} 人が学習中</span>
                                @if (!empty(Auth::check()))
                                    @if ($is_all_finish)
                                        <span class="btn-all-complete">全て完了</span>
                                    @else
                                        <span style="min-width: 38px;">完了 / {{ $lesson['lesson_detail_close_count'] }}</span>
                                    @endif
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    @endforeach
@else
    <div class="card" style='text-align: -webkit-center; padding-top:100px; padding-bottom:100px'>
        <p>検索結果はありません</p>
    </div>
@endif