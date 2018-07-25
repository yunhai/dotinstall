<tr>
    <td class="aside">{{ $field_label }}</td>
    <td>
        <textarea name="{{ $field_name }}" class="form-control j-editor">{{ $field_value }}</textarea>
        <span class="text-danger d-block mt-2">{{ $errors->first($field_name) }}</span>
    </td>
</tr>
