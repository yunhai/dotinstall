<tr>
    <td class="aside">{{ $field_label }}</td>
    <td>
        <input type='file' name="{{ $field_name }}" class="form-control" value=""></input>
        @if (!empty($errors->first($field_name)))
            <span class="text-danger d-block mt-2">{{ $errors->first($field_name) }}</span>
        @endif
    </td>
</tr>
