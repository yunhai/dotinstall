<div class="box">
    <ol class="breadcrumb px-5 mb-0">
        <li class="breadcrumb-item"><a href="">トップ</a></li>
        <li class="breadcrumb-item active">レッスン一覧</li>
    </ol>
</div>
@include('component.lesson.lesson', ['filter_form' => $filter_form, 'lessons' => $lessons, 'lesson_info' => $lesson_info])
<div class="box mb-0">
    <div class="card-lesson-total text-center">
        <p class="card-text">
            <a href="{{ route('lesson') }}">全てのレッスンを見る（{{ $global_setting['total_enable_lesson'] }}）</a>
        </p>
    </div>
</div>