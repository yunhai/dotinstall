<tr>
    <td class="aside">{{ $field_label }}</td>
    <td>
        <textarea name="{{ $field_name }}" class="form-control" rows='10'>{{ $field_value }}</textarea>
        <span class="text-danger">{{ $errors->first($field_name) }}</span>
    </td>
</tr>