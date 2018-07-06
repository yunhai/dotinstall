@foreach ($lesson_details as $key => $lesson_detail)
    <div class="row" style='@if($key > 0) border-top: 1px solid #bca9af; @endif'>
        @foreach ($lesson_detail as $row)
            @include('component.lesson.lesson_detail.item', ['row' => $row])
        @endforeach
    </div>
@endforeach
