<input id='{{ $field_id ?? $field_name }}'
    name="{{ $field_name }}"
    class="form-control"
    type="{{ $field_type }}"
    value="{{ $field_value }}"
    @if (!empty($field_attribute))
    @foreach ($field_attribute as $key => $value)
        {{ $key }}="{{ $value }}"
    @endforeach
    data-name="{{ $field_name }}"
    @endif
></input>
