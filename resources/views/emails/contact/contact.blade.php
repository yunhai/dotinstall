お名前: {{ $data['name'] }}<br/>
メールアドレス: {{ $data['email'] }}<br/>
@if (!empty($data['phone']))
電話番号: {{ $data['phone'] }}<br/>
@endif
内容:<br/>
{!! nl2br(e($data['content'])) !!}