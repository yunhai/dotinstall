<tr>
    <td class="aside">{{ $field_label }}</td>
    <td>
        <input type='hidden' value='{{ $field_value ?: 0 }}' name='{{ $field_name }}' />
        <div class='dd-container' 
            @foreach ($field_attribute as $key => $value)
                {{ $key }}="{{ $value }}"
            @endforeach
            data-name="{{ $field_name }}"
        >
            <div class='dd-browser'>Upload / Drag and drop here</div>
            <div class='dd-callback'></div>
        </div>
        <span class="text-danger">{{ $errors->first($field_name) }}</span>
    </td>
</tr>