<form class="form-inline" method='get'>
  <label class="sr-only" for="year">年</label>
  <select class="form-control mb-2 mr-sm-2" id="year" name='year'>
    <option value="0">年</option>
    @php
        $i = intval(date('Y'));
        $end = $i - 5;
        while($i > $end) {
            $selected = ($i == $year) ? 'selected' : '';
            echo "<option {$selected} value='{$i}' >{$i}</option>";
            $i--;
        }
    @endphp
  </select>

  <label class="sr-only" for="month">月</label>
  <select class="form-control mb-2 mr-sm-2" id="month" name='month'>
    <option value="0">月</option>
    @php
        $i = 12;
        while($i) {
            $selected = ($i == $month) ? 'selected' : '';
            echo "<option {$selected} value=" . sprintf("%02d", $i) . ">{$i}</option>";
            $i--;
        }
    @endphp
  </select>

  <button type="submit" class="btn btn-primary mb-2">検索</button>
</form>