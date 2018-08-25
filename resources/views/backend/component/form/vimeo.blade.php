<tr>
    <td class="aside">{{ $field_label }}</td>
    <td>
        <input id='{{ $field_id ?? $field_name }}' name="{{ $field_name }}" class="form-control" value="{{ $field_value }}"
            @if (!empty($field_attribute))
            @foreach ($field_attribute as $key => $value)
                {{ $key }}="{{ $value }}"
            @endforeach
            data-name="{{ $field_name }}"
            @endif
        ></input>
        <div class='j-vimeoContainer vimeo-container'>
            @if ($field_value)
                <div data-vimeo-url="{{ $field_value }}" 
                    data-vimeo-title="false"
                    data-vimeo-portrait="false"
                    data-vimeo-byline="false"
                    data-vimeo-width="640" id="j-video">
                </div>
                <input type='hidden' name='duration' value='{{ $field_attribute["data-video_duration"] }}' />
            @endif
        </div>
        @if (!empty($errors->first($field_name)))
            <span class="text-danger d-block mt-2">{{ $errors->first($field_name) }}</span>
        @endif
    </td>
</tr>
