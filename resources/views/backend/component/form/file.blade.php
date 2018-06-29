<tr>
    <td class="aside">{{ $field_label }}</td>
    <td>
        <input type='file' name="{{ $field_name }}" class="form-control" value=""></input>
        <span class="text-danger">{{ $errors->first($field_name) }}</span>
    </td>
</tr>