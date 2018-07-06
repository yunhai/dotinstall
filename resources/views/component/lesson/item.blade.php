@foreach ($lesson_details as $key => $lesson_detail)
    <div class="row" style='@if($key > 0) border-top: 1px solid #bca9af; @endif'>
        @foreach ($lesson_detail as $row)
            @php $path = $row['media'][0]['path'] ?? ''; @endphp
            @include('component.lesson.lesson_detail.list', ['row' => $row, 'path' => $path])
        @endforeach
    </div>
@endforeach
