<div class="row">
    @foreach ($lesson_details as $item)
        @include('component.lesson.lesson_detail.item', ['target' => $item])
    @endforeach
</div>
