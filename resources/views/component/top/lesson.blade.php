<div class="box">
	<ol class="breadcrumb px-5 mb-0">
		<li class="breadcrumb-item"><a href="">トップ</a></li>    
		<li class="breadcrumb-item active">レッスン一覧</li>
	</ol>
</div>
@include('component.lesson.lesson', ['filter_form' => $filter_form, 'lessons' => $lessons])