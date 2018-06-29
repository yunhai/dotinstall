<tr>
    <td class="aside">{{ $field_label }}</td>
    <td>
        <input name="{{ $field_name }}" class="form-control" value="{{ $field_value }}"></input>
        <span class="text-danger">{{ $errors->first($field_name) }}</span>
    </td>
</tr>