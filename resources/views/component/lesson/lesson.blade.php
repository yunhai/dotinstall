@include('component.lesson.filter.form', ['filter_form' => $filter_form, 'lessons' => $lessons])
@pc
    @php
        $class_col_left = 'col-5';
    @endphp
@endpc
@sp
    @php
        $class_col_left = 'col-12';
    @endphp
@endsp
<div class="box">
    <div class="card">
        <div class="lession-nar w-100 px-5 d-flex align-items-center">
            <div class="{{ $class_col_left }} pl-0 pr-0">
                <span>簡単な実戦でプログラムを覚えよう！</span>
            </div>
            @pc
                <div class="col-7 pr-0 text-right">
                    <span>レッスン一覧 {{ isset($lesson_info['lesson_total']) ? $lesson_info['lesson_total'] : 0 }}レッスン　{{ isset($lesson_info['video_total']) ? $lesson_info['video_total'] : 0 }}本の動画で提供中</span>
                </div>
            @endpc
        </div>
    </div>
</div>
<div class="box mar_t20" id='j-lessonFilterResult'>
    @include('component.lesson.filter.result', ['filter_form' => $filter_form, 'lessons' => $lessons])
</div>
