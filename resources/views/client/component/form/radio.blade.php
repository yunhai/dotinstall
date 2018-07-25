<tr>
    <td class="aside">{{ $field_label }}</td>
    <td>
        <div>
            @foreach($field_option as $id => $label)
            <div class="custom-control custom-radio custom-control-inline">
              <input type='radio'
                  id="{{ $field_name }}{{ $id }}"
                  class="custom-control-input"
                  value='{{ $id }}'
                  name="{{ $field_name }}"
                  @if($id == $field_value)
                      checked
                  @endif
                  @if (!empty($field_attribute))
                      @foreach ($field_attribute as $key => $value)
                          {{ $key }}="{{ $value }}"
                      @endforeach
                  @endif
              />
              <label class="custom-control-label" for="{{ $field_name }}{{ $id }}">{{ $label }}</label>
            </div>
            @endforeach
        </div>
        @if (!empty($errors->first($field_name)))
            <span class="text-danger d-block mt-2">{{ $errors->first($field_name) }}</span>
        @endif
    </td>
</tr>
