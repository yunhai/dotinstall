@php
    $field_value = @old($field_name, $field_value);
@endphp

<tr>
    <td class="aside">{{ $field_label }}</td>
    <td>
        <input name="{{ $field_name }}" class="form-control" value="{{ $field_value }}"></input>
    </td>
    <td class="desc"></td>
</tr>