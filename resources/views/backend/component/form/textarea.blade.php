<tr>
    <td class="aside">{{ $field_label }}</td>
    <td>
        <textarea name="{{ $field_name }}" class="form-control" rows='10'>{{ $field_value }}</textarea>
        @if (!empty($errors->first($field_name)))
            <span class="text-danger d-block mt-2">{{ $errors->first($field_name) }}</span>
        @endif
    </td>
</tr>
