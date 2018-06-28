@php
    $field_value = @old($field_name, $field_value);
@endphp

<tr>
    <td class="aside">{{ $field_label }}</td>
    <td>
        <input type='file' name="{{ $field_name }}" class="form-control" value=""></input>
    </td>
    <td class="desc">
        <span class="text-danger">{{ $errors->first($field_name) }}</span>
    </td>
</tr>