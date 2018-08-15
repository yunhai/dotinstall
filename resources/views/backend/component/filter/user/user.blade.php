<form class="form-inline" method='get'>
    <label class="sr-only" for="year">ユーザー名</label>
    <input name='fullname' value='{{ $fullname ?? '' }}' class="form-control mb-2 mr-sm-2" placeholder="ユーザー名" />
    <button type="submit" class="btn btn-primary mb-2">検索</button>
</form>