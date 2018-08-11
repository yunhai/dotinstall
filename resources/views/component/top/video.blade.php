@foreach ($lessons as $lesson)
    @if (!empty($lesson['lesson_details']))
        <div class="box box-sp">
            <div class="card">
                <div class="lession-heading w-100 px-5">
                    <img class="img-fluid" src="/img/light-bulb.png" />
                    <div class="col-8 pr-0 pad_l5 font-weight-bold">
                        <span>【{{ $filter_form['difficulty'][$lesson['difficulty']] }}】【＃{{ $lesson['sort'] }}】{{ $lesson['name'] }}（全{{ $lesson['video_count'] }}回）</span>
                    </div>
                    <div class="col-4">
                        <a href="{{ route('lesson.detail', ['lesson_id' => $lesson['id']] ) }}" class="lession-heading-url float-right">レッスン一覧</a>
                    </div>
                </div>
            </div>
            <div class="card card-video-list">
                <div class="container-fluid px-5">
                    @include('component.lesson.item', ['lesson_details' => $lesson['lesson_details']])
                </div>
            </div>
        </div>
    @endif
@endforeach