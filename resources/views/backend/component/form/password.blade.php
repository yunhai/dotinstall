<tr>
    <td class="aside">{{ $field_label }}</td>
    <td>
        <input id='{{ $field_id ?? $field_name }}' name="{{ $field_name }}" class="form-control" type="{{ $field_type }}"
            @if (!empty($field_attribute))
            @foreach ($field_attribute as $key => $value)
                {{ $key }}="{{ $value }}"
            @endforeach
            data-name="{{ $field_name }}"
            @endif
        ></input>
        @if (!empty($errors->first($field_name)))
            <span class="text-danger d-block mt-2">{{ $errors->first($field_name) }}</span>
        @endif
    </td>
</tr>
