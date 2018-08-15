@include('component.lesson.filter.form', ['filter_form' => $filter_form, 'lessons' => $lessons])
<div class="box">
    <div class="card">
        <div class="lession-nar w-100 px-5 d-flex align-items-center">
            <div class="col-5 pl-0 pr-0">
                <span>簡単な実戦でプログラムを覚えよう！</span>
            </div>
            <div class="col-7 pr-0 text-right">
                <span>レッスン一覧 {{ isset($lesson_info['lesson_total']) ? $lesson_info['lesson_total'] : 0 }}レッスン　{{ isset($lesson_info['video_total']) ? $lesson_info['video_total'] : 0 }}本の動画で提供中</span>
            </div>
        </div>
    </div>
</div>
<div class="box mar_t20" id='j-lessonFilterResult'>
    @include('component.lesson.filter.result', ['filter_form' => $filter_form, 'lessons' => $lessons])
</div>
