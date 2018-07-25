<tr>
    <td class="aside">{{ $field_label }}</td>
    <td>
        <div>
            <select class="form-control j-select"
                name="{{ $field_name }}"
                @if (!empty($field_attribute))
                    @foreach ($field_attribute as $key => $value)
                        {{ $key }}="{{ $value }}"
                    @endforeach
                @endif
                data-name="{{ $field_name }}"
            >
                @foreach($field_option as $id => $value)
                    <option value='{{ $id }}'
                        @if($id == $field_value)
                            selected
                        @endif
                    >
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>
        @if (!empty($errors->first($field_name)))
            <span class="text-danger d-block mt-2">{{ $errors->first($field_name) }}</span>
        @endif
    </td>
</tr>
